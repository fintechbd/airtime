<?php

namespace Fintech\Airtime\Seeders\Bangladesh;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ServiceVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('airtime:sslwireless-setup');
    }
}
