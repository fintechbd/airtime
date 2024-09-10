<?php

// config for Fintech/Airtime
use Fintech\Airtime\Models\BangladeshTopUp;
use Fintech\Airtime\Models\InternationalTopUp;
use Fintech\Airtime\Repositories\Eloquent\BangladeshTopUpRepository;
use Fintech\Airtime\Repositories\Eloquent\InternationalTopUpRepository;

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Module APIs
    |--------------------------------------------------------------------------
    | This setting enable the API will be available or not
    */
    'enabled' => env('PACKAGE_AIRTIME_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Airtime Group Root Prefix
    |--------------------------------------------------------------------------
    |
    | This value will be added to all your routes from this package
    | Example: APP_URL/{root_prefix}/api/airtime/action
    |
    | Note: while adding prefix add closing ending slash '/'
    */

    'root_prefix' => 'api/',

    /*
    |--------------------------------------------------------------------------
    | BangladeshTopUp Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'bangladesh_top_up_model' => BangladeshTopUp::class,

    /*
    |--------------------------------------------------------------------------
    | InternationalTopUp Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'international_top_up_model' => InternationalTopUp::class,

    //** Model Config Point Do not Remove **//

    /*
    |--------------------------------------------------------------------------
    | Service Providers
    |--------------------------------------------------------------------------
    |
    | This value will be used across systems where a repository instance is needed
    */
    'providers' => [
        'sslwireless' => [
            'mode' => 'sandbox',
            'driver' => Fintech\Airtime\Vendors\SSLVirtualRecharge::class,
            'live' => [
                'endpoint' => 'https://api.sslwireless.com/api',
                'auth_key' => env('PACKAGE_AIRTIME_SSLVR_AUTH_KEY'),
                'stk_code' => env('PACKAGE_AIRTIME_SSLVR_STK_CODE'),
            ],
            'sandbox' => [
                'endpoint' => 'https://api.sslwireless.com/api',
                'auth_key' => env('PACKAGE_AIRTIME_SSLVR_AUTH_KEY'),
                'stk_code' => env('PACKAGE_AIRTIME_SSLVR_STK_CODE'),
            ],
            'options' => [
                'airtel' => [
                    'utility_auth_key' => 'VR15310354477640',
                    'utility_secret_key' => 'fyj8yjmgvJlI9ou8',
                ],
                'banglalink' => [
                    'utility_auth_key' => 'VR15310354624794',
                    'utility_secret_key' => 'MvJhdoFWAcf8ZkEi',
                ],
                'grameenphone' => [
                    'utility_auth_key' => 'VR15208384253881',
                    'utility_secret_key' => 'zKDSu0MJ2qWcRiI8',
                ],
                'robi' => [
                    'utility_auth_key' => 'VR15310354922071',
                    'utility_secret_key' => 'fXJ0gotvoVHnyY3M',
                ],
                'teletalk' => [
                    'utility_auth_key' => 'VR15310355096848',
                    'utility_secret_key' => 'szbrpaBFunmpNBZ0',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Repositories
    |--------------------------------------------------------------------------
    |
    | This value will be used across systems where a repository instance is needed
    */

    'repositories' => [
        \Fintech\Airtime\Interfaces\BangladeshTopUpRepository::class => BangladeshTopUpRepository::class,

        \Fintech\Airtime\Interfaces\InternationalTopUpRepository::class => InternationalTopUpRepository::class,

        //** Repository Binding Config Point Do not Remove **//
    ],

];
