<?php

namespace Fintech\Airtime\Vendors;

use Fintech\Airtime\Contracts\AirtimeTransfer;
use Fintech\Core\Abstracts\BaseModel;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SSLVirtualRecharge implements AirtimeTransfer
{
    const OPERATORS = [
        'grameenphone' => 1,
        'banglalink' => 2,
        'robi' => 3,
        'teletalk' => 5,
        'airtel' => 6,
    ];

    const CONNECTION_TYPE = [
        'prepaid' => 'prepaid',
        'postpaid' => 'postpaid',
    ];

    const ERROR_MESSAGES = [
        100 => 'The Recharge request has been created but is waiting for initiation.',
        200 => 'Recharge request has been initiated for processing.',
        201 => 'Processing has started.',
        202 => 'Recharge request has been successfully submitted to Operator for processing.',
        203 => 'This recharge will be retried as it had not been successful in first try.',
        300 => 'Error while in process.',
        301 => 'IN Error.',
        302 => "The recharge recipient's phone number is invalid.",
        303 => 'The recharge recipient phone number is not prepaid type.',
        304 => 'The recharge amount is either invalid or out of operator assigned valid range.',
        305 => 'This recharge recipient phone number is barred by the operator.',
        306 => 'This recharge recipient phone number has crossed the maximum recharge limit.',
        307 => 'This recharge has been denied because it was within the consecutive recharge time interval limit.',
        308 => 'IN Connectivity Error.',
        309 => 'You do not have sufficient stock to do this recharge.',
        310 => 'The Recharge service is unavailable at this moment. Pls, try again later.',
        311 => 'The Recharge could not be processed due to a technical issue. Pls, try again later.',
        312 => 'The MSISDN and Amount could not be verified.',
        313 => 'You have provided an invalid password.',
        314 => 'External Server Connection Authentication Failed.',
        315 => 'External Entity Not Found.',
        316 => 'Invalid information for External Entity.',
        317 => 'External Entity Suspended.',
        318 => 'Invalid XML Format.',
        319 => 'The Recharge MSISDN or Amount id in invalid format.',
        320 => 'The Recharge MSISDN Prefix could not be found.',
        321 => 'Location is not allowed for External Entity.',
        322 => 'External Entity is not associated with any Partner.',
        323 => 'External Entity Credit Limit not defined.',
        324 => 'External Entity Max Daily Credit Limit Reached.',
        325 => 'External Entity Max Weekly Credit Limit Reached.',
        326 => 'External Entity Max Monthly Credit Limit Reached.',
        327 => 'Invalid Message.',
        328 => 'Subscriber Not Found.',
        329 => 'Subscriber is barred.',
        330 => 'Caught recharge with same amount within Successful Recharge Block Time.',
        331 => 'Service Unavailable.',
        332 => 'IN Response Time out (Ambiguous Case).',
        333 => 'Internal System Error.',
        334 => 'Account number not found.',
        335 => 'Account Expired.',
        336 => 'Used for first time or invalid.',
        337 => 'Subscriber not activated.',
        338 => 'No PPS information.',
        339 => 'Recharge fail.',
        340 => 'Transaction SN repeated.',
        341 => 'Recharge succeeded but login failed.',
        342 => 'Querying area code failed (reversed but currently not in use).',
        343 => 'Querying the validity period corresponding to the recharge amount failed.',
        344 => 'Reaching the max of registered subscribers.',
        345 => 'Service data is not configured.',
        346 => 'Invalid Connection Type. Please use prepaid or postpaid as field value.',
        347 => 'This operator is not supported at the moment.',
        348 => 'This operator is unknown.',
        349 => 'This GUID has already been used. Please provide an unique GUID.',
        350 => 'This GUID is invalid. Please combine alphanumeric characters of length 25 for GUID.',
        351 => 'This GUID could not be found. Pls try with a valid Recharge Request GUID.',
        352 => 'This recharge cycle has ended. It cannot be initiated or canceled.',
        353 => 'This MSISDN has already been recharged once moments ago.',
        354 => 'Your account with VR is currently inactive.',
        380 => 'This Recharge could not be confirmed and is tagged as a permanent failure.',
        398 => 'General Exception.',
        399 => 'Unknown Status due to Technical fault or any other general or critical error.',
        400 => 'This Recharge has been canceled by the client.',
        800 => 'Test Successful Recharge. Recharge is marked as complete for testing purpose.',
        900 => 'Successful Recharge.',
        999 => 'Other.',
    ];

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

    private mixed $options;

    /**
     * SSLVirtualRecharge constructor.
     */
    public function __construct()
    {
        $this->config = config('fintech.airtime.providers.ssvr');

        if ($this->config['mode'] === 'sandbox') {
            $this->apiUrl = $this->config[$this->status]['endpoint'];
            $this->status = 'sandbox';

        } else {
            $this->apiUrl = $this->config[$this->status]['endpoint'];
            $this->status = 'live';
        }

        $this->options = $this->config['options'];

        $this->client = Http::withoutVerifying()
            ->baseUrl($this->apiUrl)
            ->acceptJson()
            ->contentType('application/json')
            ->withHeaders([
                'AUTH-KEY' => $this->config[$this->status]['auth_key'],
                'STK-CODE' => $this->config[$this->status]['stk_code'],
            ]);
    }

    private function get($url = '', $payload = [])
    {
        return $this->client->get($url, $payload)->json();

    }

    private function post($url = '', $payload = [])
    {
        return $this->client->post($url, $payload)->json();
    }

    /**
     * Method to make a request to the topup service provider
     * for a quotation of the order. that include charge, fee,
     * commission and other information related to order.
     *
     * @throws \ErrorException
     */
    public function requestQuote(BaseModel $order): mixed
    {
        $params = [
            'transaction_id' => $order->order_data[''],
            'operator_id' => self::OPERATORS[$order->order_data['']],
            'recipient_msisdn' => str_replace('+88', '', $order->order_data['']),
            'amount' => (int) $order->amount,
            'connection_type' => self::CONNECTION_TYPE[$order->order_data['']],
            'utility_auth_key' => $this->options[$order->order_data['']]['utility_auth_key'],
            'utility_secret_key' => $this->options[$order->order_data['']]['utility_secret_key'],
        ];

        return $this->post('/bill-info', $params);
    }

    /**
     * Method to make a request to the topup service provider
     * for an execution of the order.
     *
     * @throws \ErrorException
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
     * @throws \ErrorException
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
     * @throws \ErrorException
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
     * @throws \ErrorException
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
}