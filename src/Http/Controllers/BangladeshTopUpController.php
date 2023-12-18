<?php

namespace Fintech\Airtime\Http\Controllers;
use Exception;
use Fintech\Core\Exceptions\StoreOperationException;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Core\Exceptions\DeleteOperationException;
use Fintech\Core\Exceptions\RestoreOperationException;
use Fintech\Core\Traits\ApiResponseTrait;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Airtime\Http\Resources\BangladeshTopUpResource;
use Fintech\Airtime\Http\Resources\BangladeshTopUpCollection;
use Fintech\Airtime\Http\Requests\ImportBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\StoreBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\UpdateBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\IndexBangladeshTopUpRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Class BangladeshTopUpController
 * @package Fintech\Airtime\Http\Controllers
 *
 * @lrd:start
 * This class handle create, display, update, delete & restore
 * operation related to BangladeshTopUp
 * @lrd:end
 *
 */

class BangladeshTopUpController extends Controller
{
    use ApiResponseTrait;

    /**
     * @lrd:start
     * Return a listing of the *BangladeshTopUp* resource as collection.
     *
     * *```paginate=false``` returns all resource as list not pagination*
     * @lrd:end
     *
     * @param IndexBangladeshTopUpRequest $request
     * @return BangladeshTopUpCollection|JsonResponse
     */
    public function index(IndexBangladeshTopUpRequest $request): BangladeshTopUpCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();

            $bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->list($inputs);

            return new BangladeshTopUpCollection($bangladeshTopUpPaginate);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a new *BangladeshTopUp* resource in storage.
     * @lrd:end
     *
     * @param StoreBangladeshTopUpRequest $request
     * @return JsonResponse
     * @throws StoreOperationException
     */
    public function store(StoreBangladeshTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $bangladeshTopUp = Airtime::bangladeshTopUp()->create($inputs);

            if (!$bangladeshTopUp) {
                throw (new StoreOperationException)->setModel(config('fintech.airtime.bangladesh_top_up_model'));
            }

            return $this->created([
                'message' => __('core::messages.resource.created', ['model' => 'Bangladesh Top Up']),
                'id' => $bangladeshTopUp->id
             ]);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Return a specified *BangladeshTopUp* resource found by id.
     * @lrd:end
     *
     * @param string|int $id
     * @return BangladeshTopUpResource|JsonResponse
     * @throws ModelNotFoundException
     */
    public function show(string|int $id): BangladeshTopUpResource|JsonResponse
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (!$bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return new BangladeshTopUpResource($bangladeshTopUp);

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Update a specified *BangladeshTopUp* resource using id.
     * @lrd:end
     *
     * @param UpdateBangladeshTopUpRequest $request
     * @param string|int $id
     * @return JsonResponse
     * @throws ModelNotFoundException
     * @throws UpdateOperationException
     */
    public function update(UpdateBangladeshTopUpRequest $request, string|int $id): JsonResponse
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (!$bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            $inputs = $request->validated();

            if (!Airtime::bangladeshTopUp()->update($id, $inputs)) {

                throw (new UpdateOperationException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return $this->updated(__('core::messages.resource.updated', ['model' => 'Bangladesh Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Soft delete a specified *BangladeshTopUp* resource using id.
     * @lrd:end
     *
     * @param string|int $id
     * @return JsonResponse
     * @throws ModelNotFoundException
     * @throws DeleteOperationException
     */
    public function destroy(string|int $id)
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (!$bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            if (!Airtime::bangladeshTopUp()->destroy($id)) {

                throw (new DeleteOperationException())->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return $this->deleted(__('core::messages.resource.deleted', ['model' => 'Bangladesh Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Restore the specified *BangladeshTopUp* resource from trash.
     * ** ```Soft Delete``` needs to enabled to use this feature**
     * @lrd:end
     *
     * @param string|int $id
     * @return JsonResponse
     */
    public function restore(string|int $id)
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id, true);

            if (!$bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            if (!Airtime::bangladeshTopUp()->restore($id)) {

                throw (new RestoreOperationException())->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return $this->restored(__('core::messages.resource.restored', ['model' => 'Bangladesh Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a exportable list of the *BangladeshTopUp* resource as document.
     * After export job is done system will fire  export completed event
     *
     * @lrd:end
     *
     * @param IndexBangladeshTopUpRequest $request
     * @return JsonResponse
     */
    public function export(IndexBangladeshTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->export($inputs);

            return $this->exported(__('core::messages.resource.exported', ['model' => 'Bangladesh Top Up']));

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a exportable list of the *BangladeshTopUp* resource as document.
     * After export job is done system will fire  export completed event
     *
     * @lrd:end
     *
     * @param ImportBangladeshTopUpRequest $request
     * @return BangladeshTopUpCollection|JsonResponse
     */
    public function import(ImportBangladeshTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->list($inputs);

            return new BangladeshTopUpCollection($bangladeshTopUpPaginate);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }
}
