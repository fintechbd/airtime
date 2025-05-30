<?php

namespace Fintech\Airtime\Services;

use ErrorException;
use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Airtime\Exceptions\AirtimeException;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Fintech\Core\Enums\Transaction\OrderStatusConfig;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Core\Exceptions\VendorNotFoundException;
use Fintech\Core\Supports\AssignVendorVerdict;
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

        $this->serviceVendorModel = business()->serviceVendor()->findWhere(['service_vendor_slug' => $slug, 'enabled' => true]);

        if (! $this->serviceVendorModel) {
            throw (new ModelNotFoundException)->setModel(config('fintech.business.service_vendor_model'), $slug);
        }

        $this->serviceVendorDriver = App::make($availableVendors[$slug]['driver']);
    }

    /**
     * @throws AirtimeException|ErrorException|VendorNotFoundException
     */
    public function requestQuote(BaseModel $airtime): BaseModel
    {
        $data['timeline'] = $airtime->timeline ?? [];
        $data['order_data'] = $airtime->order_data;

        $this->initVendor($airtime->vendor);

        $service = business()->service()->find($airtime->service_id);

        $data['timeline'][] = [
            'message' => "Requesting ({$this->serviceVendorModel->service_vendor_name}) for ".ucwords(strtolower($service->service_name)).' airtime topup validity confirmation.',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $verdict = $this->serviceVendorDriver->requestQuote($airtime);

        $data['timeline'][] = $verdict->timeline;
        $data['notes'] = $verdict->message;
        $data['order_data']['vendor_data']['bill_info'] = $verdict->toArray();
        $data['order_data']['ref_number'] = $verdict->ref_number;

        if (! $verdict->status) {
            $data['status'] = OrderStatus::AdminVerification->value;
            $data['timeline'][] = [
                'message' => "Updating {$service->service_name} airtime topup request status. Requires ".OrderStatus::AdminVerification->label().' confirmation',
                'flag' => 'warn',
                'timestamp' => now(),
            ];
        } else {
            $data['order_data']['assign_order'] = 'yes';
            $data['status'] = OrderStatus::Processing->value;
            $data['timeline'][] = [
                'message' => 'Assigning '.ucwords(strtolower($service->service_name))." airtime topup order to ({$this->serviceVendorModel->service_vendor_name}).",
                'flag' => 'info',
                'timestamp' => now(),
            ];
        }

        if (! transaction()->order()->update($airtime->getKey(), $data)) {
            throw new \ErrorException(__('core::messages.assign_vendor.failed', [
                'slug' => $airtime->vendor,
            ]));
        }

        return $airtime->refresh();
    }

    /**
     * @throws ErrorException
     * @throws UpdateOperationException|VendorNotFoundException
     */
    public function processOrder(BaseModel $airtime, string $vendor_slug): BaseModel
    {
        $data['timeline'] = $airtime->timeline ?? [];
        $data['order_data'] = $airtime->order_data;

        $this->initVendor($vendor_slug);

        $service = business()->service()->find($airtime->service_id);

        $data['timeline'][] = [
            'message' => "Requesting ({$this->serviceVendorModel->service_vendor_name}) to execute ".ucwords(strtolower($service->service_name)).' airtime topup request.',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $verdict = $this->serviceVendorDriver->executeOrder($airtime);

        $data['timeline'][] = $verdict->timeline;
        $data['notes'] = $verdict->message;
        $data['order_data']['vendor_data']['payment_info'] = $verdict->toArray();
        $data['order_data']['ref_number'] = $verdict->ref_number;

        if (! $verdict->status) {
            $data['status'] = OrderStatus::AdminVerification->value;
            $data['timeline'][] = [
                'message' => "Updating {$service->service_name} airtime topup request status. Requires ".OrderStatus::AdminVerification->label().' confirmation',
                'flag' => 'warn',
                'timestamp' => now(),
            ];
        } else {
            $data['order_data']['assign_order'] = 'no';
            $data['status'] = OrderStatus::Accepted->value;
            $data['order_data']['accepted_at'] = now();
            $data['order_data']['accepted_number'] = entry_number($airtime->order_number, $airtime->sourceCountry->iso3, OrderStatusConfig::Accepted->value);
            $data['order_number'] = $data['order_data']['accepted_number'];
            $data['timeline'][] = [
                'message' => "Waiting for ({$this->serviceVendorModel->service_vendor_name}) to update ".ucwords(strtolower($service->service_name)).' airtime topup request status.',
                'flag' => 'info',
                'timestamp' => now(),
            ];
        }

        if (! transaction()->order()->update($airtime->getKey(), $data)) {
            throw new \ErrorException(__('core::messages.assign_vendor.failed', [
                'slug' => $airtime->vendor,
            ]));
        }

        $airtime->refresh();

        return $airtime;
    }

    /**
     * @throws ErrorException|AirtimeException|VendorNotFoundException
     */
    public function trackOrder(BaseModel $order): mixed
    {
        $response = $this->orderStatus($order);

        return $response->original;
    }

    /**
     * @throws ErrorException
     * @throws VendorNotFoundException
     */
    public function cancelOrder(BaseModel $order): mixed
    {
        $this->initVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * @throws AirtimeException
     * @throws ErrorException|VendorNotFoundException
     */
    public function orderStatus(BaseModel $airtime): AssignVendorVerdict
    {

        if ($airtime->service_vendor_id == config('fintech.business.default_vendor')) {
            throw new AirtimeException(__('core::messages.assign_vendor.not_assigned'));
        }

        $this->initVendor($airtime->vendor);

        return $this->serviceVendorDriver->orderStatus($airtime);
    }

    /**
     * @throws ErrorException|VendorNotFoundException
     */
    public function statusUpdate(BaseModel $airtime): mixed
    {
        $this->initVendor($airtime->vendor);

        $data['timeline'] = $airtime->timeline ?? [];
        $data['order_data'] = $airtime->order_data;
        $data['order_data']['attempts'] = $data['order_data']['attempts'] ?? 0;
        $data['order_data']['attempts']++;

        $service = business()->service()->find($airtime->service_id);

        $data['timeline'][] = [
            'message' => "Attempt #{$data['order_data']['attempts']}. Requesting ({$this->serviceVendorModel->service_vendor_name}) for ".ucwords(strtolower($service->service_name)).' airtime topup progress update.',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $verdict = $this->serviceVendorDriver->orderStatus($airtime);

        $data['timeline'][] = $verdict->timeline;
        $data['notes'] = $verdict->message;
        $data['order_data']['vendor_data']['status_info'][] = $verdict->toArray();

        if ($verdict->status) {
            $data['status'] = OrderStatus::Success->value;
            $data['order_data']['completed_at'] = now();
            $data['timeline'][] = [
                'message' => ucwords(strtolower($service->service_name))." airtime topup order completed by ({$this->serviceVendorModel->service_vendor_name}).",
                'flag' => 'success',
                'timestamp' => now(),
            ];
        } elseif (! $verdict->status && $data['order_data']['attempts'] >= config('fintech.airtime.attempt_threshold', 5)) {
            $data['status'] = OrderStatus::AdminVerification->value;
            $data['timeline'][] = [
                'message' => "Updating {$service->service_name} airtime topup request status. Requires ".OrderStatus::AdminVerification->label().' confirmation',
                'flag' => 'warn',
                'timestamp' => now(),
            ];
        }

        if (! transaction()->order()->update($airtime->getKey(), $data)) {
            throw new \ErrorException(__('core::messages.assign_vendor.failed', [
                'slug' => $airtime->vendor,
            ]));
        }

        return $airtime->refresh();
    }

    /**
     * @throws ErrorException
     * @throws VendorNotFoundException
     */
    public function amendmentOrder(BaseModel $order): mixed
    {
        $this->initVendor($order->vendor);

        return $this->serviceVendorDriver->orderStatus($order);
    }

    /**
     * Recharge Service Packages
     *
     * @throws VendorNotFoundException
     */
    public function rechargePackages(string $slug): array
    {
        $this->initVendor($slug);

        return $this->serviceVendorDriver->servicePackages();
    }
}
