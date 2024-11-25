<?php

use Fintech\Airtime\Http\Controllers\BangladeshTopUpController;
use Fintech\Airtime\Http\Controllers\CalculateCostController;
use Fintech\Airtime\Http\Controllers\InternationalTopUpController;
use Fintech\Airtime\Http\Controllers\PhoneNumberDetectController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "API" middleware group. Enjoy building your API!
|
*/
if (Config::get('fintech.airtime.enabled')) {
    Route::prefix(config('fintech.airtime.root_prefix', 'api/'))->middleware(['api'])->group(function () {
        Route::prefix('airtime')->name('airtime.')
            ->middleware(config('fintech.auth.middleware'))
            ->group(function () {

                Route::post('airtime/calculate-cost', CalculateCostController::class)
                    ->name('airtime.calculate-cost');

                Route::post('bangladesh-top-ups/synchronize', [BangladeshTopUpController::class, 'sync'])
                    ->name('bangladesh-top-ups.synchronize')
                    ->middleware('imposter');

                Route::apiResource('bangladesh-top-ups', BangladeshTopUpController::class)
                    ->only('index', 'store', 'show');

                Route::apiResource('international-top-ups', InternationalTopUpController::class)
                    ->only('index', 'store', 'show');

                Route::post('phone-number-detect', PhoneNumberDetectController::class);

                //DO NOT REMOVE THIS LINE//
            });
    });
}
