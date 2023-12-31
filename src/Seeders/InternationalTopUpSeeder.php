<?php

namespace Fintech\Airtime\Seeders;

use Fintech\Airtime\Facades\Airtime;
use Fintech\Core\Facades\Core;
use Illuminate\Database\Seeder;

class InternationalTopUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Core::packageExists('Business')) {

            foreach ($this->serviceType() as $entry) {
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

            $serviceData = $this->service();

            foreach (array_chunk($serviceData, 200) as $block) {
                set_time_limit(2100);
                foreach ($block as $entry) {
                    \Fintech\Business\Facades\Business::service()->create($entry);
                }
            }

            $serviceStatData = $this->serviceStat();
            foreach (array_chunk($serviceStatData, 200) as $block) {
                set_time_limit(2100);
                foreach ($block as $entry) {
                    \Fintech\Business\Facades\Business::serviceStat()->customStore($entry);
                }
            }
        }

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

    private function serviceType(): array
    {
        $image_svg = __DIR__.'/../../resources/img/service_type/logo_svg/';
        $image_png = __DIR__.'/../../resources/img/service_type/logo_png/';

        return [
            ['service_type_name' => 'International Top Up', 'service_type_slug' => 'international_top_up', 'logo_svg' => 'data:image/svg+xml;base64,'.base64_encode(file_get_contents($image_svg.'international_top_up.svg')), 'logo_png' => 'data:image/png;base64,'.base64_encode(file_get_contents($image_png.'international_top_up.png')), 'service_type_is_parent' => 'yes', 'service_type_is_description' => 'no', 'service_type_step' => '2', 'enabled' => true],
        ];
    }

    private function service(): array
    {
        $image_svg = __DIR__.'/../../resources/img/service/logo_svg/';
        $image_png = __DIR__.'/../../resources/img/service/logo_png/';

        return [
            ['service_type_id' => \Fintech\Business\Facades\Business::serviceType()->list(['service_type_slug' => 'international_top_up'])->first()->id, 'service_vendor_id' => 1, 'service_name' => 'International Top Up', 'service_slug' => 'international_top_up', 'logo_svg' => 'data:image/svg+xml;base64,'.base64_encode(file_get_contents($image_svg.'international_top_up.svg')), 'logo_png' => 'data:image/png;base64,'.base64_encode(file_get_contents($image_png.'international_top_up.png')), 'service_notification' => 'yes', 'service_delay' => 'yes', 'service_stat_policy' => 'yes', 'service_serial' => 1, 'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'MYR', 'beneficiary_type_id' => null, 'operator_short_code' => null], 'enabled' => true],
        ];

    }

    private function serviceStat(): array
    {
        $serviceLists = $this->service();
        $serviceStats = [];
        foreach ($serviceLists as $serviceList) {
            $service = \Fintech\Business\Facades\Business::service()->list(['service_slug' => $serviceList['service_slug']])->first();
            $serviceStats[] = [
                'role_id' => [2, 3, 4, 5, 6, 7],
                'service_id' => $service->getKey(),
                'service_slug' => $service->service_slug,
                'source_country_id' => [39, 133, 192, 231],
                'destination_country_id' => [19, 39, 101, 132, 133, 167, 192, 231],
                'service_vendor_id' => 1,
                'service_stat_data' => [
                    [
                        'lower_limit' => '10.00',
                        'higher_limit' => '5000.00',
                        'local_currency_higher_limit' => '25000.00',
                        'charge' => '5%',
                        'discount' => '5%',
                        'commission' => '5%',
                        'cost' => '0.00',
                        'charge_refund' => 'yes',
                        'discount_refund' => 'yes',
                        'commission_refund' => 'yes',
                    ],
                ],
                'enabled' => true,
            ];
        }

        return $serviceStats;

    }
}
