<?php

namespace Fintech\Airtime;

use Fintech\Airtime\Services\AssignVendorService;
use Fintech\Airtime\Services\BangladeshTopUpService;
use Fintech\Airtime\Services\InternationalTopUpService;

class Airtime
{
    /**
     * @return BangladeshTopUpService
     */
    public function bangladeshTopUp()
    {
        return app(BangladeshTopUpService::class);
    }

    /**
     * @return InternationalTopUpService
     */
    public function internationalTopUp()
    {
        return app(InternationalTopUpService::class);
    }

    public function assignVendor()
    {
        return app(AssignVendorService::class);
    }

    //** Crud Service Method Point Do not Remove **//

}
