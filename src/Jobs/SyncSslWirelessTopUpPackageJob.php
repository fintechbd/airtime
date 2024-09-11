<?php

namespace Fintech\Airtime\Jobs;

use Fintech\Airtime\Facades\Airtime;
use Fintech\Business\Facades\Business;
use Fintech\MetaData\Facades\MetaData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncSslWirelessTopUpPackageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $existingPackages = Business::servicePackage()->list([
            'service_slug_in' => ['grameen_phone_bd', 'banglalink_bd', 'robi_bd', 'teletalk_bd', 'airtel_bd', 'gp_skitto_bd'],
            'country_id' => MetaData::country()->list(['iso2' => 'BD'])->first()->id,
        ]);

        $updatedPackages = Airtime::assignVendor()->rechargePackages('sslwireless');
    }
}
