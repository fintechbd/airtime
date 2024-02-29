<?php

namespace Fintech\Airtime\Repositories\Eloquent;

use Fintech\Airtime\Interfaces\BangladeshTopUpRepository as InterfacesBangladeshTopUpRepository;
use Fintech\Airtime\Models\BangladeshTopUp;
use Fintech\Transaction\Repositories\Eloquent\OrderRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BangladeshTopUpRepository
 */
class BangladeshTopUpRepository extends OrderRepository implements InterfacesBangladeshTopUpRepository
{
    public function __construct()
    {
        parent::__construct(config('fintech.airtime.bangladesh_top_up_model', BangladeshTopUp::class));
    }

    /**
     * return a list or pagination of items from
     * filtered options
     *
     * @return Paginator|Collection
     *
     * @throws BindingResolutionException
     */
    public function list(array $filters = [])
    {
        return parent::list($filters);

    }
}
