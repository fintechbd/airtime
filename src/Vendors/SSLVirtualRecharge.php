<?php

namespace Fintech\Airtime\Vendors;

use ErrorException;
use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Business\Facades\Business;
use Fintech\Core\Abstracts\BaseModel;
use Fintech\MetaData\Facades\MetaData;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SSLVirtualRecharge implements AirtimeTransfer
{
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

        if ($this->config['mode'] === 'sandbox') {
            $this->apiUrl = $this->config[$this->status]['endpoint'];
            $this->status = 'sandbox';

        } else {
            $this->apiUrl = $this->config[$this->status]['endpoint'];
            $this->status = 'live';
        }

        $this->client = Http::withoutVerifying()
            ->baseUrl($this->apiUrl)
            ->acceptJson()
            ->contentType('application/json')
            ->withHeaders([
                'AUTH-KEY' => $this->config[$this->status]['auth_key'],
                'STK-CODE' => $this->config[$this->status]['stk_code'],
            ]);
    }

    /**
     * Method to make a request to the topup service provider
     * for a quotation of the order. that include charge, fee,
     * commission and other information related to order.
     */
    public function requestQuote(BaseModel $order): mixed
    {
        $params = $order->order_data['airtime_data'];
        $params['amount'] = intval($params['amount']);
        $params['recipient_msisdn'] = str_replace(['+88', '88'], '', $params['recipient_msisdn']);
        $params['transaction_id'] = $order->order_number;
        $params['utility_auth_key'] = '';
        $params['utility_secret_key'] = '';

        $serviceStat = Business::serviceStat()->list([
            'role_id' => $order->order_data['service_stat_data']['role_id'],
            'service_id' => $order->order_data['service_stat_data']['service_id'],
            'source_country_id' => $order->order_data['service_stat_data']['source_country_id'],
            'destination_country_id' => $order->order_data['service_stat_data']['destination_country_id'],
            'service_vendor_id' => $order->order_data['service_stat_data']['service_vendor_id'],
            'enabled' => true,
            'paginate' => false,
        ])->first();

        if ($serviceStat) {
            $serviceStatData = $serviceStat->service_stat_data ?? [];
            $params['utility_auth_key'] = $serviceStatData['utility_auth_key'] ?? null;
            $params['utility_secret_key'] = $serviceStatData['utility_secret_key'] ?? null;
        }

        $response = $this->post('/bill-info', $params);

        if ($response['status'] == 'api_success') {
            return [
                'status' => true,
                'amount' => intval($response['data']['total_amount']),
                'message' => $response['status_title'] ?? null,
                'origin_message' => $response,
            ];
        }

        return [
            'status' => false,
            'amount' => null,
            'message' => $response['status_title'] ?? null,
            'origin_message' => $response,
        ];
    }

    private function post($url = '', $payload = []): mixed
    {
        return $this->client->post($url, $payload)->body();
    }

    /**
     * Method to make a request to the topup service provider
     * for an execution of the order.
     *
     * @throws ErrorException
     */
    public function executeOrder(BaseModel $order): mixed
    {
        $params = [
            'transaction_id' => $order->order_data[''],
            'utility_auth_key' => $this->options[$order->order_data['']]['utility_auth_key'],
            'utility_secret_key' => $this->options[$order->order_data['']]['utility_secret_key'],
        ];

        return $this->post('/bill-payment', $params);
    }

    /**
     * Method to make a request to the topup service provider
     * for the progress status of the order.
     *
     * @throws ErrorException
     */
    public function orderStatus(BaseModel $order): mixed
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
        $operators[1] = Business::service()->list(['service_slug' => 'grameen_phone_bd'])->first()->id;
        $operators[2] = Business::service()->list(['service_slug' => 'banglalink_bd'])->first()->id;
        $operators[3] = Business::service()->list(['service_slug' => 'robi_bd'])->first()->id;
        $operators[5] = Business::service()->list(['service_slug' => 'teletalk_bd'])->first()->id;
        $operators[6] = Business::service()->list(['service_slug' => 'airtel_bd'])->first()->id;
        $operators[13] = Business::service()->list(['service_slug' => 'gp_skitto_bd'])->first()->id;

        $bangladesh = MetaData::country()->list(['iso2' => 'BD'])->first();

        if ($response['status'] == 'success') {

            if (!empty($response['data']['triggerAmount']['list'])) {
                foreach ($response['data']['triggerAmount']['list'] as $package) {
                    $temp = $this->mapToServicePackage($package);
                    $temp['service_id'] = $operators[$package['operator_id']] ?? null;
                    $temp['country_id'] = $bangladesh->getkey();

                    $packages[] = $temp;
                }
            }

            if (!empty($response['data']['blockedAmount']['list'])) {
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
            'enabled' => !$blocked,
            'blocked' => $blocked,
            'service_package_data' => [
                'is_popular' => (bool)($package['is_popular'] ?? 0),
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
