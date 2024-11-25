<?php

namespace Fintech\Airtime\Http\Controllers;

use Fintech\Airtime\Http\Requests\PhoneNumberDetectRequest;
use Fintech\Airtime\Http\Resources\PhoneNumberDetectResource;
use Illuminate\Routing\Controller;

class PhoneNumberDetectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PhoneNumberDetectRequest $request): PhoneNumberDetectResource
    {
        $response = [
            'service_slug' => 'grameen_phone_bd',
            'connection_type' => 'prepaid',
            'valid' => true,
        ];

        return new PhoneNumberDetectResource($response);
    }
}
