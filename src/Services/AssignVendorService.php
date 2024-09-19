<?php

namespace Fintech\Airtime\Services;

use ErrorException;
use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Airtime\Exceptions\AirtimeException;
use Fintech\Business\Facades\Business;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;

class AssignVendorService
{
    use \Fintech\Core\Traits\HasFindWhereSearch;

    private BaseModel $serviceVendorModel;

    private AirtimeTransfer $serviceVendorDriver;

    /**
     * @throws AirtimeException|ErrorException
     */
    public function requestQuote(BaseModel $order): mixed
    {
        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->requestQuote($order);
    }

    /**
     * @throws AirtimeException
     */
    private function initiateVendor(string $slug): void
    {
        $availableVendors = config('fintech.airtime.providers', []);

        if (! isset($availableVendors[$slug])) {
            throw new AirtimeException(__('airtime::messages.assign_vendor.not_found', ['slug' => ucfirst($slug)]));
        }

        $this->serviceVendorModel = Business::serviceVendor()->findWhere(['service_vendor_slug' => $slug, 'enabled']);

        if (! $this->serviceVendorModel) {
            throw (new ModelNotFoundException)->setModel(config('fintech.business.service_vendor_model'), $slug);
        }

        $this->serviceVendorDriver = App::make($availableVendors[$slug]['driver']);
    }

    /**
     * @throws ErrorException
     * @throws UpdateOperationException|AirtimeException
     */
    public function processOrder(BaseModel $order, string $vendor_slug): mixed
    {
        $this->initiateVendor($vendor_slug);

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
     * @throws ErrorException|AirtimeException
     */
    public function trackOrder(BaseModel $order): mixed
    {

        if ($order->service_vendor_id == config('fintech.business.default_vendor')) {
            throw new AirtimeException(__('airtime::messages.assign_vendor.not_assigned'));
        }

        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->trackOrder($order);
    }

    /**
     * @throws ErrorException
     * @throws AirtimeException
     */
    public function cancelOrder(BaseModel $order): mixed
    {
        $this->initiateVendor($order->vendor);

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

        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * @throws ErrorException
     * @throws AirtimeException
     */
    public function amendmentOrder(BaseModel $order): mixed
    {
        $this->initiateVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * Recharge Service Packages
     *
     * @throws AirtimeException
     */
    public function rechargePackages(string $slug): array
    {
        $this->initiateVendor($slug);

        return $this->serviceVendorDriver->servicePackages();
    }
}
