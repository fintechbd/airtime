<?php

namespace Fintech\Airtime\Seeders\Bangladesh;

use Fintech\Business\Facades\Business;
use Fintech\Core\Facades\Core;
use Fintech\MetaData\Facades\MetaData;
use Illuminate\Database\Seeder;

class ServiceOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Core::packageExists('Business')) {

            $parent = Business::serviceType()->findWhere(['service_type_slug' => 'bangladesh_top_up']);

            $country = MetaData::country()->findWhere(['iso2' => 'BD'])->id;

            $vendor = Business::serviceVendor()->findWhere(['service_vendor_slug' => 'sslwireless']);

            foreach ($this->data() as $entry) {
                Business::serviceTypeManager($entry, $parent)
                    ->hasService()
                    ->vendor($vendor)
                    ->distCountries([$country])
                    ->enabled()
                    ->execute();
            }
        }
    }

    private function data(): array
    {
        $image_svg = base_path('vendor/fintech/airtime/resources/img/service_type/logo_svg/');
        $image_png = base_path('vendor/fintech/airtime/resources/img/service_type/logo_png/');

        return [
            [
                'service_type_name' => 'GrameenPhone',
                'service_type_slug' => 'grameen_phone_bd',
                'logo_svg' => $image_svg.'grameen_phone_bd.svg',
                'logo_png' => $image_png.'grameen_phone_bd.png',
                'service_type_is_parent' => 'no',
                'service_type_is_description' => 'no',
                'service_type_step' => '3',
                'enabled' => true,
                'service_stat_data' => [
                    'utility_auth_key' => 'VR17169605149680',
                    'utility_secret_key' => 'o./sLwO22U10yORo',
                    'lower_limit' => '0.18',
                    'higher_limit' => '11.70',
                    'local_currency_lower_limit' => '20',
                    'local_currency_higher_limit' => '2500',
                    'charge' => '0',
                    'discount' => '0',
                    'commission' => '0',
                ],
                'service_settings' => [
                    'operator_prefix' => '17',
                    'amount_range' => '20,100,200,400',
                    'operator_short_code' => '1',
                ],
            ],
            [
                'service_type_name' => 'Banglalink',
                'service_type_slug' => 'banglalink_bd',
                'logo_svg' => $image_svg.'banglalink_bd.svg',
                'logo_png' => $image_png.'banglalink_bd.png',
                'service_type_is_parent' => 'no',
                'service_type_is_description' => 'no',
                'service_type_step' => '3',
                'enabled' => true,
                'service_stat_data' => [
                    'utility_auth_key' => 'VR17169609274146',
                    'utility_secret_key' => 'GxKREJgPpHneaWCq',
                    'lower_limit' => '0.18',
                    'higher_limit' => '11.70',
                    'local_currency_lower_limit' => '20',
                    'local_currency_higher_limit' => '2500',
                    'charge' => '0',
                    'discount' => '0',
                    'commission' => '0',
                ],
                'service_settings' => [
                    'operator_prefix' => '19',
                    'amount_range' => '20,100,200,400',
                    'operator_short_code' => '2',
                ],
            ],
            [
                'service_type_name' => 'Robi',
                'service_type_slug' => 'robi_bd',
                'logo_svg' => $image_svg.'robi_bd.svg',
                'logo_png' => $image_png.'robi_bd.png',
                'service_type_is_parent' => 'no',
                'service_type_is_description' => 'no',
                'service_type_step' => '3',
                'enabled' => true,
                'service_stat_data' => [
                    'utility_auth_key' => 'VR17169608788534',
                    'utility_secret_key' => 'tljub72J6WIj96fz',
                    'lower_limit' => '0.18',
                    'higher_limit' => '11.70',
                    'local_currency_lower_limit' => '20',
                    'local_currency_higher_limit' => '2500',
                    'charge' => '0',
                    'discount' => '0',
                    'commission' => '0',
                ],
                'service_settings' => [
                    'operator_prefix' => '18',
                    'amount_range' => '20,100,200,400',
                    'operator_short_code' => '3',
                ],
            ],
            [
                'service_type_name' => 'Teletalk',
                'service_type_slug' => 'teletalk_bd',
                'logo_svg' => $image_svg.'teletalk_bd.svg',
                'logo_png' => $image_png.'teletalk_bd.png',
                'service_type_is_parent' => 'no',
                'service_type_is_description' => 'no',
                'service_type_step' => '3',
                'enabled' => true,
                'service_stat_data' => [
                    'utility_auth_key' => 'VR17169610034475',
                    'utility_secret_key' => 'FtUn9zDju7irvIpG',
                    'lower_limit' => '0.18',
                    'higher_limit' => '11.70',
                    'local_currency_lower_limit' => '20',
                    'local_currency_higher_limit' => '2500',
                    'charge' => '0',
                    'discount' => '0',
                    'commission' => '0',
                ],
                'service_settings' => [
                    'operator_prefix' => '15',
                    'amount_range' => '20,100,200,400',
                    'operator_short_code' => '5',
                ],
            ],
            [
                'service_type_name' => 'Airtel',
                'service_type_slug' => 'airtel_bd',
                'logo_svg' => $image_svg.'airtel_bd.svg',
                'logo_png' => $image_png.'airtel_bd.png',
                'service_type_is_parent' => 'no',
                'service_type_is_description' => 'no',
                'service_type_step' => '3',
                'enabled' => true,
                'service_stat_data' => [
                    'utility_auth_key' => 'VR17169609547493',
                    'utility_secret_key' => 'uvUC8F3UY1D2FRWJ',
                    'lower_limit' => '0.18',
                    'higher_limit' => '11.70',
                    'local_currency_lower_limit' => '20',
                    'local_currency_higher_limit' => '2500',
                    'charge' => '0',
                    'discount' => '0',
                    'commission' => '0',
                ],
                'service_settings' => [
                    'operator_prefix' => '16',
                    'amount_range' => '20,100,200,400',
                    'operator_short_code' => '6',
                ],
            ],
            //            [
            //                'service_type_name' => 'GP Skitto',
            //                'service_type_slug' => 'gp_skitto_bd',
            //                'logo_svg' => $image_svg.'gp_skitto_bd.svg',
            //                'logo_png' => $image_png.'gp_skitto_bd.png',
            //                'service_type_is_parent' => 'no',
            //                'service_type_is_description' => 'no',
            //                'service_type_step' => '3',
            //                'enabled' => true,
            //                'service_stat_data' => [
            //                    'utility_auth_key' => '',
            //                    'utility_secret_key' => '',
            //                    'lower_limit' => '0.18',
            //                    'higher_limit' => '11.70',
            //                    'local_currency_lower_limit' => '20',
            //                    'local_currency_higher_limit' => '2500',
            //                    'charge' => '0',
            //                    'discount' => '0',
            //                    'commission' => '0',
            //                ],
            //                'service_settings' => [
            //                    'operator_prefix' => '13',
            //                    'amount_range' => '20,100,200,400',
            //                    'operator_short_code' => '13',
            //                ],
            //            ],
        ];
    }
}
