<?php

namespace Fintech\Airtime\Http\Controllers;

use Exception;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Airtime\Http\Requests\ImportBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\IndexBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\StoreBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\UpdateBangladeshTopUpRequest;
use Fintech\Airtime\Http\Resources\BangladeshTopUpCollection;
use Fintech\Airtime\Http\Resources\BangladeshTopUpResource;
use Fintech\Business\Facades\Business;
use Fintech\Core\Enums\Auth\RiskProfile;
use Fintech\Core\Enums\Auth\SystemRole;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Exceptions\DeleteOperationException;
use Fintech\Core\Exceptions\RestoreOperationException;
use Fintech\Core\Exceptions\StoreOperationException;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Core\Traits\ApiResponseTrait;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Class BangladeshTopUpController
 *
 * @lrd:start
 * This class handle create, display, update, delete & restore
 * operation related to BangladeshTopUp
 *
 * @lrd:end
 */
class BangladeshTopUpController extends Controller
{
    use ApiResponseTrait;

    /**
     * @lrd:start
     * Return a listing of the *BangladeshTopUp* resource as collection.
     *
     * *```paginate=false``` returns all resource as list not pagination*
     *
     * @lrd:end
     */
    public function index(IndexBangladeshTopUpRequest $request): BangladeshTopUpCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();
            //$inputs['transaction_form_id'] = Transaction::transactionForm()->list(['code' => 'bangladesh_top_up'])->first()->getKey();
            $inputs['transaction_form_code'] = 'bangladesh_top_up';
            //$inputs['service_id'] = Business::serviceType()->list(['service_type_slug'=>'bangladesh_top_up']);
            $inputs['service_type_slug'] = 'bangladesh_top_up';
            //$bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->list($inputs);
            $bangladeshTopUpPaginate = Transaction::order()->list($inputs);

            return new BangladeshTopUpCollection($bangladeshTopUpPaginate);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a new *BangladeshTopUp* resource in storage.
     *
     * @lrd:end
     *
     * @throws StoreOperationException
     */
    public function store(StoreBangladeshTopUpRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $inputs = $request->validated();
            if ($request->input('user_id') > 0) {
                $user_id = $request->input('user_id');
            }
            $depositor = $request->user('sanctum');
            if (Transaction::orderQueue()->addToQueueUserWise(($user_id ?? $depositor->getKey())) > 0) {

                $depositAccount = \Fintech\Transaction\Facades\Transaction::userAccount()->list([
                    'user_id' => $user_id ?? $depositor->getKey(),
                    'country_id' => $request->input('source_country_id', $depositor->profile?->country_id),
                ])->first();

                if (! $depositAccount) {
                    throw new Exception("User don't have account deposit balance");
                }

                $masterUser = \Fintech\Auth\Facades\Auth::user()->list([
                    'role_name' => SystemRole::MasterUser->value,
                    'country_id' => $request->input('source_country_id', $depositor->profile?->country_id),
                ])->first();

                if (! $masterUser) {
                    throw new Exception('Master User Account not found for '.$request->input('source_country_id', $depositor->profile?->country_id).' country');
                }

                //set pre defined conditions of deposit
                $inputs['transaction_form_id'] = Transaction::transactionForm()->list(['code' => 'bangladesh_top_up'])->first()->getKey();
                $inputs['user_id'] = $user_id ?? $depositor->getKey();
                $delayCheck = Transaction::order()->transactionDelayCheck($inputs);
                if ($delayCheck['countValue'] > 0) {
                    throw new Exception('Your Request For This Amount Is Already Submitted. Please Wait For Update');
                }
                $inputs['sender_receiver_id'] = $masterUser->getKey();
                $inputs['is_refunded'] = false;
                $inputs['status'] = OrderStatus::Successful->value;
                $inputs['risk'] = RiskProfile::Low->value;
                $inputs['reverse'] = true;
                $inputs['order_data']['currency_convert_rate'] = Business::currencyRate()->convert($inputs);
                unset($inputs['reverse']);
                $inputs['converted_amount'] = $inputs['order_data']['currency_convert_rate']['converted'];
                $inputs['converted_currency'] = $inputs['order_data']['currency_convert_rate']['output'];
                $inputs['order_data']['created_by'] = $depositor->name;
                $inputs['order_data']['created_by_mobile_number'] = $depositor->mobile;
                $inputs['order_data']['created_at'] = now();
                $inputs['order_data']['master_user_name'] = $masterUser['name'];
                //$inputs['order_data']['operator_short_code'] = $request->input('operator_short_code', null);
                $inputs['order_data']['system_notification_variable_success'] = 'bangladesh_top_up_success';
                $inputs['order_data']['system_notification_variable_failed'] = 'bangladesh_top_up_failed';

                $bangladeshTopUp = Airtime::bangladeshTopUp()->create($inputs);

                if (! $bangladeshTopUp) {
                    throw (new StoreOperationException)->setModel(config('fintech.airtime.bangladesh_top_up_model'));
                }

                $order_data = $bangladeshTopUp->order_data;
                $order_data['purchase_number'] = entry_number($bangladeshTopUp->getKey(), $bangladeshTopUp->sourceCountry->iso3, OrderStatus::Successful->value);
                $order_data['service_stat_data'] = Business::serviceStat()->serviceStateData($bangladeshTopUp);
                //TODO Need to work negative amount
                $order_data['user_name'] = $bangladeshTopUp->user->name;
                $bangladeshTopUp->order_data = $order_data;
                $userUpdatedBalance = Airtime::bangladeshTopUp()->debitTransaction($bangladeshTopUp);
                $depositedAccount = \Fintech\Transaction\Facades\Transaction::userAccount()->list([
                    'user_id' => $depositor->getKey(),
                    'country_id' => $bangladeshTopUp->source_country_id,
                ])->first();
                //update User Account
                $depositedUpdatedAccount = $depositedAccount->toArray();
                $depositedUpdatedAccount['user_account_data']['spent_amount'] = $depositedUpdatedAccount['user_account_data']['spent_amount'] + $userUpdatedBalance['spent_amount'];
                $depositedUpdatedAccount['user_account_data']['available_amount'] = $userUpdatedBalance['current_amount'];

                $order_data['order_data']['previous_amount'] = $depositedAccount->user_account_data['available_amount'];
                $order_data['order_data']['current_amount'] = ($order_data['order_data']['previous_amount'] + $inputs['converted_amount']);
                if (! Transaction::userAccount()->update($depositedAccount->getKey(), $depositedUpdatedAccount)) {
                    throw new Exception(__('User Account Balance does not update', [
                        'current_status' => $bangladeshTopUp->currentStatus(),
                        'target_status' => OrderStatus::Success->value,
                    ]));
                }
                Airtime::bangladeshTopUp()->update($bangladeshTopUp->getKey(), ['order_data' => $order_data, 'order_number' => $order_data['purchase_number']]);
                Transaction::orderQueue()->removeFromQueueUserWise($user_id ?? $depositor->getKey());
                DB::commit();

                return $this->created([
                    'message' => __('core::messages.resource.created', ['model' => 'Bangladesh Top Up']),
                    'id' => $bangladeshTopUp->id,
                ]);
            } else {
                throw new Exception('Your another order is in process...!');
            }
        } catch (Exception $exception) {
            Transaction::orderQueue()->removeFromQueueUserWise($user_id ?? $depositor->getKey());
            DB::rollBack();

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Return a specified *BangladeshTopUp* resource found by id.
     *
     * @lrd:end
     *
     * @throws ModelNotFoundException
     */
    public function show(string|int $id): BangladeshTopUpResource|JsonResponse
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (! $bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return new BangladeshTopUpResource($bangladeshTopUp);

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Update a specified *BangladeshTopUp* resource using id.
     *
     * @lrd:end
     *
     * @throws ModelNotFoundException
     * @throws UpdateOperationException
     */
    public function update(UpdateBangladeshTopUpRequest $request, string|int $id): JsonResponse
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (! $bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            $inputs = $request->validated();

            if (! Airtime::bangladeshTopUp()->update($id, $inputs)) {

                throw (new UpdateOperationException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return $this->updated(__('core::messages.resource.updated', ['model' => 'Bangladesh Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Soft delete a specified *BangladeshTopUp* resource using id.
     *
     * @lrd:end
     *
     * @return JsonResponse
     *
     * @throws ModelNotFoundException
     * @throws DeleteOperationException
     */
    public function destroy(string|int $id)
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (! $bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            if (! Airtime::bangladeshTopUp()->destroy($id)) {

                throw (new DeleteOperationException())->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return $this->deleted(__('core::messages.resource.deleted', ['model' => 'Bangladesh Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Restore the specified *BangladeshTopUp* resource from trash.
     * ** ```Soft Delete``` needs to enabled to use this feature**
     *
     * @lrd:end
     *
     * @return JsonResponse
     */
    public function restore(string|int $id)
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id, true);

            if (! $bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            if (! Airtime::bangladeshTopUp()->restore($id)) {

                throw (new RestoreOperationException())->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return $this->restored(__('core::messages.resource.restored', ['model' => 'Bangladesh Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a exportable list of the *BangladeshTopUp* resource as document.
     * After export job is done system will fire  export completed event
     *
     * @lrd:end
     */
    public function export(IndexBangladeshTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->export($inputs);

            return $this->exported(__('core::messages.resource.exported', ['model' => 'Bangladesh Top Up']));

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a exportable list of the *BangladeshTopUp* resource as document.
     * After export job is done system will fire  export completed event
     *
     * @lrd:end
     *
     * @return BangladeshTopUpCollection|JsonResponse
     */
    public function import(ImportBangladeshTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->list($inputs);

            return new BangladeshTopUpCollection($bangladeshTopUpPaginate);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }
}
