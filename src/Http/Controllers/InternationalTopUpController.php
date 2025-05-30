<?php

namespace Fintech\Airtime\Http\Controllers;

use Exception;
use Fintech\Airtime\Http\Requests\IndexInternationalTopUpRequest;
use Fintech\Airtime\Http\Requests\StoreInternationalTopUpRequest;
use Fintech\Airtime\Http\Resources\InternationalTopUpCollection;
use Fintech\Airtime\Http\Resources\InternationalTopUpResource;
use Fintech\Auth\Facades\Auth;
use Fintech\Auth\Models\User;
use Fintech\Core\Enums\Auth\RiskProfile;
use Fintech\Core\Enums\Auth\SystemRole;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Enums\Transaction\OrderType;
use Fintech\Core\Exceptions\StoreOperationException;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Class InternationalTopUpController
 *
 * @lrd:start
 * This class handle create, display, update, delete & restore
 * operation related to InternationalTopUp
 *
 * @lrd:end
 */
class InternationalTopUpController extends Controller
{
    /**
     * @lrd:start
     * Return a listing of the *InternationalTopUp* resource as collection.
     *
     * *```paginate=false``` returns all resource as list not pagination*
     *
     * @lrd:end
     */
    public function index(IndexInternationalTopUpRequest $request): InternationalTopUpCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();
            $inputs['transaction_form_id'] = transaction()->transactionForm()->findWhere(['code' => 'international_top_up'])->getKey();

            if ($request->isAgent()) {
                $inputs['creator_id'] = $request->user('sanctum')->getKey();
            }

            $internationalTopUpPaginate = airtime()->internationalTopUp()->list($inputs);

            return new InternationalTopUpCollection($internationalTopUpPaginate);

        } catch (Exception $exception) {

            return response()->failed($exception);
        }
    }

    /**
     * @lrd:start
     * Create a new *InternationalTopUp* resource in storage.
     *
     * @lrd:end
     *
     * @throws StoreOperationException
     */
    public function store(StoreInternationalTopUpRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $inputs = $request->validated();
            if ($request->input('user_id') > 0) {
                $user_id = $request->input('user_id');
            }
            $depositor = $request->user('sanctum');
            if (Transaction::orderQueue()->addToQueueUserWise(($user_id ?? $depositor->getKey())) > 0) {

                $depositAccount = transaction()->userAccount()->findWhere(['user_id' => $user_id ?? $depositor->getKey(), 'country_id' => $request->input('source_country_id', $depositor->profile?->country_id)]);

                if (! $depositAccount) {
                    throw new Exception("User don't have account deposit balance");
                }

                $masterUser = Auth::user()->findWhere(['role_name' => SystemRole::MasterUser->value, 'country_id' => $request->input('source_country_id', $depositor->profile?->country_id)]);

                if (! $masterUser) {
                    throw new Exception('Master User Account not found for '.$request->input('source_country_id', $depositor->profile?->country_id).' country');
                }

                // set pre defined conditions of deposit
                $inputs['transaction_form_id'] = transaction()->transactionForm()->findWhere(['code' => 'International_top_up'])->getKey();
                $inputs['user_id'] = $user_id ?? $depositor->getKey();
                $delayCheck = transaction()->order()->transactionDelayCheck($inputs);
                if ($delayCheck['countValue'] > 0) {
                    throw new Exception('Your Request For This Amount Is Already Submitted. Please Wait For Update');
                }
                $inputs['sender_receiver_id'] = $masterUser->getKey();
                $inputs['is_refunded'] = false;
                $inputs['status'] = OrderStatus::Pending->value;
                $inputs['risk'] = RiskProfile::Low->value;
                $inputs['reverse'] = true;
                $inputs['order_data']['currency_convert_rate'] = business()->currencyRate()->convert($inputs);
                unset($inputs['reverse']);
                $inputs['converted_amount'] = $inputs['order_data']['currency_convert_rate']['converted'];
                $inputs['converted_currency'] = $inputs['order_data']['currency_convert_rate']['output'];
                $inputs['order_data']['created_by'] = $depositor->name;
                $inputs['order_data']['created_by_mobile_number'] = $depositor->mobile;
                $inputs['order_data']['created_at'] = now();
                $inputs['order_data']['master_user_name'] = $masterUser['name'];
                // $inputs['order_data']['operator_short_code'] = $request->input('operator_short_code', null);
                $inputs['order_data']['system_notification_variable_success'] = 'international_top_up_success';
                $inputs['order_data']['system_notification_variable_failed'] = 'international_top_up_failed';
                $inputs['order_data']['order_type'] = OrderType::Airtime;
                $internationalTopUp = airtime()->internationalTopUp()->create($inputs);

                if (! $internationalTopUp) {
                    throw (new StoreOperationException)->setModel(config('fintech.airtime.international_top_up_model'));
                }

                $order_data = $internationalTopUp->order_data ?? [];
                $order_data['purchase_number'] = entry_number($internationalTopUp->getKey(), $internationalTopUp->sourceCountry->iso3 ?? null, OrderStatus::Successful->value);
                $order_data['service_stat_data'] = business()->serviceStat()->serviceStateData($internationalTopUp);
                // TODO Need to work negative amount
                $order_data['user_name'] = $internationalTopUp->user->name ?? null;
                $internationalTopUp->order_data = $order_data;
                $userUpdatedBalance = airtime()->internationalTopUp()->debitTransaction($internationalTopUp);
                $depositedAccount = transaction()->userAccount()->findWhere(['user_id' => $depositor->getKey(), 'country_id' => $internationalTopUp->source_country_id ?? null]);
                // update User Account
                $depositedUpdatedAccount = $depositedAccount->toArray();
                $depositedUpdatedAccount['user_account_data']['spent_amount'] = (float) $depositedUpdatedAccount['user_account_data']['spent_amount'] + (float) $userUpdatedBalance['spent_amount'];
                $depositedUpdatedAccount['user_account_data']['available_amount'] = (float) $userUpdatedBalance['current_amount'];
                if (((float) $depositedUpdatedAccount['user_account_data']['available_amount']) < ((float) config('fintech.transaction.minimum_balance'))) {
                    throw new Exception(__('Insufficient balance!', [
                        'previous_amount' => ((float) $depositedUpdatedAccount['user_account_data']['available_amount']),
                        'current_amount' => ((float) $userUpdatedBalance['spent_amount']),
                    ]));
                }
                $order_data['order_data']['previous_amount'] = (float) $depositedAccount->user_account_data['available_amount'];
                $order_data['order_data']['current_amount'] = (float) $userUpdatedBalance['current_amount'];
                if (! transaction()->userAccount()->update($depositedAccount->getKey(), $depositedUpdatedAccount)) {
                    throw new Exception(__('User Account Balance does not update', [
                        'previous_amount' => ((float) $depositedUpdatedAccount['user_account_data']['available_amount']),
                        'current_amount' => ((float) $userUpdatedBalance['spent_amount']),
                    ]));
                }
                airtime()->internationalTopUp()->update($internationalTopUp->getKey(), ['order_data' => $order_data, 'order_number' => $order_data['purchase_number']]);
                transaction()->orderQueue()->removeFromQueueUserWise($user_id ?? $depositor->getKey());
                DB::commit();

                return response()->created([
                    'message' => __('core::messages.resource.created', ['model' => 'International Top Up']),
                    'id' => $internationalTopUp->getKey(),
                    'spent' => $userUpdatedBalance['spent_amount'],
                    'order_number' => $internationalTopUp->order_number ?? $internationalTopUp->order_data['purchase_number'],
                ]);
            } else {
                throw new Exception('Your another order is in process...!');
            }
        } catch (Exception $exception) {
            /** @var User $depositor */
            transaction()->orderQueue()->removeFromQueueUserWise($user_id ?? $depositor->getKey());
            DB::rollBack();

            return response()->failed($exception);
        }
    }

    /**
     * @lrd:start
     * Return a specified *InternationalTopUp* resource found by id.
     *
     * @lrd:end
     *
     * @throws ModelNotFoundException
     */
    public function show(string|int $id): InternationalTopUpResource|JsonResponse
    {
        try {

            $internationalTopUp = airtime()->internationalTopUp()->find($id);

            if (! $internationalTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            return new InternationalTopUpResource($internationalTopUp);

        } catch (Exception $exception) {

            return response()->failed($exception);
        }
    }
}
