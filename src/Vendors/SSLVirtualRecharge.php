<?php

namespace Fintech\Airtime\Vendors;

use ErrorException;
use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Business\Facades\Business;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Supports\AssignVendorVerdict;
use Fintech\MetaData\Facades\MetaData;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SSLVirtualRecharge implements AirtimeTransfer
{
    const RECHARGE_SUCCESSFUL = 900;

    /**
     * SSLVirtualRecharge configuration.
     *
     * @var array
     */
    private mixed $config;

    /**
     * SSLVirtualRecharge Url.
     *
     * @var string
     */
    private mixed $apiUrl;

    private string $status = 'sandbox';

    private PendingRequest $client;

    /**
     * SSLVirtualRecharge constructor.
     */
    public function __construct()
    {
        $this->config = config('fintech.airtime.providers.sslwireless');
        $this->status = config('fintech.airtime.providers.sslwireless.mode');
        $this->apiUrl = $this->config[$this->status]['endpoint'];

        $this->client = Http::withoutVerifying()
            ->baseUrl($this->apiUrl)
            ->acceptJson()
            ->contentType('application/json')
            ->withHeaders([
                'AUTH-KEY' => $this->config[$this->status]['auth_key'],
                'STK-CODE' => $this->config[$this->status]['stk_code'],
            ]);
    }

    private function injectAuthKeys($order, &$params): void
    {
        $serviceStat = Business::serviceStat()->findWhere([
            'role_id' => $order->order_data['role_id'],
            'service_id' => $order->service_id,
            'source_country_id' => $order->source_country_id,
            'destination_country_id' => $order->destination_country_id,
            'service_vendor_id' => $order->service_vendor_id,
            'enabled' => true,
            'paginate' => false,
        ]);

        $serviceStatData = $serviceStat?->service_stat_data ?? [];
        $params['utility_auth_key'] = $serviceStatData['utility_auth_key'] ?? '';
        $params['utility_secret_key'] = $serviceStatData['utility_secret_key'] ?? '';
    }

    private function post($url = '', $payload = []): mixed
    {
        return $this->client->post($url, $payload)->json();
    }

    /**
     * Method to make a request to the topup service provider
     * for a quotation of the order. that include charge, fee,
     * commission and other information related to order.
     */
    public function requestQuote(BaseModel $order): AssignVendorVerdict
    {
        $params = $order->order_data['airtime_data'];
        $params['amount'] = intval($params['amount']);
        $params['transaction_id'] = $order->order_number;
        $params['recipient_msisdn'] = Str::substr($order->order_data['receiver_mobile_number'], -11);
        $params['connection_type'] = $order->order_data['connection_type'];

        $this->injectAuthKeys($order, $params);

        $response = $this->post('/bill-info', $params);

        $verdict = AssignVendorVerdict::make();

        if ($response['status'] == 'api_success') {
            $verdict->status(true)
                ->amount($response['data']['total_amount'])
                ->message($response['status_title'] ?? null)
                ->ref_number($response['transaction_id'])
                ->original($response);

            return $verdict->orderTimeline('(SSL Wireless)  virtual recharge responded with '.strtolower($verdict->message));
        }

        $verdict->status(false)
            ->original($response)
            ->amount(0)
            ->ref_number($params['transaction_id'])
            ->message($response['message'] ?? null);

        return $verdict->orderTimeline('(SSL Wireless)  virtual recharge reported error: '.strtolower($verdict->message), 'error');
    }

    /**
     * Method to make a request to the topup service provider
     * for an execution of the order.
     *
     * @throws ErrorException
     */
    public function executeOrder(BaseModel $order): mixed
    {
        $params['transaction_id'] = $order->order_number;

        $this->injectAuthKeys($order, $params);

        $response = $this->post('/bill-payment', $params);

        $verdict = AssignVendorVerdict::make();

        if ($response['status'] == 'payment_success') {
            $verdict->status(true)
                ->message($response['data']['message'] ?? $response['status_title'] ?? '')
                ->ref_number($response['data']['vr_guid'])
                ->original($response);

            return $verdict->orderTimeline('(SSL Wireless) virtual recharge responded with '.strtolower($verdict->message).'.');
        }

        $verdict->original($response)
            ->ref_number($params['transaction_id'])
            ->message($response['message'] ?? null);

        return $verdict->orderTimeline('(SSL Wireless) virtual recharge reported error: '.strtolower($verdict->message), 'error');
    }

    /**
     * Method to make a request to the topup service provider
     * for the progress status of the order.
     *
     * @throws ErrorException
     */
    public function orderStatus(BaseModel $order): mixed
    {
        $params['transaction_id'] = $order->order_number;

        $this->injectAuthKeys($order, $params);

        $response = $this->post('/bill-status', $params);

        $verdict = AssignVendorVerdict::make();

        if ($response['status'] == 'success') {
            $verdict->status($response['data']['recharge_status'] == self::RECHARGE_SUCCESSFUL)
                ->message($response['data']['message'] ?? $response['status_title'] ?? '')
                ->ref_number($response['data']['vr_guid'])
                ->original($response);

            return $verdict->orderTimeline('(SSL Wireless) virtual recharge responded with '.strtolower($verdict->message));
        }

        $verdict->status(false)
            ->original($response)
            ->ref_number($params['transaction_id'])
            ->message($response['message'] ?? null);

        return $verdict->orderTimeline('(SSL Wireless) virtual recharge reported error: '.strtolower($verdict->message), 'error');
    }

    /**
     * Method to make a request to the topup service provider
     * for the track real-time progress of the order.
     *
     * @throws ErrorException
     */
    public function trackOrder(BaseModel $order): mixed
    {
        $params = [
            'transaction_id' => $order->order_data[''],
            'utility_auth_key' => $this->options[$order->order_data['']]['utility_auth_key'],
            'utility_secret_key' => $this->options[$order->order_data['']]['utility_secret_key'],
        ];

        return $this->post('/bill-status', $params);
    }

    /**
     * Method to make a request to the topup service provider
     * for the cancellation of the order.
     *
     * @throws ErrorException
     */
    public function cancelOrder(BaseModel $order): mixed
    {
        $params = [
            'transaction_id' => $order->order_data[''],
            'utility_auth_key' => $this->options[$order->order_data['']]['utility_auth_key'],
            'utility_secret_key' => $this->options[$order->order_data['']]['utility_secret_key'],
        ];

        return $this->post('/bill-cancel', $params);
    }

    /**
     * Method to request all the service packages available through
     * this service vendor
     */
    public function servicePackages(): array
    {
        $response = (config('fintech.airtime.providers.sslwireless.test'))
            ? json_decode(file_get_contents(base_path('sslvr.json')), true)
            : $this->post('/vr/package-list');

        $packages = [];
        $operators = [];
        $operators[1] = Business::service()->findWhere(['service_slug' => 'grameen_phone_bd'])->id;
        $operators[2] = Business::service()->findWhere(['service_slug' => 'banglalink_bd'])->id;
        $operators[3] = Business::service()->findWhere(['service_slug' => 'robi_bd'])->id;
        $operators[5] = Business::service()->findWhere(['service_slug' => 'teletalk_bd'])->id;
        $operators[6] = Business::service()->findWhere(['service_slug' => 'airtel_bd'])->id;
        $operators[13] = Business::service()->findWhere(['service_slug' => 'gp_skitto_bd'])->id;

        $bangladesh = MetaData::country()->findWhere(['iso2' => 'BD']);

        if ($response['status'] == 'success') {

            if (! empty($response['data']['triggerAmount']['list'])) {
                foreach ($response['data']['triggerAmount']['list'] as $package) {
                    $temp = $this->mapToServicePackage($package);
                    $temp['service_id'] = $operators[$package['operator_id']] ?? null;
                    $temp['country_id'] = $bangladesh->getkey();

                    $packages[] = $temp;
                }
            }

            if (! empty($response['data']['blockedAmount']['list'])) {
                foreach ($response['data']['blockedAmount']['list'] as $package) {
                    $temp = $this->mapToServicePackage($package, true);
                    $temp['service_id'] = $operators[$package['operator_id']] ?? null;
                    $temp['country_id'] = $bangladesh->getkey();

                    $packages[] = $temp;
                }
            }
        }

        return $packages;
    }

    private function mapToServicePackage(array $package, bool $blocked = false): array
    {
        $model = [
            'name' => $package['offer_title'] ? filter_var($package['offer_title'], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH) : null,
            'description' => $package['offer_description'] ? filter_var($package['offer_description'], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH) : null,
            'type' => $package['offer_type'] ?? 'combo',
            'amount' => intval($package['amount'] ?? '0'),
            'enabled' => ! $blocked,
            'blocked' => $blocked,
            'service_package_data' => [
                'is_popular' => (bool) ($package['is_popular'] ?? 0),
                'connection_type' => $package['connection_type'] ?? 'prepaid',
                'validity_seconds' => $package['offer_validity_seconds'] ?? 999999999,
                'validity' => $package['offer_validity'] ?? 'N/A',
            ],
        ];

        $model['slug'] = Str::slug($model['name']);

        $model['name'] = trim(preg_replace('/^(.*), (.*)$/i', '$1', $model['name']));

        return $model;
    }
}
