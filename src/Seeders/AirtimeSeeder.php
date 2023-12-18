<?php

namespace Fintech\Airtime\Seeders;

use Fintech\Core\Facades\Core;
use Illuminate\Database\Seeder;
use Fintech\Airtime\Facades\Airtime;

class AirtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Core::packageExists('Business')) {
            foreach ($this->data() as $entry) {
                $serviceTypeChild = $entry['serviceTypeChild'] ?? [];

                if (isset($entry['serviceTypeChild'])) {
                    unset($entry['serviceTypeChild']);
                }

                $findServiceTypeModel = \Fintech\Business\Facades\Business::serviceType()->list(['service_type_slug' => $entry['service_type_slug']])->first();
                if ($findServiceTypeModel) {
                    $serviceTypeModel = \Fintech\Business\Facades\Business::serviceType()->update($findServiceTypeModel->id, $entry);
                } else {
                    $serviceTypeModel = \Fintech\Business\Facades\Business::serviceType()->create($entry);
                }

                if (! empty($serviceTypeChild)) {
                    array_walk($serviceTypeChild, function ($item) use (&$serviceTypeModel) {
                        $item['service_type_parent_id'] = $serviceTypeModel->id;
                        \Fintech\Business\Facades\Business::serviceType()->create($item);
                    });
                }
            }
        }
        /*$data = $this->data();

        foreach (array_chunk($data, 200) as $block) {
            set_time_limit(2100);
            foreach ($block as $entry) {
                Airtime::airtime()->create($entry);
            }
        }*/
    }

    private function data()
    {
        $image_svg = __DIR__.'/../../resources/img/service_type/logo_svg/';
        $image_png = __DIR__.'/../../resources/img/service_type/logo_png/';
        return [
            ['service_type_parent_id' => null, 'service_type_name' => 'Airtime', 'service_type_slug' => 'air_time', 'logo_svg' => 'data:image/svg+xml;base64,'.base64_encode(file_get_contents($image_svg.'air_time.svg')), 'logo_png' => 'data:image/png;base64,'.base64_encode(file_get_contents($image_png.'air_time.png')), 'service_type_is_parent' => 'yes', 'service_type_is_description' => 'no', 'service_type_step' => '1', 'enabled' => true,]
        ];
    }
}
