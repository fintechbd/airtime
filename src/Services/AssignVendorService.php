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

        if (! isset($availableVendors[$slug])) {
            throw new VendorNotFoundException(ucfirst($slug));
        }

        $this->serviceVendorModel = Business::serviceVendor()->findWhere(['service_vendor_slug' => $slug, 'enabled' => true]);

        if (! $this->serviceVendorModel) {
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
            'message' => "Requesting ({$this->serviceVendorModel->service_vendor_name}) for ".ucwords(strtolower($service->service_name)).' airtime topup request',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $verdict = $this->serviceVendorDriver->initPayment($airtime);

        $data['timeline'][] = $verdict->timeline;
        $data['notes'] = $verdict->message;
        $data['order_data'] = $airtime->order_data;
        $data['order_data']['vendor_data'] = $verdict->toArray();

        if (! $verdict->status) {
            $data['status'] = OrderStatus::AdminVerification->value;
            $data['timeline'][] = [
                'message' => "Updating {$service->service_name} airtime topup request status. Requires ".OrderStatus::AdminVerification->label().' confirmation',
                'flag' => 'error',
                'timestamp' => now(),
            ];
        } else {
            $data['status'] = OrderStatus::Processing->value;
            $data['timeline'][] = [
                'message' => "Waiting for ({$this->serviceVendorModel->service_vendor_name}) to update ".ucwords(strtolower($service->service_name)).' airtime topup request status.',
                'flag' => 'info',
                'timestamp' => now(),
            ];
        }

        if (! Transaction::order()->update($airtime->getKey(), $data)) {
            throw new \ErrorException(__('remit::messages.assign_vendor.failed', [
                'slug' => $airtime->vendor,
            ]));
        }
    }

    /**
     * @throws ErrorException
     * @throws UpdateOperationException|VendorNotFoundException
     */
    public function processOrder(BaseModel $order, string $vendor_slug): mixed
    {
        $this->initVendor($vendor_slug);

        if (! Transaction::order()->update($order->getKey(), [
            'vendor' => $vendor_slug,
            'service_vendor_id' => $this->serviceVendorModel->getKey(),
            'status' => OrderStatus::Processing->value])) {
            throw new UpdateOperationException(__('airtime::assign_vendor.failed', ['slug' => $vendor_slug]));
        }

        $order->fresh();

        return $this->serviceVendorDriver->executeOrder($order);
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
