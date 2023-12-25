<?php

namespace Fintech\Airtime;

class Airtime
{
    /**
     * @return \Fintech\Airtime\Services\BangladeshTopUpService
     */
    public function bangladeshTopUp()
    {
        return app(\Fintech\Airtime\Services\BangladeshTopUpService::class);
    }

    /**
     * @return \Fintech\Airtime\Services\InternationalTopUpService
     */
    public function internationalTopUp()
    {
        return app(\Fintech\Airtime\Services\InternationalTopUpService::class);
    }

    //** Crud Service Method Point Do not Remove **//


}
