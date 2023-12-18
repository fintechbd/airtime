<?php

namespace Fintech\Airtime\Seeders;

use Fintech\Airtime\Facades\Airtime;
use Illuminate\Database\Seeder;

class BangladeshTopUpSeeder extends Seeder
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
                Airtime::bangladeshTopUp()->create($entry);
            }
        }
    }

    private function data()
    {
        return [];
    }
}
