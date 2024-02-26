<?php

namespace Fintech\Airtime;

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

    //** Crud Service Method Point Do not Remove **//

}
