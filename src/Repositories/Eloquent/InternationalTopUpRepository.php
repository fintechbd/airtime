<?php

namespace Fintech\Airtime\Repositories\Eloquent;

use Fintech\Airtime\Interfaces\InternationalTopUpRepository as InterfacesInternationalTopUpRepository;
use Fintech\Airtime\Models\InternationalTopUp;
use Fintech\Transaction\Repositories\Eloquent\OrderRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

/**
 * Class InternationalTopUpRepository
 */
class InternationalTopUpRepository extends OrderRepository implements InterfacesInternationalTopUpRepository
{
    public function __construct()
    {
        $model = app(config('fintech.airtime.international_top_up_model', InternationalTopUp::class));

        if (!$model instanceof Model) {
            throw new InvalidArgumentException("Eloquent repository require model class to be `Illuminate\Database\Eloquent\Model` instance.");
        }

        $this->model = $model;
    }

    /**
     * return a list or pagination of items from
     * filtered options
     *
     * @return Paginator|Collection
     */
    public function list(array $filters = [])
    {
        return parent::list($filters);

    }
}
