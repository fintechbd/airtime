<?php

// config for Fintech/Airtime
return [

    /*
    |--------------------------------------------------------------------------
    | Enable Module APIs
    |--------------------------------------------------------------------------
    | This setting enable the API will be available or not
    */
    'enabled' => env('PACKAGE_Airtime_ENABLED', true),

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

    'root_prefix' => 'test/',

    /*
    |--------------------------------------------------------------------------
    | BangladeshTopUp Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'bangladesh_top_up_model' => \Fintech\Airtime\Models\BangladeshTopUp::class,

    
    /*
    |--------------------------------------------------------------------------
    | InternationalTopUp Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'international_top_up_model' => \Fintech\Airtime\Models\InternationalTopUp::class,

    //** Model Config Point Do not Remove **//

    /*
    |--------------------------------------------------------------------------
    | Repositories
    |--------------------------------------------------------------------------
    |
    | This value will be used across systems where a repositoy instance is needed
    */

    'repositories' => [
        \Fintech\Airtime\Interfaces\BangladeshTopUpRepository::class => \Fintech\Airtime\Repositories\Eloquent\BangladeshTopUpRepository::class,

        \Fintech\Airtime\Interfaces\InternationalTopUpRepository::class => \Fintech\Airtime\Repositories\Eloquent\InternationalTopUpRepository::class,

        //** Repository Binding Config Point Do not Remove **//
    ],

];
