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

    //** Crud Service Method Point Do not Remove **//

}
