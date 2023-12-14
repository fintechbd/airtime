<?php

namespace Fintech\Airtime\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * // Crud Service Method Point Do not Remove //
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
