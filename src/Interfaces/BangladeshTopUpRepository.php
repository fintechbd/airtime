<?php

namespace Fintech\Airtime\Interfaces;

use Fintech\Core\Abstracts\BaseModel;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * Interface BangladeshTopUpRepository
 */
interface BangladeshTopUpRepository
{
    /**
     * return a list or pagination of items from
     * filtered options
     *
     * @param array $filters
     * @return Paginator|Collection
     */
    public function list(array $filters = []): Paginator|Collection;

    /**
     * Create a new entry resource
     *
     * @param array $attributes
     * @return BaseModel
     */
    public function create(array $attributes = []): BaseModel;

    /**
     * find and update a resource attributes
     *
     * @param int|string $id
     * @param array $attributes
     * @return BaseModel
     */
    public function update(int|string $id, array $attributes = []): BaseModel;

    /**
     * find and delete a entry from records
     *
     * @param int|string $id
     * @param bool $onlyTrashed
     * @return ?BaseModel
     */
    public function find(int|string $id, $onlyTrashed = false): ?BaseModel;

    /**
     * find and delete a entry from records
     */
    public function delete(int|string $id);

    /**
     * find and restore a entry from records
     *
     * @throws InvalidArgumentException
     */
    public function restore(int|string $id);
}
