<?php

namespace Fintech\Airtime\Http\Controllers;
use Exception;
use Fintech\Core\Exceptions\StoreOperationException;
use Fintech\Core\Exceptions\UpdateOperationException;
use Fintech\Core\Exceptions\DeleteOperationException;
use Fintech\Core\Exceptions\RestoreOperationException;
use Fintech\Core\Traits\ApiResponseTrait;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Airtime\Http\Resources\InternationalTopUpResource;
use Fintech\Airtime\Http\Resources\InternationalTopUpCollection;
use Fintech\Airtime\Http\Requests\ImportInternationalTopUpRequest;
use Fintech\Airtime\Http\Requests\StoreInternationalTopUpRequest;
use Fintech\Airtime\Http\Requests\UpdateInternationalTopUpRequest;
use Fintech\Airtime\Http\Requests\IndexInternationalTopUpRequest;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Class InternationalTopUpController
 * @package Fintech\Airtime\Http\Controllers
 *
 * @lrd:start
 * This class handle create, display, update, delete & restore
 * operation related to InternationalTopUp
 * @lrd:end
 *
 */

class InternationalTopUpController extends Controller
{
    use ApiResponseTrait;

    /**
     * @lrd:start
     * Return a listing of the *InternationalTopUp* resource as collection.
     *
     * *```paginate=false``` returns all resource as list not pagination*
     * @lrd:end
     *
     * @param IndexInternationalTopUpRequest $request
     * @return InternationalTopUpCollection|JsonResponse
     */
    public function index(IndexInternationalTopUpRequest $request): InternationalTopUpCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();
            //$inputs['transaction_form_id'] = Transaction::transactionForm()->list(['code' => 'international_top_up'])->first()->getKey();
            $inputs['transaction_form_code'] = 'international_top_up';
            //$inputs['service_id'] = Business::serviceType()->list(['service_type_slug'=>'international_top_up']);
            $inputs['service_type_slug'] = 'international_top_up';
            //$internationalTopUpPaginate = Airtime::internationalTopUp()->list($inputs);
            $internationalTopUpPaginate = Transaction::order()->list($inputs);

            return new InternationalTopUpCollection($internationalTopUpPaginate);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a new *InternationalTopUp* resource in storage.
     * @lrd:end
     *
     * @param StoreInternationalTopUpRequest $request
     * @return JsonResponse
     * @throws StoreOperationException
     */
    public function store(StoreInternationalTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $internationalTopUp = Airtime::internationalTopUp()->create($inputs);

            if (!$internationalTopUp) {
                throw (new StoreOperationException)->setModel(config('fintech.airtime.international_top_up_model'));
            }

            return $this->created([
                'message' => __('core::messages.resource.created', ['model' => 'International Top Up']),
                'id' => $internationalTopUp->id
             ]);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Return a specified *InternationalTopUp* resource found by id.
     * @lrd:end
     *
     * @param string|int $id
     * @return InternationalTopUpResource|JsonResponse
     * @throws ModelNotFoundException
     */
    public function show(string|int $id): InternationalTopUpResource|JsonResponse
    {
        try {

            $internationalTopUp = Airtime::internationalTopUp()->find($id);

            if (!$internationalTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            return new InternationalTopUpResource($internationalTopUp);

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Update a specified *InternationalTopUp* resource using id.
     * @lrd:end
     *
     * @param UpdateInternationalTopUpRequest $request
     * @param string|int $id
     * @return JsonResponse
     * @throws ModelNotFoundException
     * @throws UpdateOperationException
     */
    public function update(UpdateInternationalTopUpRequest $request, string|int $id): JsonResponse
    {
        try {

            $internationalTopUp = Airtime::internationalTopUp()->find($id);

            if (!$internationalTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            $inputs = $request->validated();

            if (!Airtime::internationalTopUp()->update($id, $inputs)) {

                throw (new UpdateOperationException)->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            return $this->updated(__('core::messages.resource.updated', ['model' => 'International Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Soft delete a specified *InternationalTopUp* resource using id.
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

            $internationalTopUp = Airtime::internationalTopUp()->find($id);

            if (!$internationalTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            if (!Airtime::internationalTopUp()->destroy($id)) {

                throw (new DeleteOperationException())->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            return $this->deleted(__('core::messages.resource.deleted', ['model' => 'International Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Restore the specified *InternationalTopUp* resource from trash.
     * ** ```Soft Delete``` needs to enabled to use this feature**
     * @lrd:end
     *
     * @param string|int $id
     * @return JsonResponse
     */
    public function restore(string|int $id)
    {
        try {

            $internationalTopUp = Airtime::internationalTopUp()->find($id, true);

            if (!$internationalTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            if (!Airtime::internationalTopUp()->restore($id)) {

                throw (new RestoreOperationException())->setModel(config('fintech.airtime.international_top_up_model'), $id);
            }

            return $this->restored(__('core::messages.resource.restored', ['model' => 'International Top Up']));

        } catch (ModelNotFoundException $exception) {

            return $this->notfound($exception->getMessage());

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a exportable list of the *InternationalTopUp* resource as document.
     * After export job is done system will fire  export completed event
     *
     * @lrd:end
     *
     * @param IndexInternationalTopUpRequest $request
     * @return JsonResponse
     */
    public function export(IndexInternationalTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $internationalTopUpPaginate = Airtime::internationalTopUp()->export($inputs);

            return $this->exported(__('core::messages.resource.exported', ['model' => 'International Top Up']));

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }

    /**
     * @lrd:start
     * Create a exportable list of the *InternationalTopUp* resource as document.
     * After export job is done system will fire  export completed event
     *
     * @lrd:end
     *
     * @param ImportInternationalTopUpRequest $request
     * @return InternationalTopUpCollection|JsonResponse
     */
    public function import(ImportInternationalTopUpRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $internationalTopUpPaginate = Airtime::internationalTopUp()->list($inputs);

            return new InternationalTopUpCollection($internationalTopUpPaginate);

        } catch (Exception $exception) {

            return $this->failed($exception->getMessage());
        }
    }
}
