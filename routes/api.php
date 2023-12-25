<?php

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
    Route::prefix('airtime')->name('airtime.')->group(function () {

        Route::apiResource('bangladesh-top-ups', \Fintech\Airtime\Http\Controllers\BangladeshTopUpController::class)->except('update', 'destroy');
        //Route::post('bangladesh-top-ups/{bangladesh_top_up}/restore', [\Fintech\Airtime\Http\Controllers\BangladeshTopUpController::class, 'restore'])->name('bangladesh-top-ups.restore');

        Route::apiResource('international-top-ups', \Fintech\Airtime\Http\Controllers\InternationalTopUpController::class)->except('update', 'destroy');
        //Route::post('international-top-ups/{international_top_up}/restore', [\Fintech\Airtime\Http\Controllers\InternationalTopUpController::class, 'restore'])->name('international-top-ups.restore');

    //DO NOT REMOVE THIS LINE//
    });
}
