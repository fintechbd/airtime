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

            $serviceTypes = $this->serviceType();

            if (!empty($serviceTypes)) {

                foreach ($this->serviceType() as $entry) {
                    $serviceTypeChildren = $entry['serviceTypeChildren'] ?? [];

                    if (isset($entry['serviceTypeChildren'])) {
                        unset($entry['serviceTypeChildren']);
                    }

                    $findServiceTypeModel = Business::serviceType()->list(['service_type_slug' => $entry['service_type_slug']])->first();
                    if ($findServiceTypeModel) {
                        $serviceTypeModel = Business::serviceType()->update($findServiceTypeModel->id, $entry);
                    } else {
                        $serviceTypeModel = Business::serviceType()->create($entry);
                    }

                    if (!empty($serviceTypeChildren)) {
                        array_walk($serviceTypeChildren, function ($item) use (&$serviceTypeModel) {
                            $item['service_type_parent_id'] = $serviceTypeModel->id;
                            Business::serviceType()->create($item);
                        });
                    }
                }

                $serviceData = $this->service();

                foreach (array_chunk($serviceData, 200) as $block) {
                    set_time_limit(2100);
                    foreach ($block as $entry) {
                        Business::service()->create($entry);
                    }
                }

                $serviceStatData = $this->serviceStat();
                foreach (array_chunk($serviceStatData, 200) as $block) {
                    set_time_limit(2100);
                    foreach ($block as $entry) {
                        Business::serviceStat()->customStore($entry);
                    }
                }
            }
        }
    }

    private function serviceType(): array
    {
        $image_svg = __DIR__ . '/../../resources/img/service_type/logo_svg/';
        $image_png = __DIR__ . '/../../resources/img/service_type/logo_png/';

        $serviceType = Business::serviceType()->list(['service_type_slug' => 'air_time'])->first();

        if ($serviceType) {
            return [
                [
                    'service_type_parent_id' => $serviceType->id,
                    'service_type_name' => 'BD Top Up',
                    'service_type_slug' => 'bangladesh_top_up',
                    'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'bangladesh_top_up.svg')), 'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'bangladesh_top_up.png')),
                    'service_type_is_parent' => 'yes',
                    'service_type_is_description' => 'no',
                    'service_type_step' => '2',
                    'enabled' => true,
                    'serviceTypeChildren' => [
                        [
                            'service_type_name' => 'GrameenPhone',
                            'service_type_slug' => 'grameen_phone_bd',
                            'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'grameen_phone_bd.svg')),
                            'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'grameen_phone_bd.png')),
                            'service_type_is_parent' => 'no',
                            'service_type_is_description' => 'no',
                            'service_type_step' => '3',
                            'enabled' => true,
                        ],
                        [
                            'service_type_name' => 'Airtel',
                            'service_type_slug' => 'airtel_bd',
                            'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'airtel_bd.svg')),
                            'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'airtel_bd.png')),
                            'service_type_is_parent' => 'no',
                            'service_type_is_description' => 'no',
                            'service_type_step' => '3',
                            'enabled' => true,
                        ],
                        [
                            'service_type_name' => 'Robi',
                            'service_type_slug' => 'robi_bd',
                            'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'robi_bd.svg')),
                            'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'robi_bd.png')),
                            'service_type_is_parent' => 'no',
                            'service_type_is_description' => 'no',
                            'service_type_step' => '3',
                            'enabled' => true,
                        ],
                        [
                            'service_type_name' => 'Teletalk',
                            'service_type_slug' => 'teletalk_bd',
                            'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'teletalk_bd.svg')),
                            'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'teletalk_bd.png')),
                            'service_type_is_parent' => 'no',
                            'service_type_is_description' => 'no',
                            'service_type_step' => '3',
                            'enabled' => true,
                        ],
                        [
                            'service_type_name' => 'GP Skitto',
                            'service_type_slug' => 'gp_skitto_bd',
                            'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'gp_skitto_bd.svg')),
                            'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'gp_skitto_bd.png')),
                            'service_type_is_parent' => 'no',
                            'service_type_is_description' => 'no',
                            'service_type_step' => '3',
                            'enabled' => true,
                        ],
                        [
                            'service_type_name' => 'Banglalink',
                            'service_type_slug' => 'banglalink_bd',
                            'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'banglalink_bd.svg')),
                            'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'banglalink_bd.png')),
                            'service_type_is_parent' => 'no',
                            'service_type_is_description' => 'no',
                            'service_type_step' => '3',
                            'enabled' => true,
                        ],
                    ],
                ],
            ];
        } else {
            return [];
        }
    }

    private function service(): array
    {
        $image_svg = __DIR__ . '/../../resources/img/service/logo_svg/';
        $image_png = __DIR__ . '/../../resources/img/service/logo_png/';

        return [
            [
                'service_type_id' => Business::serviceType()->list(['service_type_slug' => 'grameen_phone_bd'])->first()->id,
                'service_vendor_id' => 1,
                'service_name' => 'Grameen Phone',
                'service_slug' => 'grameen_phone_bd',
                'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'grameen_phone_bd.svg')),
                'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'grameen_phone_bd.png')),
                'service_notification' => 'yes',
                'service_delay' => 'yes',
                'service_stat_policy' => 'yes',
                'service_serial' => 1,
                'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'BDT', 'beneficiary_type_id' => null, 'operator_short_code' => null],
                'enabled' => true,
            ],
            [
                'service_type_id' => Business::serviceType()->list(['service_type_slug' => 'airtel_bd'])->first()->id,
                'service_vendor_id' => 1,
                'service_name' => 'Airtel',
                'service_slug' => 'airtel_bd',
                'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'airtel_bd.svg')),
                'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'airtel_bd.png')),
                'service_notification' => 'yes',
                'service_delay' => 'yes',
                'service_stat_policy' => 'yes',
                'service_serial' => 2,
                'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'BDT', 'beneficiary_type_id' => null, 'operator_short_code' => null],
                'enabled' => true,
            ],
            [
                'service_type_id' => Business::serviceType()->list(['service_type_slug' => 'robi_bd'])->first()->id,
                'service_vendor_id' => 1,
                'service_name' => 'Robi',
                'service_slug' => 'robi_bd',
                'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'robi_bd.svg')),
                'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'robi_bd.png')),
                'service_notification' => 'yes',
                'service_delay' => 'yes',
                'service_stat_policy' => 'yes',
                'service_serial' => 3,
                'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'BDT', 'beneficiary_type_id' => null, 'operator_short_code' => null],
                'enabled' => true,
            ],
            [
                'service_type_id' => Business::serviceType()->list(['service_type_slug' => 'teletalk_bd'])->first()->id,
                'service_vendor_id' => 1,
                'service_name' => 'Teletalk',
                'service_slug' => 'teletalk_bd',
                'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'teletalk_bd.svg')),
                'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'teletalk_bd.png')),
                'service_notification' => 'yes',
                'service_delay' => 'yes',
                'service_stat_policy' => 'yes',
                'service_serial' => 4,
                'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'BDT', 'beneficiary_type_id' => null, 'operator_short_code' => null],
                'enabled' => true,
            ],
            [
                'service_type_id' => Business::serviceType()->list(['service_type_slug' => 'gp_skitto_bd'])->first()->id,
                'service_vendor_id' => 1,
                'service_name' => 'GP Skitto',
                'service_slug' => 'gp_skitto_bd',
                'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'gp_skitto_bd.svg')),
                'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'gp_skitto_bd.png')),
                'service_notification' => 'yes',
                'service_delay' => 'yes',
                'service_stat_policy' => 'yes',
                'service_serial' => 5,
                'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'BDT', 'beneficiary_type_id' => null, 'operator_short_code' => 'GP ST'],
                'enabled' => true,
            ],
            [
                'service_type_id' => Business::serviceType()->list(['service_type_slug' => 'banglalink_bd'])->first()->id,
                'service_vendor_id' => 1,
                'service_name' => 'Banglalink',
                'service_slug' => 'banglalink_bd',
                'logo_svg' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($image_svg . 'banglalink_bd.svg')),
                'logo_png' => 'data:image/png;base64,' . base64_encode(file_get_contents($image_png . 'banglalink_bd.png')),
                'service_notification' => 'yes',
                'service_delay' => 'yes',
                'service_stat_policy' => 'yes',
                'service_serial' => 5,
                'service_data' => ['visible_website' => 'yes', 'visible_android_app' => 'yes', 'visible_ios_app' => 'yes', 'account_name' => '', 'account_number' => '', 'transactional_currency' => 'BDT', 'beneficiary_type_id' => null, 'operator_short_code' => null],
                'enabled' => true,
            ],
        ];

    }

    private function serviceStat(): array
    {
        $serviceLists = $this->service();
        $serviceStats = [];
        foreach ($serviceLists as $serviceList) {
            $service = Business::service()->list(['service_slug' => $serviceList['service_slug']])->first();
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
