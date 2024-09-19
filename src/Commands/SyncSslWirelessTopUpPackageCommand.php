<?php

namespace Fintech\Airtime\Commands;

use Fintech\Airtime\Exceptions\AirtimeException;
use Fintech\Airtime\Jobs\SyncSslWirelessTopUpPackageJob;
use Fintech\Business\Facades\Business;
use Illuminate\Console\Command;

class SyncSslWirelessTopUpPackageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'airtime:sync-ssl-wireless-top-up-package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will sync the top-up packages from `sslwireless` vendor';

    /**
     * Execute the console command.
     *
     * @throws AirtimeException
     */
    public function handle()
    {
        $serviceVendor = Business::serviceVendor()->findWhere(['service_vendor_slug' => 'sslwireless', 'enabled' => true]);
        if ($serviceVendor) {
            SyncSslWirelessTopUpPackageJob::dispatch();
        }

        return self::SUCCESS;
    }
}