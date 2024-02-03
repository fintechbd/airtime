<?php

namespace Fintech\Airtime\Repositories\Eloquent;

use Fintech\Airtime\Interfaces\BangladeshTopUpRepository as InterfacesBangladeshTopUpRepository;
use Fintech\Core\Repositories\EloquentRepository;
use Fintech\Transaction\Repositories\Eloquent\OrderRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

/**
 * Class BangladeshTopUpRepository
 */
class BangladeshTopUpRepository extends OrderRepository implements InterfacesBangladeshTopUpRepository
{
    public function __construct()
    {
        $model = app(config('fintech.airtime.bangladesh_top_up_model', \Fintech\Airtime\Models\BangladeshTopUp::class));

        if (! $model instanceof Model) {
            throw new InvalidArgumentException("Eloquent repository require model class to be `Illuminate\Database\Eloquent\Model` instance.");
        }

        $this->model = $model;
    }

    /**
     * return a list or pagination of items from
     * filtered options
     *
     * @return Paginator|Collection
     * @throws BindingResolutionException
     */
    public function list(array $filters = [])
    {
        return parent::list($filters);

    }
}
