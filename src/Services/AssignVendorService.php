<?php

namespace Fintech\Airtime\Services;

use ErrorException;
use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Airtime\Exceptions\AirtimeException;
use Fintech\Business\Facades\Business;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Core\Exceptions\VendorNotFoundException;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;

class AssignVendorService
{
    private BaseModel $serviceVendorModel;

    private AirtimeTransfer $serviceVendorDriver;


    /**
     * @throws VendorNotFoundException
     */
    private function initVendor(string $slug): void
    {
        $availableVendors = config('fintech.airtime.providers', []);

        if (!isset($availableVendors[$slug])) {
            throw new VendorNotFoundException(ucfirst($slug));
        }

        $this->serviceVendorModel = Business::serviceVendor()->findWhere(['service_vendor_slug' => $slug, 'enabled' => true]);

        if (!$this->serviceVendorModel) {
            throw (new ModelNotFoundException)->setModel(config('fintech.business.service_vendor_model'), $slug);
        }

        $this->serviceVendorDriver = App::make($availableVendors[$slug]['driver']);
    }

    /**
     * @throws AirtimeException|ErrorException|VendorNotFoundException
     */
    public function requestQuote(BaseModel $airtime): void
    {
        $data['timeline'] = $airtime->timeline ?? [];

        $this->initVendor($airtime->vendor);

        $service = Business::service()->find($airtime->service_id);

        $data['timeline'][] = [
            'message' => "Requesting ({$this->serviceVendorModel->service_vendor_name}) for " . ucwords(strtolower($service->service_name)) . ' airtime topup validity confirmation.',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $verdict = $this->serviceVendorDriver->requestQuote($airtime);

        $data['timeline'][] = $verdict->timeline;
        $data['notes'] = $verdict->message;
        $data['order_data'] = $airtime->order_data;
        $data['order_data']['vendor_data']['bill_info'] = $verdict->toArray();
        $data['order_data']['ref_number'] = $verdict->ref_number;

        if (!$verdict->status) {
            $data['status'] = OrderStatus::AdminVerification->value;
            $data['timeline'][] = [
                'message' => "Updating {$service->service_name} airtime topup request status. Requires " . OrderStatus::AdminVerification->label() . ' confirmation',
                'flag' => 'warn',
                'timestamp' => now(),
            ];
        } else {
            $data['order_data']['assign_order'] = 'yes';
            $data['status'] = OrderStatus::Processing->value;
            $data['timeline'][] = [
                'message' => "Assigning " . ucwords(strtolower($service->service_name)) . " airtime topup order to ({$this->serviceVendorModel->service_vendor_name}).",
                'flag' => 'info',
                'timestamp' => now(),
            ];
        }

        if (!Transaction::order()->update($airtime->getKey(), $data)) {
            throw new \ErrorException(__('remit::messages.assign_vendor.failed', [
                'slug' => $airtime->vendor,
            ]));
        }
    }

    /**
     * @throws ErrorException
     * @throws UpdateOperationException|VendorNotFoundException
     */
    public function processOrder(BaseModel $airtime, string $vendor_slug): mixed
    {
        $data['timeline'] = $airtime->timeline ?? [];

        $this->initVendor($vendor_slug);

        $service = Business::service()->find($airtime->service_id);

        $data['timeline'][] = [
            'message' => "Requesting ({$this->serviceVendorModel->service_vendor_name}) to execute " . ucwords(strtolower($service->service_name)) . ' airtime topup request.',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $verdict = $this->serviceVendorDriver->executeOrder($airtime);

        $data['timeline'][] = $verdict->timeline;
        $data['notes'] = $verdict->message;
        $data['order_data'] = $airtime->order_data;
        $data['order_data']['vendor_data']['payment_info'] = $verdict->toArray();
        $data['order_data']['ref_number'] = $verdict->ref_number;

        if (!$verdict->status) {
            $data['status'] = OrderStatus::AdminVerification->value;
            $data['timeline'][] = [
                'message' => "Updating {$service->service_name} airtime topup request status. Requires " . OrderStatus::AdminVerification->label() . ' confirmation',
                'flag' => 'warn',
                'timestamp' => now(),
            ];
        } else {
            $data['order_data']['assign_order'] = 'yes';
            $data['status'] = OrderStatus::Processing->value;
            $data['timeline'][] = [
                'message' => "Waiting for ({$this->serviceVendorModel->service_vendor_name}) to update " . ucwords(strtolower($service->service_name)) . ' airtime topup request status.',
                'flag' => 'info',
                'timestamp' => now(),
            ];
        }

        if (!Transaction::order()->update($airtime->getKey(), $data)) {
            throw new \ErrorException(__('remit::messages.assign_vendor.failed', [
                'slug' => $airtime->vendor,
            ]));
        }
    }

    /**
     * @throws ErrorException|AirtimeException|VendorNotFoundException
     */
    public function trackOrder(BaseModel $order): mixed
    {

        if ($order->service_vendor_id == config('fintech.business.default_vendor')) {
            throw new AirtimeException(__('airtime::messages.assign_vendor.not_assigned'));
        }

        $this->initVendor($order->vendor);

        return $this->serviceVendorDriver->trackOrder($order);
    }

    /**
     * @throws ErrorException
     * @throws AirtimeException
     */
    public function cancelOrder(BaseModel $order): mixed
    {
        $this->initVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * @throws AirtimeException
     * @throws ErrorException
     */
    public function orderStatus(BaseModel $order): mixed
    {

        if ($order->service_vendor_id == config('fintech.business.default_vendor')) {
            throw new AirtimeException(__('airtime::messages.assign_vendor.not_assigned'));
        }

        $this->initVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * @throws ErrorException
     * @throws AirtimeException|VendorNotFoundException
     */
    public function amendmentOrder(BaseModel $order): mixed
    {
        $this->initVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * Recharge Service Packages
     *
     * @throws AirtimeException|VendorNotFoundException
     */
    public function rechargePackages(string $slug): array
    {
        $this->initVendor($slug);

        return $this->serviceVendorDriver->servicePackages();
    }
}
