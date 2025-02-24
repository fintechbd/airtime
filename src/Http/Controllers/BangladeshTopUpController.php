<?php

namespace Fintech\Airtime\Http\Controllers;

use Exception;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Airtime\Http\Requests\IndexBangladeshTopUpRequest;
use Fintech\Airtime\Http\Requests\StoreBangladeshTopUpRequest;
use Fintech\Airtime\Http\Resources\BangladeshTopUpCollection;
use Fintech\Airtime\Http\Resources\BangladeshTopUpResource;
use Fintech\Airtime\Jobs\BangladeshTopUp\SslWirelessPackageSyncJob;
use Fintech\Business\Facades\Business;
use Fintech\Core\Exceptions\StoreOperationException;
use Fintech\Transaction\Facades\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class BangladeshTopUpController
 *
 * @lrd:start
 * This class handle create, display, update, delete & restore
 * operation related to BangladeshTopUp
 *
 * @lrd:end
 */
class BangladeshTopUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('imposter', ['only' => ['store']]);
    }

    /**
     * @lrd:start
     * Return a listing of the *BangladeshTopUp* resource as collection.
     *
     * *```paginate=false``` returns all resource as list not pagination*
     *
     * @lrd:end
     */
    public function index(IndexBangladeshTopUpRequest $request): BangladeshTopUpCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();

            $inputs['transaction_form_id'] = Transaction::transactionForm()->findWhere(['code' => 'bangladesh_top_up'])->getKey();

            if ($request->isAgent()) {
                $inputs['creator_id'] = $request->user('sanctum')->getKey();
            }

            $bangladeshTopUpPaginate = Airtime::bangladeshTopUp()->list($inputs);

            return new BangladeshTopUpCollection($bangladeshTopUpPaginate);

        } catch (Exception $exception) {

            return response()->failed($exception);
        }
    }

    /**
     * @lrd:start
     * Create a new *BangladeshTopUp* resource in storage.
     *
     * @lrd:end
     *
     * @throws StoreOperationException
     */
    public function store(StoreBangladeshTopUpRequest $request): JsonResponse
    {
        $inputs = $request->validated();

        $inputs['user_id'] = ($request->filled('user_id')) ? $request->input('user_id') : $request->user('sanctum')->getKey();

        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->create($inputs);

            return response()->created([
                'message' => __('core::messages.transaction.request_created', ['service' => 'Bangladesh TopUp']),
                'id' => $bangladeshTopUp->getKey(),
                'order_number' => $bangladeshTopUp->order_number ?? $bangladeshTopUp->order_data['purchase_number'],
            ]);

        } catch (Exception $exception) {
            Transaction::orderQueue()->removeFromQueueUserWise($inputs['user_id']);

            return response()->failed($exception);
        }
    }

    /**
     * @lrd:start
     * Return a specified *BangladeshTopUp* resource found by id.
     *
     * @lrd:end
     *
     * @throws ModelNotFoundException
     */
    public function show(string|int $id): BangladeshTopUpResource|JsonResponse
    {
        try {

            $bangladeshTopUp = Airtime::bangladeshTopUp()->find($id);

            if (! $bangladeshTopUp) {
                throw (new ModelNotFoundException)->setModel(config('fintech.airtime.bangladesh_top_up_model'), $id);
            }

            return new BangladeshTopUpResource($bangladeshTopUp);

        } catch (Exception $exception) {

            return response()->failed($exception);
        }
    }

    /**
     * @LRDparam pin required|string|min:6
     *
     * @lrd:start
     * Synchronize bangladesh service package allowed and blocked amount
     * packages. initially only for `sslwireless`
     *
     * @lrd:end
     */
    public function sync(Request $request): JsonResponse
    {
        try {

            if ($serviceVendor = Business::serviceVendor()->findWhere(['service_vendor_slug' => 'sslwireless', 'enabled' => true])) {
                SslWirelessPackageSyncJob::dispatch();
            }

            return response()->success(__('airtime::messages.synchronize-queued'));

        } catch (Exception $exception) {

            return response()->failed($exception);
        }
    }
}
