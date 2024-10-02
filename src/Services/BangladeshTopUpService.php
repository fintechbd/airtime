<?php

namespace Fintech\Airtime\Services;

use Fintech\Airtime\Events\BangladeshTopUpRequested;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Airtime\Interfaces\BangladeshTopUpRepository;
use Fintech\Auth\Facades\Auth;
use Fintech\Banco\Facades\Banco;
use Fintech\Business\Exceptions\BusinessException;
use Fintech\Business\Facades\Business;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Enums\Auth\RiskProfile;
use Fintech\Core\Enums\Auth\SystemRole;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Enums\Transaction\OrderType;
use Fintech\Core\Exceptions\StoreOperationException;
use Fintech\Core\Exceptions\Transaction\CurrencyUnavailableException;
use Fintech\Core\Exceptions\Transaction\InsufficientBalanceException;
use Fintech\Core\Exceptions\Transaction\MasterCurrencyUnavailableException;
use Fintech\Core\Exceptions\Transaction\OrderRequestFailedException;
use Fintech\Core\Exceptions\Transaction\RequestAmountExistsException;
use Fintech\Core\Exceptions\Transaction\RequestOrderExistsException;
use Fintech\MetaData\Facades\MetaData;
use Fintech\Remit\Events\WalletTransferRequested;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

/**
 * Class BangladeshTopUpService
 */
class BangladeshTopUpService
{
    use \Fintech\Core\Traits\HasFindWhereSearch;

    /**
     * BangladeshTopUpService constructor.
     */
    public function __construct(public BangladeshTopUpRepository $bangladeshTopUpRepository)
    {
    }

    public function find($id, $onlyTrashed = false): ?BaseModel
    {
        return $this->bangladeshTopUpRepository->find($id, $onlyTrashed);
    }

    public function update($id, array $inputs = []): BaseModel
    {
        return $this->bangladeshTopUpRepository->update($id, $inputs);
    }

    public function destroy($id)
    {
        return $this->bangladeshTopUpRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->bangladeshTopUpRepository->restore($id);
    }

    public function export(array $filters)
    {
        return $this->bangladeshTopUpRepository->list($filters);
    }

    /**
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->bangladeshTopUpRepository->list($filters);

    }

    public function import(array $filters)
    {
        return $this->bangladeshTopUpRepository->create($filters);
    }

    /**
     * @throws RequestAmountExistsException
     * @throws BusinessException
     * @throws CurrencyUnavailableException
     * @throws RequestOrderExistsException
     * @throws InsufficientBalanceException
     * @throws OrderRequestFailedException
     * @throws MasterCurrencyUnavailableException
     */
    public function create(array $inputs = []): ?BaseModel
    {
        $sender = Auth::user()->find($inputs['user_id']);

        if (!$sender) {
            throw (new ModelNotFoundException)->setModel(config('fintech.auth.auth_model'), $inputs['user_id']);
        }

        if (Transaction::orderQueue()->addToQueueUserWise($inputs['user_id']) == 0) {
            throw new RequestOrderExistsException;
        }

        $inputs['order_data']['order_type'] = OrderType::Airtime;
        $inputs['description'] = 'Bangladesh Top Up';
        $inputs['source_country_id'] = $inputs['source_country_id'] ?? $sender->profile?->present_country_id;

        $senderAccount = Transaction::userAccount()->findWhere(['user_id' => $sender->getKey(), 'country_id' => $inputs['source_country_id']]);

        if (!$senderAccount) {
            throw new CurrencyUnavailableException($inputs['source_country_id']);
        }

        $masterUser = Auth::user()->findWhere(['role_name' => SystemRole::MasterUser->value, 'country_id' => $inputs['source_country_id']]);

        if (!$masterUser) {
            throw new MasterCurrencyUnavailableException($inputs['source_country_id']);
        }

        $inputs['transaction_form_id'] = Transaction::transactionForm()->findWhere(['code' => 'bangladesh_top_up'])->getKey();

        if (Transaction::order()->transactionDelayCheck($inputs)['countValue'] > 0) {
            throw new RequestAmountExistsException;
        }

        $role = $sender->roles?->first() ?? null;
        $inputs['order_data']['role_id'] = $role->id;
        $inputs['order_data']['is_reload'] = false;
        $inputs['order_data']['is_reverse'] = true;
        $inputs['sender_receiver_id'] = $masterUser->getKey();
        $inputs['is_refunded'] = false;
        $inputs['status'] = OrderStatus::Pending->value;
        $inputs['risk'] = RiskProfile::Low;
        $currencyConversion = Business::currencyRate()->convert([
            'role_id' => $inputs['order_data']['role_id'],
            'reverse' => $inputs['order_data']['is_reverse'],
            'source_country_id' => $inputs['source_country_id'],
            'destination_country_id' => $inputs['destination_country_id'],
            'amount' => $inputs['amount'],
            'service_id' => $inputs['service_id'],
        ]);
        if ($inputs['order_data']['is_reverse']) {
            $inputs['amount'] = $currencyConversion['converted'];
            $inputs['converted_amount'] = $currencyConversion['amount'];
        } else {
            $inputs['amount'] = $currencyConversion['amount'];
            $inputs['converted_amount'] = $currencyConversion['converted'];
        }
        $inputs['order_data']['currency_convert_rate'] = $currencyConversion;
        unset($inputs['reverse']);

        $inputs['order_data']['created_by'] = $sender->name ?? 'N/A';
        $inputs['order_data']['user_name'] = $sender->name ?? 'N/A';
        $inputs['order_data']['created_by_mobile_number'] = $sender->mobile ?? 'N/A';
        $inputs['order_data']['created_by_email'] = $sender->email ?? 'N/A';
        $inputs['order_data']['created_at'] = now();
        $inputs['order_data']['master_user_name'] = $masterUser->name;
        $inputs['order_data']['sending_amount'] = $inputs['converted_amount'];
        $inputs['order_data']['assign_order'] = 'no';
        $inputs['order_data']['system_notification_variable_success'] = 'bangladesh_top_up_success';
        $inputs['order_data']['system_notification_variable_failed'] = 'bangladesh_top_up_failed';
        $inputs['order_data']['purchase_number'] = next_purchase_number(MetaData::country()->find($inputs['source_country_id'])->iso3);
        $inputs['order_number'] = $inputs['order_data']['purchase_number'];
        $service = Business::service()->find($inputs['service_id']);
        $inputs['order_data']['service_slug'] = $service->service_slug ?? null;
        $inputs['order_data']['service_name'] = $service->service_name ?? null;
        $vendor = $service->serviceVendor;
        $inputs['service_vendor_id'] = $vendor?->getKey() ?? null;
        $inputs['vendor'] = $vendor?->service_vendor_slug ?? null;

        if (isset($inputs['order_data']['service_package_id']) && is_numeric($inputs['order_data']['service_package_id'])) {
            $package = Business::servicePackage()->find($inputs['order_data']['service_package_id']);
            $inputs['order_data']['service_package'] = $package;
        } else {
            $inputs['order_data']['service_package'] = [
                'name' => 'Custom Amount',
                'amount' => $inputs['amount'],
                'description' => 'Custom Amount',
                'enabled' => true,
                'blocked' => false,
                'type' => 'custom',
                'slug' => 'custom',
                'service_package_data' => [
                    "validity" => "Assigned By Operator",
                    "is_popular" => 0,
                    "connection_type" => $inputs['order_data']['connection_type'],
                    "validity_seconds" => 999999999

                ],
            ];
        }
        $inputs['timeline'][] = [
            'message' => 'Bangladesh Top Up entry created successfully',
            'flag' => 'create',
            'timestamp' => now(),
        ];
        $inputs['order_data']['beneficiary_data'] = Banco::beneficiary()->manageBeneficiaryData($inputs['order_data']);
        $inputs['order_data']['service_stat_data'] = Business::serviceStat()->serviceStateData([
            'role_id' => $inputs['order_data']['role_id'],
            'reverse' => false,
            'source_country_id' => $inputs['source_country_id'],
            'destination_country_id' => $inputs['destination_country_id'],
            'amount' => $inputs['amount'],
            'service_id' => $inputs['service_id'],
        ]);

        if ((float)$inputs['order_data']['service_stat_data']['total_amount'] > (float)$senderAccount->user_account_data['available_amount']) {
            throw new InsufficientBalanceException($senderAccount->user_account_data['currency']);
        }

        DB::beginTransaction();
        try {
            $bangladeshTopUp = $this->bangladeshTopUpRepository->create($inputs);
            DB::commit();
            $userUpdatedBalance = $this->debitTransaction($bangladeshTopUp);
            $senderUpdatedAccount = $senderAccount->toArray();
            $senderUpdatedAccount['user_account_data']['spent_amount'] = (float)$senderUpdatedAccount['user_account_data']['spent_amount'] + (float)$userUpdatedBalance['spent_amount'];
            $senderUpdatedAccount['user_account_data']['available_amount'] = (float)$userUpdatedBalance['current_amount'];

            $inputs['order_data']['previous_amount'] = (float)$senderAccount->user_account_data['available_amount'];
            $inputs['order_data']['current_amount'] = ((float)$inputs['order_data']['previous_amount'] + (float)$inputs['converted_currency']);
            $inputs['timeline'][] = [
                'message' => 'Deducted ' . currency($userUpdatedBalance['spent_amount'], $inputs['currency']) . ' from user account successfully',
                'flag' => 'info',
                'timestamp' => now(),
            ];

            $bangladeshTopUp = $this->bangladeshTopUpRepository->update($bangladeshTopUp->getKey(), ['order_data' => $inputs['order_data'], 'timeline' => $inputs['timeline']]);

            if (!Transaction::userAccount()->update($senderAccount->getKey(), $senderUpdatedAccount)) {
                throw new \Exception('Failed to update user account balance.');
            }

            Transaction::orderQueue()->removeFromQueueUserWise($inputs['user_id']);

            BangladeshTopUpRequested::dispatch($bangladeshTopUp);

            return $bangladeshTopUp;

        } catch (\Exception $exception) {
            DB::rollBack();
            Transaction::orderQueue()->removeFromQueueUserWise($inputs['user_id']);
            throw new OrderRequestFailedException(OrderType::Airtime->value, 0, $exception);
        }
    }

    /**
     * @return int[]
     */
    public function debitTransaction($data): array
    {
        $userAccountData = [
            'previous_amount' => null,
            'current_amount' => null,
            'spent_amount' => null,
        ];

        //Collect Current Balance as Previous Balance
        $userAccountData['previous_amount'] = Transaction::orderDetail()->list([
            'get_order_detail_amount_sum' => true,
            'user_id' => $data->user_id,
            'order_detail_currency' => $data->currency,
        ]);

        $serviceStatData = $data->order_data['service_stat_data'];
        $master_user_name = $data->order_data['master_user_name'];
        $user_name = $data->order_data['user_name'];

        $amount = $data->amount;
        $converted_amount = $data->converted_amount;
        $data->amount = -$amount;
        $data->converted_amount = -$converted_amount;
        $data->order_detail_cause_name = 'cash_withdraw';
        $data->order_detail_number = $data->order_data['purchase_number'];
        $data->order_detail_response_id = $data->order_data['purchase_number'];
        $data->notes = 'Bangladesh Topup Payment Send to ' . $master_user_name;
        $orderDetailStore = Transaction::orderDetail()->create(Transaction::orderDetail()->orderDetailsDataArrange($data));
        $orderDetailStore->order_detail_parent_id = $data->order_detail_parent_id = $orderDetailStore->getKey();
        $orderDetailStore->save();
        $orderDetailStore->fresh();
        $orderDetailStoreForMaster = $orderDetailStore->replicate();
        $orderDetailStoreForMaster->user_id = $data->sender_receiver_id;
        $orderDetailStoreForMaster->sender_receiver_id = $data->user_id;
        $orderDetailStoreForMaster->order_detail_amount = $amount;
        $orderDetailStoreForMaster->converted_amount = $converted_amount;
        $orderDetailStoreForMaster->step = 2;
        $orderDetailStoreForMaster->notes = 'Bangladesh Topup Payment Receive From' . $user_name;
        $orderDetailStoreForMaster->save();

        //For Charge
        $data->amount = calculate_flat_percent($amount, $serviceStatData['charge']);
        $data->converted_amount = calculate_flat_percent($converted_amount, $serviceStatData['charge']);
        $data->order_detail_cause_name = 'charge';
        $data->order_detail_parent_id = $orderDetailStore->getKey();
        $data->notes = 'Bangladesh Topup Charge Send to ' . $master_user_name;
        $data->step = 3;
        $data->order_detail_parent_id = $orderDetailStore->getKey();
        $orderDetailStoreForCharge = Transaction::orderDetail()->create(Transaction::orderDetail()->orderDetailsDataArrange($data));
        $orderDetailStoreForChargeForMaster = $orderDetailStoreForCharge->replicate();
        $orderDetailStoreForChargeForMaster->user_id = $data->sender_receiver_id;
        $orderDetailStoreForChargeForMaster->sender_receiver_id = $data->user_id;
        $orderDetailStoreForChargeForMaster->order_detail_amount = -calculate_flat_percent($amount, $serviceStatData['charge']);
        $orderDetailStoreForChargeForMaster->converted_amount = -calculate_flat_percent($converted_amount, $serviceStatData['charge']);
        $orderDetailStoreForChargeForMaster->order_detail_cause_name = 'charge';
        $orderDetailStoreForChargeForMaster->notes = 'Bangladesh Topup Charge Receive from ' . $user_name;
        $orderDetailStoreForChargeForMaster->step = 4;
        $orderDetailStoreForChargeForMaster->save();

        //For Discount
        $data->amount = -calculate_flat_percent($amount, $serviceStatData['discount']);
        $data->converted_amount = -calculate_flat_percent($converted_amount, $serviceStatData['discount']);
        $data->order_detail_cause_name = 'discount';
        $data->notes = 'Bangladesh Topup Discount form ' . $master_user_name;
        $data->step = 5;
        //$data->order_detail_parent_id = $orderDetailStore->getKey();
        //$updateData['order_data']['previous_amount'] = 0;
        $orderDetailStoreForDiscount = Transaction::orderDetail()->create(Transaction::orderDetail()->orderDetailsDataArrange($data));
        $orderDetailStoreForDiscountForMaster = $orderDetailStoreForCharge->replicate();
        $orderDetailStoreForDiscountForMaster->user_id = $data->sender_receiver_id;
        $orderDetailStoreForDiscountForMaster->sender_receiver_id = $data->user_id;
        $orderDetailStoreForDiscountForMaster->order_detail_amount = calculate_flat_percent($amount, $serviceStatData['discount']);
        $orderDetailStoreForDiscountForMaster->converted_amount = calculate_flat_percent($converted_amount, $serviceStatData['discount']);
        $orderDetailStoreForDiscountForMaster->order_detail_cause_name = 'discount';
        $orderDetailStoreForDiscountForMaster->notes = 'Bangladesh Topup Discount to ' . $user_name;
        $orderDetailStoreForDiscountForMaster->step = 6;
        $orderDetailStoreForDiscountForMaster->save();

        //'Point Transfer Commission Send to ' . $masterUser->name;
        //'Point Transfer Commission Receive from ' . $receiver->name;

        $userAccountData['current_amount'] = Transaction::orderDetail()->list([
            'get_order_detail_amount_sum' => true,
            'user_id' => $data->user_id,
            'order_detail_currency' => $data->currency,
        ]);

        $userAccountData['spent_amount'] = Transaction::orderDetail()->list([
            'get_order_detail_amount_sum' => true,
            'user_id' => $data->user_id,
            'order_id' => $data->getKey(),
            'order_detail_currency' => $data->currency,
        ]);

        return $userAccountData;

    }

    /**
     * @return int[]
     */
    public function creditTransaction($data): array
    {
        $userAccountData = [
            'previous_amount' => null,
            'current_amount' => null,
            'spent_amount' => null,
        ];

        //Collect Current Balance as Previous Balance
        $userAccountData['previous_amount'] = Transaction::orderDetail()->list([
            'get_order_detail_amount_sum' => true,
            'user_id' => $data->user_id,
            'order_detail_currency' => $data->currency,
        ]);

        $serviceStatData = $data->order_data['service_stat_data'];
        $master_user_name = $data->order_data['master_user_name'];
        $user_name = $data->order_data['user_name'];

        $data->order_detail_cause_name = 'cash_withdraw';
        $data->order_detail_number = $data->order_data['accepted_number'];
        $data->order_detail_response_id = $data->order_data['purchase_number'];
        $data->notes = 'Bangladesh Topup Refund From ' . $master_user_name;
        $orderDetailStore = Transaction::orderDetail()->create(Transaction::orderDetail()->orderDetailsDataArrange($data));
        $orderDetailStore->order_detail_parent_id = $data->order_detail_parent_id = $orderDetailStore->getKey();
        $orderDetailStore->save();
        $orderDetailStore->fresh();
        $amount = $data->amount;
        $converted_amount = $data->converted_amount;
        $orderDetailStoreForMaster = $orderDetailStore->replicate();
        $orderDetailStoreForMaster->user_id = $data->sender_receiver_id;
        $orderDetailStoreForMaster->sender_receiver_id = $data->user_id;
        $orderDetailStoreForMaster->order_detail_amount = -$amount;
        $orderDetailStoreForMaster->converted_amount = -$converted_amount;
        $orderDetailStoreForMaster->step = 2;
        $orderDetailStoreForMaster->notes = 'Bangladesh Topup Send to ' . $user_name;
        $orderDetailStoreForMaster->save();

        //For Charge
        $data->amount = -calculate_flat_percent($amount, $serviceStatData['charge']);
        $data->converted_amount = -calculate_flat_percent($converted_amount, $serviceStatData['charge']);
        $data->order_detail_cause_name = 'charge';
        $data->order_detail_parent_id = $orderDetailStore->getKey();
        $data->notes = 'Bangladesh Topup Charge Receive from ' . $master_user_name;
        $data->step = 3;
        $data->order_detail_parent_id = $orderDetailStore->getKey();
        $orderDetailStoreForCharge = Transaction::orderDetail()->create(Transaction::orderDetail()->orderDetailsDataArrange($data));
        $orderDetailStoreForChargeForMaster = $orderDetailStoreForCharge->replicate();
        $orderDetailStoreForChargeForMaster->user_id = $data->sender_receiver_id;
        $orderDetailStoreForChargeForMaster->sender_receiver_id = $data->user_id;
        $orderDetailStoreForChargeForMaster->order_detail_amount = calculate_flat_percent($amount, $serviceStatData['charge']);
        $orderDetailStoreForChargeForMaster->converted_amount = calculate_flat_percent($converted_amount, $serviceStatData['charge']);
        $orderDetailStoreForChargeForMaster->order_detail_cause_name = 'charge';
        $orderDetailStoreForChargeForMaster->notes = 'Bangladesh Topup Charge Send to ' . $user_name;
        $orderDetailStoreForChargeForMaster->step = 4;
        $orderDetailStoreForChargeForMaster->save();

        //For Discount
        $data->amount = calculate_flat_percent($amount, $serviceStatData['discount']);
        $data->converted_amount = calculate_flat_percent($converted_amount, $serviceStatData['discount']);
        $data->order_detail_cause_name = 'discount';
        $data->notes = 'Bangladesh Topup Discount form ' . $master_user_name;
        $data->step = 5;
        //$data->order_detail_parent_id = $orderDetailStore->getKey();
        $updateData['order_data']['previous_amount'] = 0;
        $orderDetailStoreForDiscount = Transaction::orderDetail()->create(Transaction::orderDetail()->orderDetailsDataArrange($data));
        $orderDetailStoreForDiscountForMaster = $orderDetailStoreForCharge->replicate();
        $orderDetailStoreForDiscountForMaster->user_id = $data->sender_receiver_id;
        $orderDetailStoreForDiscountForMaster->sender_receiver_id = $data->user_id;
        $orderDetailStoreForDiscountForMaster->order_detail_amount = -calculate_flat_percent($amount, $serviceStatData['discount']);
        $orderDetailStoreForDiscountForMaster->converted_amount = -calculate_flat_percent($converted_amount, $serviceStatData['discount']);
        $orderDetailStoreForDiscountForMaster->order_detail_cause_name = 'discount';
        $orderDetailStoreForDiscountForMaster->notes = 'Bangladesh Topup Discount to ' . $user_name;
        $orderDetailStoreForDiscountForMaster->step = 6;
        $orderDetailStoreForDiscountForMaster->save();

        //'Point Transfer Commission Send to ' . $masterUser->name;
        //'Point Transfer Commission Receive from ' . $receiver->name;

        $userAccountData['current_amount'] = Transaction::orderDetail()->list([
            'get_order_detail_amount_sum' => true,
            'user_id' => $data->user_id,
            'order_detail_currency' => $data->currency,
        ]);

        $userAccountData['spent_amount'] = Transaction::orderDetail()->list([
            'get_order_detail_amount_sum' => true,
            'user_id' => $data->user_id,
            'order_id' => $data->getKey(),
            'order_detail_currency' => $data->currency,
        ]);

        return $userAccountData;

    }
}
