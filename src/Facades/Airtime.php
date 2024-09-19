<?php

namespace Fintech\Airtime\Facades;

use Fintech\Airtime\Services\AssignVendorService;
use Fintech\Airtime\Services\BangladeshTopUpService;
use Fintech\Airtime\Services\InternationalTopUpService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Support\Collection|BangladeshTopUpService bangladeshTopUp(array $filters = null)
 * @method static \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Support\Collection|InternationalTopUpService internationalTopUp(array $filters = null)
 * @method static \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Support\Collection|AssignVendorService assignVendor(array $filters = null)
 *                                                                                                                                                  // Crud Service Method Point Do not Remove //
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
