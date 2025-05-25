<?php

namespace Fintech\Airtime\Jobs\BangladeshTopUp;

use Fintech\Airtime\Facades\Airtime;
use Fintech\MetaData\Facades\MetaData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SslWirelessPackageSyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $existingPackages = business()->servicePackage()->list([
            'service_slug_in' => ['grameen_phone_bd', 'banglalink_bd', 'robi_bd', 'teletalk_bd', 'airtel_bd', 'gp_skitto_bd'],
            'country_id' => MetaData::country()->findWhere(['iso2' => 'BD'])->id,
        ]);

        echo 'Timestamp: '.date('c').' Disabling all service '.$existingPackages->count()." packages.\n";

        foreach ($existingPackages as $package) {
            $package->enabled = false;
            $package->blocked = true;
            $package->save();
        }

        $updatedPackages = collect(Airtime::assignVendor()->rechargePackages('sslwireless'));

        foreach ($updatedPackages as $package) {

            if ($existingPackage = $existingPackages->firstWhere('slug', $package['slug'])) {

                $existingPackage = business()->servicePackage()->update($existingPackage->getKey(), $package);

                echo 'Timestamp: '.date('c')." Updated Package ID: {$existingPackage->getKey()} package.\n";
            } else {

                $existingPackage = business()->servicePackage()->create($package);

                echo 'Timestamp: '.date('c')." Created Package ID: {$existingPackage->getKey()} package.\n";
            }
        }
    }
}
