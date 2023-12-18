<?php

namespace Fintech\Airtime\Services;

use Fintech\Airtime\Interfaces\BangladeshTopUpRepository;

/**
 * Class BangladeshTopUpService
 */
class BangladeshTopUpService
{
    /**
     * BangladeshTopUpService constructor.
     */
    public function __construct(BangladeshTopUpRepository $bangladeshTopUpRepository)
    {
        $this->bangladeshTopUpRepository = $bangladeshTopUpRepository;
    }

    /**
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->bangladeshTopUpRepository->list($filters);

    }

    public function create(array $inputs = [])
    {
        return $this->bangladeshTopUpRepository->create($inputs);
    }

    public function find($id, $onlyTrashed = false)
    {
        return $this->bangladeshTopUpRepository->find($id, $onlyTrashed);
    }

    public function update($id, array $inputs = [])
    {
        return $this->bangladeshTopUpRepository->update($id, $inputs);
    }

    public function destroy($id)
    {
        return $this->bangladeshTopUpRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->bangladeshTopUpRepository->restore($id);
    }

    public function export(array $filters)
    {
        return $this->bangladeshTopUpRepository->list($filters);
    }

    public function import(array $filters)
    {
        return $this->bangladeshTopUpRepository->create($filters);
    }
}
