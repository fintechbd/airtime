<?php

namespace Fintech\Airtime\Repositories\Eloquent;

use Fintech\Airtime\Interfaces\InternationalTopUpRepository as InterfacesInternationalTopUpRepository;
use Fintech\Airtime\Models\InternationalTopUp;
use Fintech\Transaction\Repositories\Eloquent\OrderRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class InternationalTopUpRepository
 */
class InternationalTopUpRepository extends OrderRepository implements InterfacesInternationalTopUpRepository
{
    public function __construct()
    {
        parent::__construct(config('fintech.airtime.international_top_up_model', InternationalTopUp::class));
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
