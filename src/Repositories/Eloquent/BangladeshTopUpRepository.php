<?php

namespace Fintech\Airtime\Repositories\Eloquent;

use Fintech\Core\Repositories\EloquentRepository;
use Fintech\Airtime\Interfaces\BangladeshTopUpRepository as InterfacesBangladeshTopUpRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

/**
 * Class BangladeshTopUpRepository
 * @package Fintech\Airtime\Repositories\Eloquent
 */
class BangladeshTopUpRepository extends EloquentRepository implements InterfacesBangladeshTopUpRepository
{
    public function __construct()
    {
       $model = app(config('fintech.airtime.bangladesh_top_up_model', \Fintech\Airtime\Models\BangladeshTopUp::class));

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
        $query = $this->model->newQuery();

        //Searching
        if (! empty($filters['search'])) {
            if (is_numeric($filters['search'])) {
                $query->where($this->model->getKeyName(), 'like', "%{$filters['search']}%");
            } else {
                $query->where('name', 'like', "%{$filters['search']}%");
                $query->orWhere('bangladesh_top_up_data', 'like', "%{$filters['search']}%");
            }
        }

        //Display Trashed
        if (isset($filters['trashed']) && $filters['trashed'] === true) {
            $query->onlyTrashed();
        }

        //Handle Sorting
        $query->orderBy($filters['sort'] ?? $this->model->getKeyName(), $filters['dir'] ?? 'asc');

        //Execute Output
        return $this->executeQuery($query, $filters);

    }
}
