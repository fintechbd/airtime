<?php

namespace Fintech\Airtime\Services;

use ErrorException;
use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Business\Facades\Business;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Tab\Exceptions\TabException;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;

class AssignVendorService
{
    private BaseModel $serviceVendorModel;

    private AirtimeTransfer $serviceVendorDriver;

    /**
     * @throws TabException
     */
    private function initiateVendor(string $slug): void
    {
        $availableVendors = config('fintech.airtime.providers', []);

        if (! isset($availableVendors[$slug])) {
            throw new TabException(__('airtime::messages.assign_vendor.not_found', ['slug' => ucfirst($slug)]));
        }

        $this->serviceVendorModel = Business::serviceVendor()->list(['service_vendor_slug' => $slug, 'enabled'])->first();

        if (! $this->serviceVendorModel) {
            throw (new ModelNotFoundException)->setModel(config('fintech.business.service_vendor_model'), $slug);
        }

        $this->serviceVendorDriver = App::make($availableVendors[$slug]['driver']);
    }

    /**
     * @throws TabException|ErrorException
     */
    public function requestQuote(BaseModel $order): mixed
    {
        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->requestQuote($order);
    }

    /**
     * @throws ErrorException
     * @throws UpdateOperationException|TabException
     */
    public function processOrder(BaseModel $order, string $vendor_slug): mixed
    {
        $this->initiateVendor($vendor_slug);

        if (! Transaction::order()->update($order->getKey(), [
            'vendor' => $vendor_slug,
            'service_vendor_id' => $this->serviceVendorModel->getKey(),
            'status' => OrderStatus::Processing->value])) {
            throw new UpdateOperationException(__('tab::assign_vendor.failed', ['slug' => $vendor_slug]));
        }

        $order->fresh();

        return $this->serviceVendorDriver->executeOrder($order);
    }

    /**
     * @throws TabException
     * @throws ErrorException
     */
    public function trackOrder(BaseModel $order): mixed
    {

        if ($order->service_vendor_id == config('fintech.business.default_vendor')) {
            throw new TabException(__('tab::messages.assign_vendor.not_assigned'));
        }

        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->trackOrder($order);
    }

    /**
     * @throws ErrorException
     */
    public function cancelOrder(BaseModel $order): mixed
    {
        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * @throws TabException
     */
    public function orderStatus(BaseModel $order): mixed
    {

        if ($order->service_vendor_id == config('fintech.business.default_vendor')) {
            throw new TabException(__('tab::messages.assign_vendor.not_assigned'));
        }

        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    public function amendmentOrder(BaseModel $order): mixed
    {
        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }
}
