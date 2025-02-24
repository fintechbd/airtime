<?php

namespace Fintech\Airtime\Http\Controllers;

use Exception;
use Fintech\Airtime\Http\Requests\AirtimeCostRequest;
use Fintech\Auth\Facades\Auth;
use Fintech\Business\Facades\Business;
use Fintech\Business\Http\Resources\ServiceCostResource;
use Fintech\Business\Http\Resources\ServicePackageCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class CalculateCostController extends Controller
{
    /**
     * @lrd:start
     */
    public function __invoke(AirtimeCostRequest $request): ServiceCostResource|JsonResponse
    {
        $inputs = $request->validated();

        try {

            if ($request->missing('user_id')) {
                $inputs['user_id'] = $request->user('sanctum')->id;
            }

            if ($user = Auth::user()->find($inputs['user_id'])) {
                $inputs['role_id'] = $user->roles->first()?->getKey() ?? null;
            }

            $service = Business::service()->find($inputs['service_id']);

            $vendor = Business::serviceVendor()->find($service->service_vendor_id);

            $inputs['service_vendor_id'] = $vendor?->getKey() ?? null;

            $inputs['amount'] = $inputs['airtime_data']['amount'] ?? 0;

            $exchangeRate = Business::serviceStat()->cost($inputs);

            $servicePackages = Business::servicePackage()->list([
                'service_id' => $inputs['service_id'],
                'country_id' => $inputs['destination_country_id'],
                'enabled' => true,
                'paginate' => false,
                'sort' => 'amount',
                'direction' => 'asc',
                'connection_type' => $inputs['airtime_data']['connection_type'] ?? 'prepaid',
                'near_amount' => $inputs['amount'],
                'limit' => 3,
            ]);

            $exchangeRate['offers'] = new ServicePackageCollection($servicePackages);

            return new ServiceCostResource($exchangeRate);

        } catch (Exception $exception) {

            return response()->failed($exception);
        }

    }
}
