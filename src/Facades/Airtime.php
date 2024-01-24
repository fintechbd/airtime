<?php

namespace Fintech\Airtime\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Fintech\Airtime\Services\BangladeshTopUpService bangladeshTopUp()
 * @method static \Fintech\Airtime\Services\InternationalTopUpService internationalTopUp()
 *                                                                                         // Crud Service Method Point Do not Remove //
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
