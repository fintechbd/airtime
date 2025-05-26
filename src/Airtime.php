<?php

namespace Fintech\Airtime;

use Fintech\Airtime\Services\AssignVendorService;
use Fintech\Airtime\Services\BangladeshTopUpService;
use Fintech\Airtime\Services\InternationalTopUpService;
use Fintech\Core\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\Collection;

class Airtime
{
    /**
     * @return BangladeshTopUpService|Collection|BaseModel
     */
    public function bangladeshTopUp($filters = null)
    {
        return \singleton(BangladeshTopUpService::class, $filters);
    }

    /**
     * @return InternationalTopUpService|Collection|BaseModel
     */
    public function internationalTopUp($filters = null)
    {
        return \singleton(InternationalTopUpService::class, $filters);
    }

    /**
     * @param  $filters
     * @return AssignVendorService
     */
    public function assignVendor()
    {
        return \app(AssignVendorService::class);
    }

    // ** Crud Service Method Point Do not Remove **//

}
