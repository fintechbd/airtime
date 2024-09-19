<?php

namespace Fintech\Airtime\Seeders;

use Fintech\Business\Facades\Business;
use Fintech\Core\Facades\Core;
use Illuminate\Database\Seeder;

class InternationalTopUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(...$countries): void
    {
        if (Core::packageExists('Business')) {

            $parent = Business::serviceType()->findWhere(['service_type_slug' => 'airtime']);

            Business::serviceTypeManager($this->data(), $parent)
                ->enabled()
                ->distCountries($countries)
                ->execute();
        }
    }

    private function data(): array
    {
        $image_svg = __DIR__.'/../../resources/img/service_type/logo_svg/';
        $image_png = __DIR__.'/../../resources/img/service_type/logo_png/';

        return [
            'service_type_name' => 'International Top Up',
            'service_type_slug' => 'international_top_up',
            'logo_svg' => $image_svg.'international_top_up.svg',
            'logo_png' => $image_png.'international_top_up.png',
            'service_type_is_parent' => 'no',
            'service_type_is_description' => 'no',
        ];
    }
}
