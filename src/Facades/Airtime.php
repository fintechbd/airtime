<?php

namespace Fintech\Airtime\Facades;

use Fintech\Airtime\Services\AssignVendorService;
use Fintech\Airtime\Services\BangladeshTopUpService;
use Fintech\Airtime\Services\InternationalTopUpService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static BangladeshTopUpService bangladeshTopUp()
 * @method static InternationalTopUpService internationalTopUp()
 * @method static AssignVendorService assignVendor()
 *                                                               // Crud Service Method Point Do not Remove //
 *
 * @see \Fintech\Airtime\Airtime
 */
class Airtime extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Fintech\Airtime\Airtime::class;
    }
}
