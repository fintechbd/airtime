<?php

namespace Fintech\Airtime;

use Fintech\Airtime\Services\AssignVendorService;
use Fintech\Airtime\Services\BangladeshTopUpService;
use Fintech\Airtime\Services\InternationalTopUpService;

class Airtime
{
    public function bangladeshTopUp($filters = null)
    {
        return \singleton(BangladeshTopUpService::class, $filters);
    }

    public function internationalTopUp($filters = null)
    {
        return \singleton(InternationalTopUpService::class, $filters);
    }

    public function assignVendor()
    {
        return \app(AssignVendorService::class);
    }

    //** Crud Service Method Point Do not Remove **//

}
