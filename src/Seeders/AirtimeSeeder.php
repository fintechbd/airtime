<?php

namespace Fintech\Airtime\Seeders;

use Illuminate\Database\Seeder;
use Fintech\Airtime\Facades\Airtime;

class AirtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->data();

        foreach (array_chunk($data, 200) as $block) {
            set_time_limit(2100);
            foreach ($block as $entry) {
                Airtime::airtime()->create($entry);
            }
        }
    }

    private function data()
    {
        return array();
    }
}
