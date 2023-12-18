<?php

namespace Fintech\Airtime\Repositories\Mongodb;

use Fintech\Core\Repositories\MongodbRepository;
use Fintech\Airtime\Interfaces\BangladeshTopUpRepository as InterfacesBangladeshTopUpRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use MongoDB\Laravel\Eloquent\Model;
use InvalidArgumentException;

/**
 * Class BangladeshTopUpRepository
 * @package Fintech\Airtime\Repositories\Mongodb
 */
class BangladeshTopUpRepository extends MongodbRepository implements InterfacesBangladeshTopUpRepository
{
    public function __construct()
    {
       $model = app(config('fintech.airtime.bangladesh_top_up_model', \Fintech\Airtime\Models\BangladeshTopUp::class));

       if (!$model instanceof Model) {
           throw new InvalidArgumentException("Mongodb repository require model class to be `MongoDB\Laravel\Eloquent\Model` instance.");
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
