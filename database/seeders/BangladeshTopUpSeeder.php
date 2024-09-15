<?php

namespace Fintech\Airtime\Seeders;

use Fintech\Business\Facades\Business;
use Fintech\Core\Facades\Core;
use Illuminate\Database\Seeder;

class BangladeshTopUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Core::packageExists('Business')) {

            $parent = Business::serviceType()->list(['service_type_slug' => 'airtime'])->first();

            Business::serviceTypeManager($this->data(), $parent)
                ->enabled()
                ->execute();
        }
    }

    private function data(): array
    {
        $image_svg = __DIR__ . '/../../resources/img/service_type/logo_svg/';
        $image_png = __DIR__ . '/../../resources/img/service_type/logo_png/';

        return [
            'service_type_name' => 'BD Top Up',
            'service_type_slug' => 'bangladesh_top_up',
            'logo_svg' => $image_svg . 'bangladesh_top_up.svg',
            'logo_png' => $image_png . 'bangladesh_top_up.png',
            'service_type_is_parent' => 'yes',
            'service_type_is_description' => 'no',
        ];
    }
}
