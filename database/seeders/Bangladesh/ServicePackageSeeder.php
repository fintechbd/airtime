<?php

namespace Fintech\Airtime\Seeders\Bangladesh;

use Fintech\Business\Facades\Business;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operators = [];
        $operators[1] = Business::service()->list(['service_slug' => 'grameen_phone_bd'])->first()->id;
        $operators[2] = Business::service()->list(['service_slug' => 'banglalink_bd'])->first()->id;
        $operators[3] = Business::service()->list(['service_slug' => 'robi_bd'])->first()->id;
//        $operators[4] = Business::service()->list(['service_slug' => 'grameen_phone_bd'])->first()->id;
        $operators[5] = Business::service()->list(['service_slug' => 'teletalk_bd'])->first()->id;
        $operators[6] = Business::service()->list(['service_slug' => 'airtel_bd'])->first()->id;
        $operators[13] = Business::service()->list(['service_slug' => 'gp_skitto_bd'])->first()->id;

        foreach ($this->triggerAmounts() as $triggerAmount) {
            $triggerAmount['service_id'] = $operators[$triggerAmount['service_id']];
            Business::servicePackage()->create($triggerAmount);
        }

        foreach ($this->blockedAmounts() as $blockedAmount) {
            $blockedAmount['service_id'] = $operators[$blockedAmount['service_id']];
            Business::servicePackage()->create($blockedAmount);
        }
    }

    public function triggerAmounts() : array
    {
        return array (
            0 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '52 SMS + Priyotoma Movie Access, 2 Days',
                    'type' => 'combo',
                    'slug' => '52-sms-priyotoma-movie-access-2-days',
                    'description' => '52 SMS + Priyotoma Movie Access, 2 Days',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            1 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '52 SMS + Priyotoma Movie Access, 2 Days',
                    'type' => 'combo',
                    'slug' => '52-sms-priyotoma-movie-access-2-days',
                    'description' => '52 SMS + Priyotoma Movie Access, 2 Days',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            2 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '1GB, 24 Hrs',
                    'type' => 'internet',
                    'slug' => '1gb-24-hrs',
                    'description' => '1GB, 24 Hrs',
                    'amount' => 28,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            3 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '1GB, 24 Hrs',
                    'type' => 'internet',
                    'slug' => '1gb-24-hrs',
                    'description' => '1GB, 24 Hrs',
                    'amount' => 28,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            4 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '32 Min , 2 Days',
                    'type' => 'voice',
                    'slug' => '32-min-2-days',
                    'description' => '32 Min , 2 Days',
                    'amount' => 29,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            5 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '32 Min , 2 Days',
                    'type' => 'voice',
                    'slug' => '32-min-2-days',
                    'description' => '32 Min , 2 Days',
                    'amount' => 29,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            6 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '45 Min, 2 Days',
                    'type' => 'voice',
                    'slug' => '45-min-2-days',
                    'description' => '45 Min, 2 Days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            7 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '45 Min, 2 Days',
                    'type' => 'voice',
                    'slug' => '45-min-2-days',
                    'description' => '45 Min, 2 Days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            8 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '400 MB, 7 Days',
                    'type' => 'internet',
                    'slug' => '400-mb-7-days',
                    'description' => '400 MB, 7 Days',
                    'amount' => 48,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            9 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '400 MB, 7 Days',
                    'type' => 'internet',
                    'slug' => '400-mb-7-days',
                    'description' => '400 MB, 7 Days',
                    'amount' => 48,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            10 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50 Min , 3 Days',
                    'type' => 'voice',
                    'slug' => '50-min-3-days',
                    'description' => '50 Min , 3 Days',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            11 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50 Min , 3 Days',
                    'type' => 'voice',
                    'slug' => '50-min-3-days',
                    'description' => '50 Min , 3 Days',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            12 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '0.5 GB+30 Minute, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '05-gb30-minute-7-days',
                    'description' => '0.5 GB+30 Minute, 7 Days',
                    'amount' => 58,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            13 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '0.5 GB+30 Minute, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '05-gb30-minute-7-days',
                    'description' => '0.5 GB+30 Minute, 7 Days',
                    'amount' => 58,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            14 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 3 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-3-days',
                    'description' => '99 poisha /min, 3 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            15 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 3 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-3-days',
                    'description' => '99 poisha /min, 3 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            16 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '215 SMS , 30 Days',
                    'type' => 'sms',
                    'slug' => '215-sms-30-days',
                    'description' => '215 SMS , 30 Days',
                    'amount' => 66,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            17 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '215 SMS, 30 Days',
                    'type' => 'sms',
                    'slug' => '215-sms-30-days',
                    'description' => '215 SMS, 30 Days',
                    'amount' => 66,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            18 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '2GB, 72 Hrs',
                    'type' => 'internet',
                    'slug' => '2gb-72-hrs',
                    'description' => '2GB, 72 Hrs',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            19 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '2GB, 72 Hrs',
                    'type' => 'internet',
                    'slug' => '2gb-72-hrs',
                    'description' => '2GB, 72 Hrs',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            20 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '220 SMS + SonyLIV , 30 Days',
                    'type' => 'internet+sms',
                    'slug' => '220-sms-sonyliv-30-days',
                    'description' => '220 SMS + SonyLIV , 30 Days',
                    'amount' => 76,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            21 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '220 SMS + SonyLIV , 30 Days',
                    'type' => 'internet+sms',
                    'slug' => '220-sms-sonyliv-30-days',
                    'description' => '220 SMS + SonyLIV , 30 Days',
                    'amount' => 76,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            22 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Hoichoi, Chorki, Bioscope + 225 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'hoichoi-chorki-bioscope-225-sms-30-days',
                    'description' => 'Hoichoi, Chorki, Bioscope + 225 SMS, 30 Days',
                    'amount' => 77,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            23 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Hoichoi, Chorki, Bioscope + 225 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'hoichoi-chorki-bioscope-225-sms-30-days',
                    'description' => 'Hoichoi, Chorki, Bioscope + 225 SMS, 30 Days',
                    'amount' => 77,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            24 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '80 Min , 4 Days',
                    'type' => 'voice',
                    'slug' => '80-min-4-days',
                    'description' => '80 Min , 4 Days',
                    'amount' => 79,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 345600,
                            'validity' => '4 Day',
                        ),
                ),
            25 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '80 Min , 4 Days',
                    'type' => 'voice',
                    'slug' => '80-min-4-days',
                    'description' => '80 Min , 4 Days',
                    'amount' => 79,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 345600,
                            'validity' => '4 Day',
                        ),
                ),
            26 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'SonyLiv, T-Sports + 270 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'sonyliv-t-sports-270-sms-30-days',
                    'description' => 'SonyLiv, T-Sports + 270 SMS, 30 Days',
                    'amount' => 88,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            27 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 7 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-7-days',
                    'description' => '99 poisha /min, 7 Days',
                    'amount' => 89,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            28 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 7 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-7-days',
                    'description' => '99 poisha /min, 7 Days',
                    'amount' => 89,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            29 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '69 poisha /min, 7 Days',
                    'type' => 'voice',
                    'slug' => '69-poisha-min-7-days',
                    'description' => '69 poisha /min, 7 Days',
                    'amount' => 94,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            30 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '69 poisha /min, 7 Days',
                    'type' => 'voice',
                    'slug' => '69-poisha-min-7-days',
                    'description' => '69 poisha /min, 7 Days',
                    'amount' => 94,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            31 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '500 SMS, 30 Days',
                    'type' => 'sms',
                    'slug' => '500-sms-30-days',
                    'description' => '500 SMS, 30 Days',
                    'amount' => 96,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            32 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '500 SMS, 30 Days',
                    'type' => 'sms',
                    'slug' => '500-sms-30-days',
                    'description' => '500 SMS, 30 Days',
                    'amount' => 96,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            33 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50 Min + 1GB 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '50-min-1gb-7-days',
                    'description' => '50 Min + 1GB 7 Days',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            34 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50 Min + 1GB , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '50-min-1gb-7-days',
                    'description' => '50 Min + 1GB , 7 Days',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            35 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '2 GB ( 0.5GB Regular + 1.5GB WhatsApp, IMO, Instagram, Snapchat ), 7 Days',
                    'type' => 'internet',
                    'slug' => '2-gb-05gb-regular-15gb-whatsapp-imo-instagram-snapchat-7-days',
                    'description' => '2 GB ( 0.5GB Regular + 1.5GB WhatsApp, IMO, Instagram, Snapchat ), 7 Days',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            36 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '2 GB ( 0.5GB Regular + 1.5GB WhatsApp, IMO, Instagram, Snapchat ), 7 Days',
                    'type' => 'internet',
                    'slug' => '2-gb-05gb-regular-15gb-whatsapp-imo-instagram-snapchat-7-days',
                    'description' => '2 GB ( 0.5GB Regular + 1.5GB WhatsApp, IMO, Instagram, Snapchat ), 7 Days',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            37 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '110 Min, 5 Days',
                    'type' => 'voice',
                    'slug' => '110-min-5-days',
                    'description' => '110 Min, 5 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            38 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '110 Min, 5 Days',
                    'type' => 'voice',
                    'slug' => '110-min-5-days',
                    'description' => '110 Min, 5 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            39 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'T-sports + SonyLiv Access + 330 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 't-sports-sonyliv-access-330-sms-30-days',
                    'description' => 'T-sports + SonyLiv Access + 330 SMS, 30 Days',
                    'amount' => 106,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            40 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '5GB, 72 Hrs',
                    'type' => 'internet',
                    'slug' => '5gb-72-hrs',
                    'description' => '5GB, 72 Hrs',
                    'amount' => 108,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            41 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '5GB, 72 Hrs',
                    'type' => 'internet',
                    'slug' => '5gb-72-hrs',
                    'description' => '5GB, 72 Hrs',
                    'amount' => 108,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            42 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '140 Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '140-min-7-days',
                    'description' => '140 Min , 7 Days',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            43 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '140 Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '140-min-7-days',
                    'description' => '140 Min , 7 Days',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            44 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 15 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-15-days',
                    'description' => '99 poisha /min, 15 Days',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 1296000,
                            'validity' => '15 Day',
                        ),
                ),
            45 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 15 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-15-days',
                    'description' => '99 poisha /min, 15 Days',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 1296000,
                            'validity' => '15 Day',
                        ),
                ),
            46 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Hoichoi, SonyLiv, Lionsgate+375 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'hoichoi-sonyliv-lionsgate375-sms-30-days',
                    'description' => 'Hoichoi, SonyLiv, Lionsgate+375 SMS, 30 Days',
                    'amount' => 127,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            47 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Hoichoi, SonyLiv, Lionsgate+375 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'hoichoi-sonyliv-lionsgate375-sms-30-days',
                    'description' => 'Hoichoi, SonyLiv, Lionsgate+375 SMS, 30 Days',
                    'amount' => 127,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            48 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '4 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '4-gb-7-days',
                    'description' => '4 GB, 7 Days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            49 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '4 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '4-gb-7-days',
                    'description' => '4 GB, 7 Days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            50 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '210 Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '210-min-7-days',
                    'description' => '210 Min , 7 Days',
                    'amount' => 139,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            51 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '210 Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '210-min-7-days',
                    'description' => '210 Min , 7 Days',
                    'amount' => 139,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            52 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '150 Min + 4GB , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '150-min-4gb-7-days',
                    'description' => '150 Min + 4GB , 7 Days',
                    'amount' => 147,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            53 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '80 Min + 3GB 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '80-min-3gb-7-days',
                    'description' => '80 Min + 3GB 7 Days',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            54 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '80 Min + 3GB 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '80-min-3gb-7-days',
                    'description' => '80 Min + 3GB 7 Days',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            55 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '250 Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '250-min-7-days',
                    'description' => '250 Min , 7 Days',
                    'amount' => 158,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            56 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '250 Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '250-min-7-days',
                    'description' => '250 Min , 7 Days',
                    'amount' => 158,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            57 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 30 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-30-days',
                    'description' => '99 poisha /min, 30 Days',
                    'amount' => 159,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            58 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '99 poisha /min, 30 Days',
                    'type' => 'voice',
                    'slug' => '99-poisha-min-30-days',
                    'description' => '99 poisha /min, 30 Days',
                    'amount' => 159,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            59 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Hoichoi, SonyLiv, Lionsgate, Chorki, Bioscope, T-Sports, ShemarooMe, i-Screen+500 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'hoichoi-sonyliv-lionsgate-chorki-bioscope-t-sports-shemaroome-i-screen500-sms-30-days',
                    'description' => 'Hoichoi, SonyLiv, Lionsgate, Chorki, Bioscope, T-Sports, ShemarooMe, i-Screen+500 SMS, 30 Days',
                    'amount' => 173,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            60 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Hoichoi, SonyLiv, Lionsgate, Chorki, Bioscope, T-Sports, ShemarooMe, i-Screen+500 SMS, 30 Days',
                    'type' => 'combo',
                    'slug' => 'hoichoi-sonyliv-lionsgate-chorki-bioscope-t-sports-shemaroome-i-screen500-sms-30-days',
                    'description' => 'Hoichoi, SonyLiv, Lionsgate, Chorki, Bioscope, T-Sports, ShemarooMe, i-Screen+500 SMS, 30 Days',
                    'amount' => 173,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            61 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '7 GB (Daily 1GB), 7 Days',
                    'type' => 'internet',
                    'slug' => '7-gb-daily-1gb-7-days',
                    'description' => '7 GB (Daily 1GB), 7 Days',
                    'amount' => 179,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            62 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '7 GB (Daily 1GB), 7 Days',
                    'type' => 'internet',
                    'slug' => '7-gb-daily-1gb-7-days',
                    'description' => '7 GB (Daily 1GB), 7 Days',
                    'amount' => 179,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            63 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '10GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '10gb-7-days',
                    'description' => '10GB, 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            64 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '10GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '10gb-7-days',
                    'description' => '10GB, 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            65 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '5 GB (2GB Regular + 3GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'type' => 'internet',
                    'slug' => '5-gb-2gb-regular-3gb-whatsapp-imo-instagram-snapchat-30-days',
                    'description' => '5 GB (2GB Regular + 3GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            66 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '5 GB (2GB Regular + 3GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'type' => 'internet',
                    'slug' => '5-gb-2gb-regular-3gb-whatsapp-imo-instagram-snapchat-30-days',
                    'description' => '5 GB (2GB Regular + 3GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            67 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '8GB + 150Min + 100 SMS , 7 Days',
                    'type' => 'combo',
                    'slug' => '8gb-150min-100-sms-7-days',
                    'description' => '8GB + 150Min + 100 SMS , 7 Days',
                    'amount' => 217,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            68 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '8GB + 150Min + 100 SMS , 7 Days',
                    'type' => 'combo',
                    'slug' => '8gb-150min-100-sms-7-days',
                    'description' => '8GB + 150Min + 100 SMS , 7 Days',
                    'amount' => 217,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            69 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '230 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '230-min-30-days',
                    'description' => '230 Min , 30 Days',
                    'amount' => 218,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            70 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '230 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '230-min-30-days',
                    'description' => '230 Min , 30 Days',
                    'amount' => 218,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            71 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '25 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '25-gb-7-days',
                    'description' => '25 GB, 7 Days',
                    'amount' => 229,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            72 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '25 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '25-gb-7-days',
                    'description' => '25 GB, 7 Days',
                    'amount' => 229,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            73 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '300 Min+100 MB , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '300-min100-mb-30-days',
                    'description' => '300 Min+100 MB , 30 Days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            74 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '300 Min+100 MB , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '300-min100-mb-30-days',
                    'description' => '300 Min+100 MB , 30 Days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            75 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '30GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '30gb-7-days',
                    'description' => '30GB , 7 Days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            76 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '30GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '30gb-7-days',
                    'description' => '30GB , 7 Days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            77 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '10GB + 150Min + 100 SMS , 7 Days',
                    'type' => 'combo',
                    'slug' => '10gb-150min-100-sms-7-days',
                    'description' => '10GB + 150Min + 100 SMS , 7 Days',
                    'amount' => 258,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            78 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '10GB + 150Min + 100 SMS , 7 Days',
                    'type' => 'combo',
                    'slug' => '10gb-150min-100-sms-7-days',
                    'description' => '10GB + 150Min + 100 SMS , 7 Days',
                    'amount' => 258,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            79 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '350 Min+100 MB, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '350-min100-mb-30-days',
                    'description' => '350 Min+100 MB, 30 Days',
                    'amount' => 259,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            80 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '350 Min+100 MB, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '350-min100-mb-30-days',
                    'description' => '350 Min+100 MB, 30 Days',
                    'amount' => 259,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            81 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Uninterrupted Internet , 7 Days',
                    'type' => 'internet',
                    'slug' => 'uninterrupted-internet-7-days',
                    'description' => 'Uninterrupted Internet , 7 Days',
                    'amount' => 269,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            82 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Uninterrupted Internet , 7 Days',
                    'type' => 'internet',
                    'slug' => 'uninterrupted-internet-7-days',
                    'description' => 'Uninterrupted Internet , 7 Days',
                    'amount' => 269,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            83 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '400 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '400-min-30-days',
                    'description' => '400 Min , 30 Days',
                    'amount' => 279,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            84 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '400 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '400-min-30-days',
                    'description' => '400 Min , 30 Days',
                    'amount' => 279,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            85 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '8 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '8-gb-30-days',
                    'description' => '8 GB, 30 Days',
                    'amount' => 296,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            86 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '8 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '8-gb-30-days',
                    'description' => '8 GB, 30 Days',
                    'amount' => 296,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            87 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '10 GB (5GB Regular + 5GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'type' => 'internet',
                    'slug' => '10-gb-5gb-regular-5gb-whatsapp-imo-instagram-snapchat-30-days',
                    'description' => '10 GB (5GB Regular + 5GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'amount' => 298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            88 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '10 GB (5GB Regular + 5GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'type' => 'internet',
                    'slug' => '10-gb-5gb-regular-5gb-whatsapp-imo-instagram-snapchat-30-days',
                    'description' => '10 GB (5GB Regular + 5GB WhatsApp, IMO, Instagram, Snapchat), 30 Days',
                    'amount' => 298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            89 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '375 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '375-min-30-days',
                    'description' => '375 Min , 30 Days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Days',
                        ),
                ),
            90 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '375 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '375-min-30-days',
                    'description' => '375 Min , 30 Days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            91 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '60 Paisa/min, 60 Days',
                    'type' => 'voice',
                    'slug' => '60-paisamin-60-days',
                    'description' => '60 Paisa/min, 60 Days',
                    'amount' => 309,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            92 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '60 Paisa/min, 60 Days',
                    'type' => 'voice',
                    'slug' => '60-paisamin-60-days',
                    'description' => '60 Paisa/min, 60 Days',
                    'amount' => 309,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            93 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '550 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '550-min-30-days',
                    'description' => '550 Min , 30 Days',
                    'amount' => 379,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            94 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '550 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '550-min-30-days',
                    'description' => '550 Min , 30 Days',
                    'amount' => 379,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            95 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '200 Min + 8GB , 30 Day',
                    'type' => 'voice+internet',
                    'slug' => '200-min-8gb-30-day',
                    'description' => '200 Min + 8GB , 30 Day',
                    'amount' => 398,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            96 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '200 Min + 8GB , 30 Day',
                    'type' => 'voice+internet',
                    'slug' => '200-min-8gb-30-day',
                    'description' => '200 Min + 8GB , 30 Day',
                    'amount' => 398,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            97 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '15 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '15-gb-30-days',
                    'description' => '15 GB, 30 Days',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            98 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '15 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '15-gb-30-days',
                    'description' => '15 GB, 30 Days',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            99 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '30 GB (Daily 1 GB), 30 Days',
                    'type' => 'internet',
                    'slug' => '30-gb-daily-1-gb-30-days',
                    'description' => '30 GB (Daily 1 GB), 30 Days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Days',
                        ),
                ),
            100 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '30 GB (Daily 1 GB), 30 Days',
                    'type' => 'internet',
                    'slug' => '30-gb-daily-1-gb-30-days',
                    'description' => '30 GB (Daily 1 GB), 30 Days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            101 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '54 Paisa/min, 90 Days',
                    'type' => 'voice',
                    'slug' => '54-paisamin-90-days',
                    'description' => '54 Paisa/min, 90 Days',
                    'amount' => 509,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            102 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '54 Paisa/min, 90 Days',
                    'type' => 'voice',
                    'slug' => '54-paisamin-90-days',
                    'description' => '54 Paisa/min, 90 Days',
                    'amount' => 509,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            103 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '800 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '800-min-30-days',
                    'description' => '800 Min , 30 Days',
                    'amount' => 519,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            104 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '25 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '25-gb-30-days',
                    'description' => '25 GB, 30 Days',
                    'amount' => 549,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            105 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '25 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '25-gb-30-days',
                    'description' => '25 GB, 30 Days',
                    'amount' => 549,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            106 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '550 Min + 35GB , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '550-min-35gb-30-days',
                    'description' => '550 Min + 35GB  , 30 Days',
                    'amount' => 597,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            107 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '400 Min + 20GB (Hoichoi , Chorki)  , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '400-min-20gb-hoichoi-chorki-30-days',
                    'description' => '400 Min + 20GB (Hoichoi , Chorki)  , 30 Days',
                    'amount' => 598,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            108 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '400 Min + 20GB (Hoichoi , Chorki)  , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '400-min-20gb-hoichoi-chorki-30-days',
                    'description' => '400 Min + 20GB (Hoichoi , Chorki)  , 30 Days',
                    'amount' => 598,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            109 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '40 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '40-gb-30-days',
                    'description' => '40 GB, 30 Days',
                    'amount' => 649,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            110 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '40 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '40-gb-30-days',
                    'description' => '40 GB, 30 Days',
                    'amount' => 649,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            111 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '1150 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '1150-min-30-days',
                    'description' => '1150 Min , 30 Days',
                    'amount' => 729,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            112 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '1150 Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '1150-min-30-days',
                    'description' => '1150 Min , 30 Days',
                    'amount' => 729,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            113 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '60 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '60-gb-30-days',
                    'description' => '60 GB, 30 Days',
                    'amount' => 749,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            114 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '60 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '60-gb-30-days',
                    'description' => '60 GB, 30 Days',
                    'amount' => 749,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            115 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '30 GB + 700 Minutes, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '30-gb-700-minutes-30-days',
                    'description' => '30 GB + 700 Minutes, 30 Days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Days',
                        ),
                ),
            116 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '30 GB + 700 Minutes, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '30-gb-700-minutes-30-days',
                    'description' => '30 GB + 700 Minutes, 30 Days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            117 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '100 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '100-gb-30-days',
                    'description' => '100 GB, 30 Days',
                    'amount' => 849,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            118 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '100 GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '100-gb-30-days',
                    'description' => '100 GB, 30 Days',
                    'amount' => 849,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            119 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '54 Paisa/min ,365 Days',
                    'type' => 'voice',
                    'slug' => '54-paisamin-365-days',
                    'description' => '54 Paisa/min ,365 Days',
                    'amount' => 989,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            120 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '54 Paisa/min ,365 Days',
                    'type' => 'voice',
                    'slug' => '54-paisamin-365-days',
                    'description' => '54 Paisa/min ,365 Days',
                    'amount' => 989,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            121 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Unlimited Incoming Roaming SMS + 3 GB Data Bonus for Bangladesh + Account Validity, 3 Years',
                    'type' => 'internet+sms',
                    'slug' => 'unlimited-incoming-roaming-sms-3-gb-data-bonus-for-bangladesh-account-validity-3-years',
                    'description' => 'Unlimited Incoming Roaming SMS + 3 GB Data Bonus for Bangladesh + Account Validity, 3 Years',
                    'amount' => 994,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 94608000,
                            'validity' => '1095 Day',
                        ),
                ),
            122 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Unlimited Incoming Roaming SMS + 3 GB Data Bonus for Bangladesh + Account Validity, 3 Years',
                    'type' => 'internet+sms',
                    'slug' => 'unlimited-incoming-roaming-sms-3-gb-data-bonus-for-bangladesh-account-validity-3-years',
                    'description' => 'Unlimited Incoming Roaming SMS + 3 GB Data Bonus for Bangladesh + Account Validity, 3 Years',
                    'amount' => 994,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 94608000,
                            'validity' => '1095 Day',
                        ),
                ),
            123 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '3 Years Account  Validity + 600 Mins, 30 Days',
                    'type' => 'voice',
                    'slug' => '3-years-account-validity-600-mins-30-days',
                    'description' => '3 Years Account  Validity + 600 Mins, 30 Days',
                    'amount' => 997,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            124 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '3 Years Account  Validity + 600 Mins, 30 Days',
                    'type' => 'voice',
                    'slug' => '3-years-account-validity-600-mins-30-days',
                    'description' => '3 Years Account  Validity + 600 Mins, 30 Days',
                    'amount' => 997,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            125 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Uninterrupted Internet + Hoichoi, T-sports, SonyLiv, Lionsgate play, 30 Days',
                    'type' => 'internet',
                    'slug' => 'uninterrupted-internet-hoichoi-t-sports-sonyliv-lionsgate-play-30-days',
                    'description' => 'Uninterrupted Internet + Hoichoi, T-sports, SonyLiv, Lionsgate play, 30 Days',
                    'amount' => 998,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            126 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Uninterrupted Internet + Hoichoi, T-sports, SonyLiv, Lionsgate play, 30 Days',
                    'type' => 'internet',
                    'slug' => 'uninterrupted-internet-hoichoi-t-sports-sonyliv-lionsgate-play-30-days',
                    'description' => 'Uninterrupted Internet + Hoichoi, T-sports, SonyLiv, Lionsgate play, 30 Days',
                    'amount' => 998,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            127 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50GB + 1500Min + 500 SMS + hoichoi, chorki,t-sports, sonyliv , 30 Days',
                    'type' => 'combo',
                    'slug' => '50gb-1500min-500-sms-hoichoi-chorkit-sports-sonyliv-30-days',
                    'description' => '50GB + 1500Min + 500 SMS + hoichoi, chorki,t-sports, sonyliv , 30 Days',
                    'amount' => 999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            128 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50GB + 1500Min + 500 SMS + hoichoi, chorki,t-sports, sonyliv , 30 Days',
                    'type' => 'combo',
                    'slug' => '50gb-1500min-500-sms-hoichoi-chorkit-sports-sonyliv-30-days',
                    'description' => '50GB + 1500Min + 500 SMS + hoichoi, chorki,t-sports, sonyliv , 30 Days',
                    'amount' => 999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            129 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '25 GB , Unlimited Validity',
                    'type' => 'internet',
                    'slug' => '25-gb-unlimited-validity',
                    'description' => '25 GB , Unlimited Validity',
                    'amount' => 1049,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            130 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '25 GB , Unlimited Validity',
                    'type' => 'internet',
                    'slug' => '25-gb-unlimited-validity',
                    'description' => '25 GB , Unlimited Validity',
                    'amount' => 1049,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            131 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '60GB + 1800Min + 500 SMS + t-sports, sonyliv,hoichoi, chorki, lionsgate,i-screen , 30 Days',
                    'type' => 'combo',
                    'slug' => '60gb-1800min-500-sms-t-sports-sonylivhoichoi-chorki-lionsgatei-screen-30-days',
                    'description' => '60GB + 1800Min + 500 SMS + t-sports, sonyliv,hoichoi, chorki, lionsgate,i-screen , 30 Days',
                    'amount' => 1199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            132 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '60GB + 1800Min + 500 SMS + t-sports, sonyliv,hoichoi, chorki, lionsgate,i-screen , 30 Days',
                    'type' => 'combo',
                    'slug' => '60gb-1800min-500-sms-t-sports-sonylivhoichoi-chorki-lionsgatei-screen-30-days',
                    'description' => '60GB + 1800Min + 500 SMS + t-sports, sonyliv,hoichoi, chorki, lionsgate,i-screen , 30 Days',
                    'amount' => 1199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            133 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Unlimited Incoming Roaming SMS + 5 GB Data Bonus for Bangladesh + Account Validity, 5 Years',
                    'type' => 'internet+sms',
                    'slug' => 'unlimited-incoming-roaming-sms-5-gb-data-bonus-for-bangladesh-account-validity-5-years',
                    'description' => 'Unlimited Incoming Roaming SMS + 5 GB Data Bonus for Bangladesh + Account Validity, 5 Years',
                    'amount' => 1494,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 157680000,
                            'validity' => '1825 Day',
                        ),
                ),
            134 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => 'Unlimited Incoming Roaming SMS + 5 GB Data Bonus for Bangladesh + Account Validity, 5 Years',
                    'type' => 'internet+sms',
                    'slug' => 'unlimited-incoming-roaming-sms-5-gb-data-bonus-for-bangladesh-account-validity-5-years',
                    'description' => 'Unlimited Incoming Roaming SMS + 5 GB Data Bonus for Bangladesh + Account Validity, 5 Years',
                    'amount' => 1494,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 157680000,
                            'validity' => '1825 Day',
                        ),
                ),
            135 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '5 Years Account Validity + 900 Min, 30 Days',
                    'type' => 'voice',
                    'slug' => '5-years-account-validity-900-min-30-days',
                    'description' => '5 Years Account Validity + 900 Min, 30 Days',
                    'amount' => 1498,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            136 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '5 Years Account Validity + 900 Min, 30 Days',
                    'type' => 'voice',
                    'slug' => '5-years-account-validity-900-min-30-days',
                    'description' => '5 Years Account Validity + 900 Min, 30 Days',
                    'amount' => 1498,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            137 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '120 GB (40 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '120-gb-40-gb-every-30th-day-30-days',
                    'description' => '120 GB (40 GB every 30th Day), 30 Days',
                    'amount' => 1647,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            138 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '120 GB (40 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '120-gb-40-gb-every-30th-day-30-days',
                    'description' => '120 GB (40 GB every 30th Day), 30 Days',
                    'amount' => 1647,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            139 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50 GB , Unlimited Validity',
                    'type' => 'internet',
                    'slug' => '50-gb-unlimited-validity',
                    'description' => '50 GB , Unlimited Validity',
                    'amount' => 1649,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            140 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '50 GB , Unlimited Validity',
                    'type' => 'internet',
                    'slug' => '50-gb-unlimited-validity',
                    'description' => '50 GB , Unlimited Validity',
                    'amount' => 1649,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            141 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '180 GB (60 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '180-gb-60-gb-every-30th-day-30-days',
                    'description' => '180 GB (60 GB every 30th Day), 30 Days',
                    'amount' => 1947,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            142 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '180 GB (60 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '180-gb-60-gb-every-30th-day-30-days',
                    'description' => '180 GB (60 GB every 30th Day), 30 Days',
                    'amount' => 1947,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            143 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '100 GB + 2500 Mins, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '100-gb-2500-mins-30-days',
                    'description' => '100 GB + 2500 Mins, 30 Days',
                    'amount' => 1999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            144 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '75 GB , Unlimited Validity',
                    'type' => 'internet',
                    'slug' => '75-gb-unlimited-validity',
                    'description' => '75 GB , Unlimited Validity',
                    'amount' => 2149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            145 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '75 GB , Unlimited Validity',
                    'type' => 'internet',
                    'slug' => '75-gb-unlimited-validity',
                    'description' => '75 GB , Unlimited Validity',
                    'amount' => 2149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            146 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '240 GB (80 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '240-gb-80-gb-every-30th-day-30-days',
                    'description' => '240 GB (80 GB every 30th Day), 30 Days',
                    'amount' => 2247,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            147 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '240 GB (80 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '240-gb-80-gb-every-30th-day-30-days',
                    'description' => '240 GB (80 GB every 30th Day), 30 Days',
                    'amount' => 2247,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            148 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '375 GB (125 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '375-gb-125-gb-every-30th-day-30-days',
                    'description' => '375 GB (125 GB every 30th Day), 30 Days',
                    'amount' => 2547,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            149 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '375 GB (125 GB every 30th Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '375-gb-125-gb-every-30th-day-30-days',
                    'description' => '375 GB (125 GB every 30th Day), 30 Days',
                    'amount' => 2547,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            150 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 21 min, 24 hours',
                    'type' => 'voice',
                    'slug' => 'anynet-21-min-24-hours',
                    'description' => 'Anynet 21 min, 24 hours',
                    'amount' => 19,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            151 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 35 min, 2 days',
                    'type' => 'voice',
                    'slug' => 'anynet-35-min-2-days',
                    'description' => 'Anynet 35 min, 2 days',
                    'amount' => 27,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            152 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1GB-24Hr',
                    'type' => 'internet',
                    'slug' => '1gb-24hr',
                    'description' => '1GB-24Hr',
                    'amount' => 31,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            153 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '99 P/Min any local number, 3 Days',
                    'type' => 'voice',
                    'slug' => '99-pmin-any-local-number-3-days',
                    'description' => '99 P/Min any local number, 3 Days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            154 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '2 GB , 24 Hours',
                    'type' => 'internet',
                    'slug' => '2-gb-24-hours',
                    'description' => '2 GB , 24 Hours',
                    'amount' => 38,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            155 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1.40 Tk/Min any local number, 5 Days',
                    'type' => 'voice',
                    'slug' => '140-tkmin-any-local-number-5-days',
                    'description' => '1.40 Tk/Min any local number, 5 Days',
                    'amount' => 39,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            156 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '500MB+15Min+2GB BiP - 72Hrs',
                    'type' => 'voice+internet',
                    'slug' => '500mb15min2gb-bip-72hrs',
                    'description' => '500MB+15Min+2GB BiP - 72Hrs',
                    'amount' => 44,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            157 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 52 min, 3 days',
                    'type' => 'voice',
                    'slug' => 'anynet-52-min-3-days',
                    'description' => 'Anynet 52 min, 3 days',
                    'amount' => 47,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 345600,
                            'validity' => '4 Day',
                        ),
                ),
            158 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1GB-72Hrs',
                    'type' => 'internet',
                    'slug' => '1gb-72hrs',
                    'description' => '1GB-72Hrs',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            159 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 65 min, 5 days',
                    'type' => 'voice',
                    'slug' => 'anynet-65-min-5-days',
                    'description' => 'Anynet 65 min, 5 days',
                    'amount' => 57,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            160 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1.40 Tk/Min any local number, 7 Days',
                    'type' => 'voice',
                    'slug' => '140-tkmin-any-local-number-7-days',
                    'description' => '1.40 Tk/Min any local number, 7 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            161 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '99 P/Min any local number, 5 Days',
                    'type' => 'voice',
                    'slug' => '99-pmin-any-local-number-5-days',
                    'description' => '99 P/Min any local number, 5 Days',
                    'amount' => 64,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            162 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '2GB - 72Hrs',
                    'type' => 'internet',
                    'slug' => '2gb-72hrs',
                    'description' => '2GB - 72Hrs',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            163 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 90 min, 5 days',
                    'type' => 'voice',
                    'slug' => 'anynet-90-min-5-days',
                    'description' => 'Anynet 90 min, 5 days',
                    'amount' => 77,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            164 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1GB+30Min+2GB BiP - 72Hrs',
                    'type' => 'voice+internet',
                    'slug' => '1gb30min2gb-bip-72hrs',
                    'description' => '1GB+30Min+2GB BiP - 72Hrs',
                    'amount' => 78,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            165 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1GB+1GB Toffee+1GB BiP-7Days',
                    'type' => 'internet',
                    'slug' => '1gb1gb-toffee1gb-bip-7days',
                    'description' => '1GB+1GB Toffee+1GB BiP-7Days',
                    'amount' => 79,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            166 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '99p/min+tax to any local number, 7 days',
                    'type' => 'voice',
                    'slug' => '99pmintax-to-any-local-number-7-days',
                    'description' => '99p/min+tax to any local number, 7 days',
                    'amount' => 89,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            167 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 115 min, 7 days',
                    'type' => 'voice',
                    'slug' => 'anynet-115-min-7-days',
                    'description' => 'Anynet 115 min, 7 days',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            168 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1GB+5GB BiP+30 Mins, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '1gb5gb-bip30-mins-7-days',
                    'description' => '1GB+5GB BiP+30 Mins, 7 Days',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            169 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '2GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '2gb-7-days',
                    'description' => '2GB , 7 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            170 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1.40 Tk/Min any local number, 30 Days',
                    'type' => 'voice',
                    'slug' => '140-tkmin-any-local-number-30-days',
                    'description' => '1.40 Tk/Min any local number, 30 Days',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            171 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 160 min, 7 days',
                    'type' => 'voice',
                    'slug' => 'anynet-160-min-7-days',
                    'description' => 'Anynet 160 min, 7 days',
                    'amount' => 117,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            172 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '99 P/Min any local number, 30 Days',
                    'type' => 'voice',
                    'slug' => '99-pmin-any-local-number-30-days',
                    'description' => '99 P/Min any local number, 30 Days',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            173 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 180 min, 7 days',
                    'type' => 'voice',
                    'slug' => 'anynet-180-min-7-days',
                    'description' => 'Anynet 180 min, 7 days',
                    'amount' => 127,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            174 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '5GB,7Days',
                    'type' => 'internet',
                    'slug' => '5gb7days',
                    'description' => '5GB,7Days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            175 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 220 min + Free T20 World Cup Subscription, 7 days',
                    'type' => 'voice',
                    'slug' => 'anynet-220-min-free-t20-world-cup-subscription-7-days',
                    'description' => 'Anynet 220 min + Free T20 World Cup Subscription, 7 days',
                    'amount' => 147,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            176 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '4GB+5GB BiP+50 Mins, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '4gb5gb-bip50-mins-7-days',
                    'description' => '4GB+5GB BiP+50 Mins, 7 Days',
                    'amount' => 148,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            177 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '6GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '6gb-7-days',
                    'description' => '6GB , 7 Days',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            178 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1 P/sec any local number, 30 Days',
                    'type' => 'voice',
                    'slug' => '1-psec-any-local-number-30-days',
                    'description' => '1 P/sec any local number, 30 Days',
                    'amount' => 159,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            179 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 175 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-175-min-30-days',
                    'description' => 'Anynet 175 min, 30 days',
                    'amount' => 167,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            180 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '7GB(1GB/Day), 7 Days',
                    'type' => 'internet',
                    'slug' => '7gb1gbday-7-days',
                    'description' => '7GB(1GB/Day), 7 Days',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            181 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1 P/sec any local number, 60 Days',
                    'type' => 'voice',
                    'slug' => '1-psec-any-local-number-60-days',
                    'description' => '1 P/sec any local number, 60 Days',
                    'amount' => 189,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            182 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '5GB (+ Free Hoichoi, Chorki & Toffee Free Content), 7Days',
                    'type' => 'internet',
                    'slug' => '5gb-free-hoichoi-chorki-toffee-free-content-7days',
                    'description' => '5GB (+ Free Hoichoi, Chorki & Toffee Free Content), 7Days',
                    'amount' => 196,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            183 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 220 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-220-min-30-days',
                    'description' => 'Anynet 220 min, 30 days',
                    'amount' => 197,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            184 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '6GB+5GB Toffee+100 Mins, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '6gb5gb-toffee100-mins-7-days',
                    'description' => '6GB+5GB Toffee+100 Mins, 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            185 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '15GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '15GB, 7 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            186 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '5GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '5gb-30-days',
                    'description' => '5GB, 30 Days',
                    'amount' => 209,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            187 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '25GB+5GB Toffee+5GB BiP - 7 Days',
                    'type' => 'internet',
                    'slug' => '25gb5gb-toffee5gb-bip-7-days',
                    'description' => '25GB+5GB Toffee+5GB BiP - 7 Days',
                    'amount' => 229,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            188 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 330 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-330-min-30-days',
                    'description' => 'Anynet 330 min, 30 days',
                    'amount' => 247,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            189 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '12GB+5GB Toffee+150 Mins, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '12gb5gb-toffee150-mins-7-days',
                    'description' => '12GB+5GB Toffee+150 Mins, 7 Days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            190 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '35GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '35gb-7-days',
                    'description' => '35GB, 7 Days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            191 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '55GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '55gb-7-days',
                    'description' => '55GB, 7 Days',
                    'amount' => 279,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            192 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 400 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-400-min-30-days',
                    'description' => 'Anynet 400 min, 30 days',
                    'amount' => 297,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            193 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '5GB+10GB Toffee+100 Mins, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '5gb10gb-toffee100-mins-30-days',
                    'description' => '5GB+10GB Toffee+100 Mins, 30 Days',
                    'amount' => 298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            194 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '10GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '10gb-30-days',
                    'description' => '10GB, 30 Days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            195 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '1 P/sec any local number, 90 Days',
                    'type' => 'voice',
                    'slug' => '1-psec-any-local-number-90-days',
                    'description' => '1 P/sec any local number, 90 Days',
                    'amount' => 309,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            196 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 500 min + Free T20 World Cup Subscription, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-500-min-free-t20-world-cup-subscription-30-days',
                    'description' => 'Anynet 500 min + Free T20 World Cup Subscription, 30 days',
                    'amount' => 337,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            197 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '5GB (+ Free Hoichoi, Chorki & Toffee Free Content), 30Days',
                    'type' => 'internet',
                    'slug' => '5gb-free-hoichoi-chorki-toffee-free-content-30days',
                    'description' => '5GB (+ Free Hoichoi, Chorki & Toffee Free Content), 30Days',
                    'amount' => 396,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            198 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 600 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-600-min-30-days',
                    'description' => 'Anynet 600 min, 30 days',
                    'amount' => 397,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            199 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '10GB+10GB Toffee+150 Mins, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '10gb10gb-toffee150-mins-30-days',
                    'description' => '10GB+10GB Toffee+150 Mins, 30 Days',
                    'amount' => 398,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            200 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '15GB+5GB Toffee+5GB BiP - 30 Days',
                    'type' => 'internet',
                    'slug' => '15gb5gb-toffee5gb-bip-30-days',
                    'description' => '15GB+5GB Toffee+5GB BiP - 30 Days',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            201 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '30GB(1GB/Day), 30 Days',
                    'type' => 'internet',
                    'slug' => '30gb1gbday-30-days',
                    'description' => '30GB(1GB/Day), 30 Days',
                    'amount' => 489,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            202 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 755 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-755-min-30-days',
                    'description' => 'Anynet 755 min, 30 days',
                    'amount' => 497,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            203 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '15GB+10GB Toffee+300 Mins, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '15gb10gb-toffee300-mins-30-days',
                    'description' => '15GB+10GB Toffee+300 Mins, 30 Days',
                    'amount' => 498,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            204 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '25GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '25gb-30-days',
                    'description' => '25GB, 30 Days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            205 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '35GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '35gb-30-days',
                    'description' => '35GB, 30 Days',
                    'amount' => 599,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            206 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 880 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-880-min-30-days',
                    'description' => 'Anynet 880 min, 30 days',
                    'amount' => 607,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            207 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 1000 min, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-1000-min-30-days',
                    'description' => 'Anynet 1000 min, 30 days',
                    'amount' => 647,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            208 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '45GB+10GB Toffee+600 Mins, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '45gb10gb-toffee600-mins-30-days',
                    'description' => '45GB+10GB Toffee+600 Mins, 30 Days',
                    'amount' => 798,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            209 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '80GB+5GB Toffee+5GB BiP - 30 Days',
                    'type' => 'internet',
                    'slug' => '80gb5gb-toffee5gb-bip-30-days',
                    'description' => '80GB+5GB Toffee+5GB BiP - 30 Days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            210 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '69 P/Min any local number, 365 Days',
                    'type' => 'voice',
                    'slug' => '69-pmin-any-local-number-365-days',
                    'description' => '69 P/Min any local number, 365 Days',
                    'amount' => 889,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            211 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 600 min + 3 years main account validity, 30 days',
                    'type' => 'voice',
                    'slug' => 'anynet-600-min-3-years-main-account-validity-30-days',
                    'description' => 'Anynet 600 min + 3 years main account validity, 30 days',
                    'amount' => 897,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            212 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '120GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '120gb-30-days',
                    'description' => '120GB, 30 Days',
                    'amount' => 899,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            213 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '60GB+10GB Toffee+1000 Mins, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '60gb10gb-toffee1000-mins-30-days',
                    'description' => '60GB+10GB Toffee+1000 Mins, 30 Days',
                    'amount' => 998,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            214 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => 'Anynet 900 Min + 5 years main account validity, 30 Days',
                    'type' => 'voice',
                    'slug' => 'anynet-900-min-5-years-main-account-validity-30-days',
                    'description' => 'Anynet 900 Min + 5 years main account validity, 30 Days',
                    'amount' => 1397,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            215 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '23 Minute , 24 Hours',
                    'type' => 'voice',
                    'slug' => '23-minute-24-hours',
                    'description' => '23 Minute , 24 Hours',
                    'amount' => 19,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            216 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '23 Minute , 24 Hours',
                    'type' => 'voice',
                    'slug' => '23-minute-24-hours',
                    'description' => '23 Minute , 24 Hours',
                    'amount' => 19,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            217 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '32 Minute , 24 Hours',
                    'type' => 'voice',
                    'slug' => '32-minute-24-hours',
                    'description' => '32 Minute , 24 Hours',
                    'amount' => 24,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            218 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '32 Minute , 24 Hours',
                    'type' => 'voice',
                    'slug' => '32-minute-24-hours',
                    'description' => '32 Minute , 24 Hours',
                    'amount' => 24,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            219 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 2 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-2-days',
                    'description' => '99P/Min , 2 Days',
                    'amount' => 26,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            220 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 2 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-2-days',
                    'description' => '99P/Min , 2 Days',
                    'amount' => 26,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            221 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '1gb-24-hours',
                    'description' => '1GB, 24 Hours',
                    'amount' => 28,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            222 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '1gb-24-hours',
                    'description' => '1GB, 24 Hours',
                    'amount' => 28,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            223 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '512MB , 3 Days',
                    'type' => 'internet',
                    'slug' => '512mb-3-days',
                    'description' => '512MB , 3 Days',
                    'amount' => 29,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            224 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '512MB , 3 Days',
                    'type' => 'internet',
                    'slug' => '512mb-3-days',
                    'description' => '512MB , 3 Days',
                    'amount' => 29,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            225 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 2 Days',
                    'type' => 'voice',
                    'slug' => '1psec-2-days',
                    'description' => '1P/Sec , 2 Days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            226 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 2 Days',
                    'type' => 'voice',
                    'slug' => '1psec-2-days',
                    'description' => '1P/Sec , 2 Days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            227 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '2GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '2gb-24-hours',
                    'description' => '2GB, 24 Hours',
                    'amount' => 38,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            228 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '2GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '2gb-24-hours',
                    'description' => '2GB, 24 Hours',
                    'amount' => 38,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            229 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '55 Minute , 2 Days',
                    'type' => 'voice',
                    'slug' => '55-minute-2-days',
                    'description' => '55 Minute , 2 Days',
                    'amount' => 39,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            230 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '55 Minute , 2 Days',
                    'type' => 'voice',
                    'slug' => '55-minute-2-days',
                    'description' => '55 Minute , 2 Days',
                    'amount' => 39,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            231 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 5 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-5-days',
                    'description' => '99P/Min , 5 Days',
                    'amount' => 44,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            232 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 5 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-5-days',
                    'description' => '99P/Min , 5 Days',
                    'amount' => 44,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            233 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '4GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '4gb-24-hours',
                    'description' => '4GB, 24 Hours',
                    'amount' => 48,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            234 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '4GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '4gb-24-hours',
                    'description' => '4GB, 24 Hours',
                    'amount' => 48,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            235 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '55 Minute , 3 Days',
                    'type' => 'voice',
                    'slug' => '55-minute-3-days',
                    'description' => '55 Minute , 3 Days',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            236 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '55 Minute , 3 Days',
                    'type' => 'voice',
                    'slug' => '55-minute-3-days',
                    'description' => '55 Minute , 3 Days',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            237 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-7-days',
                    'description' => '99P/Min , 7 Days',
                    'amount' => 56,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            238 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 7 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-7-days',
                    'description' => '99P/Min , 7 Days',
                    'amount' => 56,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            239 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '60 Minute , 5 Days',
                    'type' => 'voice',
                    'slug' => '60-minute-5-days',
                    'description' => '60 Minute , 5 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            240 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '60 Minute , 5 Days',
                    'type' => 'voice',
                    'slug' => '60-minute-5-days',
                    'description' => '60 Minute , 5 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            241 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 5 Days',
                    'type' => 'voice',
                    'slug' => '1psec-5-days',
                    'description' => '1P/Sec , 5 Days',
                    'amount' => 64,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            242 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 5 Days',
                    'type' => 'voice',
                    'slug' => '1psec-5-days',
                    'description' => '1P/Sec , 5 Days',
                    'amount' => 64,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            243 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '80 Minute , 5 Days',
                    'type' => 'voice',
                    'slug' => '80-minute-5-days',
                    'description' => '80 Minute , 5 Days',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            244 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '80 Minute , 5 Days',
                    'type' => 'voice',
                    'slug' => '80-minute-5-days',
                    'description' => '80 Minute , 5 Days',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            245 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 30 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-30-days',
                    'description' => '1.39tk/min , 30 Days',
                    'amount' => 94,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            246 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '5GB, 3 Days',
                    'type' => 'internet',
                    'slug' => '5gb-3-days',
                    'description' => '5GB, 3 Days',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            247 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '5GB, 3 Days',
                    'type' => 'internet',
                    'slug' => '5gb-3-days',
                    'description' => '5GB, 3 Days',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            248 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '110 Minute , 7 Days',
                    'type' => 'voice',
                    'slug' => '110-minute-7-days',
                    'description' => '110 Minute , 7 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            249 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '110 Minute , 7 Days',
                    'type' => 'voice',
                    'slug' => '110-minute-7-days',
                    'description' => '110 Minute , 7 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            250 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-30-days',
                    'description' => '99P/Min , 30 Days',
                    'amount' => 106,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            251 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-30-days',
                    'description' => '99P/Min , 30 Days',
                    'amount' => 106,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            252 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-30-days',
                    'description' => '99P/Min , 30 Days',
                    'amount' => 114,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            253 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '99P/Min , 30 Days',
                    'type' => 'voice',
                    'slug' => '99pmin-30-days',
                    'description' => '99P/Min , 30 Days',
                    'amount' => 114,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            254 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '10GB, 3 Days',
                    'type' => 'internet',
                    'slug' => '10gb-3-days',
                    'description' => '10GB, 3 Days',
                    'amount' => 118,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            255 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '10GB, 3 Days',
                    'type' => 'internet',
                    'slug' => '10gb-3-days',
                    'description' => '10GB, 3 Days',
                    'amount' => 118,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            256 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '170 Minute , 7 Days',
                    'type' => 'voice',
                    'slug' => '170-minute-7-days',
                    'description' => '170 Minute , 7 Days',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            257 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '170 Minute , 7 Days',
                    'type' => 'voice',
                    'slug' => '170-minute-7-days',
                    'description' => '170 Minute , 7 Days',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            258 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 30 Days',
                    'type' => 'voice',
                    'slug' => '1psec-30-days',
                    'description' => '1P/Sec , 30 Days',
                    'amount' => 124,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            259 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 30 Days',
                    'type' => 'voice',
                    'slug' => '1psec-30-days',
                    'description' => '1P/Sec , 30 Days',
                    'amount' => 124,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            260 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '5GB, 7 days',
                    'type' => 'internet',
                    'slug' => '5gb-7-days',
                    'description' => '5GB, 7 days',
                    'amount' => 128,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            261 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '5GB, 7 days',
                    'type' => 'internet',
                    'slug' => '5gb-7-days',
                    'description' => '5GB, 7 days',
                    'amount' => 128,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            262 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '130 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '130-minute-30-days',
                    'description' => '130 Minute , 30 Days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            263 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '130 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '130-minute-30-days',
                    'description' => '130 Minute , 30 Days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            264 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '220 Minute , 7 Days',
                    'type' => 'voice',
                    'slug' => '220-minute-7-days',
                    'description' => '220 Minute , 7 Days',
                    'amount' => 139,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            265 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '220 Minute , 7 Days',
                    'type' => 'voice',
                    'slug' => '220-minute-7-days',
                    'description' => '220 Minute , 7 Days',
                    'amount' => 139,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            266 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '3GB, 30 days',
                    'type' => 'internet',
                    'slug' => '3gb-30-days',
                    'description' => '3GB, 30 days',
                    'amount' => 148,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            267 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '3GB, 30 days',
                    'type' => 'internet',
                    'slug' => '3gb-30-days',
                    'description' => '3GB, 30 days',
                    'amount' => 148,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            268 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '8GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '8gb-7-days',
                    'description' => '8GB , 7 Days',
                    'amount' => 168,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            269 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '8GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '8gb-7-days',
                    'description' => '8GB , 7 Days',
                    'amount' => 168,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            270 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '175 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '175-minute-30-days',
                    'description' => '175 Minute , 30 Days',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            271 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '175 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '175-minute-30-days',
                    'description' => '175 Minute , 30 Days',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            272 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '3GB , 150 Mins , 7 days',
                    'type' => 'voice+internet',
                    'slug' => '3gb-150-mins-7-days',
                    'description' => '3GB , 150 Mins , 7 days',
                    'amount' => 179,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            273 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '3GB , 150 Mins , 7 days',
                    'type' => 'voice+internet',
                    'slug' => '3gb-150-mins-7-days',
                    'description' => '3GB , 150 Mins , 7 days',
                    'amount' => 179,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            274 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '240 Minute , 15 Days',
                    'type' => 'voice',
                    'slug' => '240-minute-15-days',
                    'description' => '240 Minute , 15 Days',
                    'amount' => 189,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 1296000,
                            'validity' => '15 Day',
                        ),
                ),
            275 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '240 Minute , 15 Days',
                    'type' => 'voice',
                    'slug' => '240-minute-15-days',
                    'description' => '240 Minute , 15 Days',
                    'amount' => 189,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 1296000,
                            'validity' => '15 Day',
                        ),
                ),
            276 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '15GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '15GB , 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            277 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '15GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '15GB , 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            278 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '215 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '215-minute-30-days',
                    'description' => '215 Minute , 30 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            279 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '215 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '215-minute-30-days',
                    'description' => '215 Minute , 30 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            280 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 60 Days',
                    'type' => 'voice',
                    'slug' => '1psec-60-days',
                    'description' => '1P/Sec , 60 Days',
                    'amount' => 204,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            281 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 60 Days',
                    'type' => 'voice',
                    'slug' => '1psec-60-days',
                    'description' => '1P/Sec , 60 Days',
                    'amount' => 204,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            282 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '25GB, 7 days',
                    'type' => 'internet',
                    'slug' => '25gb-7-days',
                    'description' => '25GB, 7 days',
                    'amount' => 228,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            283 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '25GB, 7 days',
                    'type' => 'internet',
                    'slug' => '25gb-7-days',
                    'description' => '25GB, 7 days',
                    'amount' => 228,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            284 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '270 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '270-minute-30-days',
                    'description' => '270 Minute , 30 Days',
                    'amount' => 239,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            285 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '270 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '270-minute-30-days',
                    'description' => '270 Minute , 30 Days',
                    'amount' => 239,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            286 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '7GB, 30 days',
                    'type' => 'internet',
                    'slug' => '7gb-30-days',
                    'description' => '7GB, 30 days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            287 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '7GB, 30 days',
                    'type' => 'internet',
                    'slug' => '7gb-30-days',
                    'description' => '7GB, 30 days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            288 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '5GB , 200 Mins , 7 days',
                    'type' => 'voice+internet',
                    'slug' => '5gb-200-mins-7-days',
                    'description' => '5GB , 200 Mins , 7 days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            289 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '5GB , 200 Mins , 7 days',
                    'type' => 'voice+internet',
                    'slug' => '5gb-200-mins-7-days',
                    'description' => '5GB , 200 Mins , 7 days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            290 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '55GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '55gb-7-days',
                    'description' => '55GB, 7 Days',
                    'amount' => 278,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            291 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '55GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '55gb-7-days',
                    'description' => '55GB, 7 Days',
                    'amount' => 278,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            292 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '375 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '375-minute-30-days',
                    'description' => '375 Minute , 30 Days',
                    'amount' => 289,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            293 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '375 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '375-minute-30-days',
                    'description' => '375 Minute , 30 Days',
                    'amount' => 289,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            294 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '4GB , 100 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '4gb-100-mins-30-days',
                    'description' => '4GB , 100 Mins , 30 days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            295 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '4GB , 100 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '4gb-100-mins-30-days',
                    'description' => '4GB , 100 Mins , 30 days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            296 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 90 Days',
                    'type' => 'voice',
                    'slug' => '1psec-90-days',
                    'description' => '1P/Sec , 90 Days',
                    'amount' => 304,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            297 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 90 Days',
                    'type' => 'voice',
                    'slug' => '1psec-90-days',
                    'description' => '1P/Sec , 90 Days',
                    'amount' => 304,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            298 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '25GB , 400 Mins , 7 days',
                    'type' => 'voice+internet',
                    'slug' => '25gb-400-mins-7-days',
                    'description' => '25GB , 400 Mins , 7 days',
                    'amount' => 309,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            299 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '25GB , 400 Mins , 7 days',
                    'type' => 'voice+internet',
                    'slug' => '25gb-400-mins-7-days',
                    'description' => '25GB , 400 Mins , 7 days',
                    'amount' => 309,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            300 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '475 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '475-minute-30-days',
                    'description' => '475 Minute , 30 Days',
                    'amount' => 319,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            301 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '475 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '475-minute-30-days',
                    'description' => '475 Minute , 30 Days',
                    'amount' => 319,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            302 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '13GB, 30 days',
                    'type' => 'internet',
                    'slug' => '13gb-30-days',
                    'description' => '13GB, 30 days',
                    'amount' => 348,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            303 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '13GB, 30 days',
                    'type' => 'internet',
                    'slug' => '13gb-30-days',
                    'description' => '13GB, 30 days',
                    'amount' => 348,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            304 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '550 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '550-minute-30-days',
                    'description' => '550 Minute , 30 Days',
                    'amount' => 359,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            305 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '550 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '550-minute-30-days',
                    'description' => '550 Minute , 30 Days',
                    'amount' => 359,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            306 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '10GB , 150 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '10gb-150-mins-30-days',
                    'description' => '10GB , 150 Mins , 30 days',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            307 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '10GB , 150 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '10gb-150-mins-30-days',
                    'description' => '10GB , 150 Mins , 30 days',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            308 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '640 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '640-minute-30-days',
                    'description' => '640 Minute , 30 Days',
                    'amount' => 409,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            309 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '640 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '640-minute-30-days',
                    'description' => '640 Minute , 30 Days',
                    'amount' => 409,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            310 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '15GB , 300 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '15gb-300-mins-30-days',
                    'description' => '15GB , 300 Mins , 30 days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            311 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '15GB , 300 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '15gb-300-mins-30-days',
                    'description' => '15GB , 300 Mins , 30 days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            312 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '750 Minute , 60 Days',
                    'type' => 'voice',
                    'slug' => '750-minute-60-days',
                    'description' => '750 Minute , 60 Days',
                    'amount' => 509,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            313 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '750 Minute , 60 Days',
                    'type' => 'voice',
                    'slug' => '750-minute-60-days',
                    'description' => '750 Minute , 60 Days',
                    'amount' => 509,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            314 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '25GB , 400 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '25gb-400-mins-30-days',
                    'description' => '25GB , 400 Mins , 30 days',
                    'amount' => 599,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            315 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '25GB , 400 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '25gb-400-mins-30-days',
                    'description' => '25GB , 400 Mins , 30 days',
                    'amount' => 599,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            316 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1000 Minute , 30 Days',
                    'type' => 'voice',
                    'slug' => '1000-minute-30-days',
                    'description' => '1000 Minute , 30 Days',
                    'amount' => 639,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            317 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1000 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '1000-mins-30-days',
                    'description' => '1000 Mins , 30 days',
                    'amount' => 639,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            318 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1050 Minute , 90 Days',
                    'type' => 'voice',
                    'slug' => '1050-minute-90-days',
                    'description' => '1050 Minute , 90 Days',
                    'amount' => 689,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            319 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1050 Minute , 90 Days',
                    'type' => 'voice',
                    'slug' => '1050-minute-90-days',
                    'description' => '1050 Minute , 90 Days',
                    'amount' => 689,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 7776000,
                            'validity' => '90 Day',
                        ),
                ),
            320 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '35GB , 500 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '35gb-500-mins-30-days',
                    'description' => '35GB , 500 Mins , 30 days',
                    'amount' => 699,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            321 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '35GB , 500 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '35gb-500-mins-30-days',
                    'description' => '35GB , 500 Mins , 30 days',
                    'amount' => 699,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            322 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '70GB, 30 days',
                    'type' => 'internet',
                    'slug' => '70gb-30-days',
                    'description' => '70GB, 30 days',
                    'amount' => 748,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            323 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '70GB, 30 days',
                    'type' => 'internet',
                    'slug' => '70gb-30-days',
                    'description' => '70GB, 30 days',
                    'amount' => 748,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            324 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '40GB , 700 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '40gb-700-mins-30-days',
                    'description' => '40GB , 700 Mins , 30 days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            325 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '40GB , 700 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '40gb-700-mins-30-days',
                    'description' => '40GB , 700 Mins , 30 days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            326 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '120GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '120gb-30-days',
                    'description' => '120GB, 30 Days',
                    'amount' => 898,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            327 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '120GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '120gb-30-days',
                    'description' => '120GB, 30 Days',
                    'amount' => 898,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            328 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 365 Days',
                    'type' => 'voice',
                    'slug' => '1psec-365-days',
                    'description' => '1P/Sec , 365 Days',
                    'amount' => 904,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            329 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1P/Sec , 365 Days',
                    'type' => 'voice',
                    'slug' => '1psec-365-days',
                    'description' => '1P/Sec , 365 Days',
                    'amount' => 904,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            330 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1500 Minute , 150 Days',
                    'type' => 'voice',
                    'slug' => '1500-minute-150-days',
                    'description' => '1500 Minute , 150 Days',
                    'amount' => 989,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 12960000,
                            'validity' => '150 Day',
                        ),
                ),
            331 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '1500 Minute , 150 Days',
                    'type' => 'voice',
                    'slug' => '1500-minute-150-days',
                    'description' => '1500 Minute , 150 Days',
                    'amount' => 989,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 12960000,
                            'validity' => '150 Day',
                        ),
                ),
            332 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '50GB, 1500 Mins, 30 days',
                    'type' => 'voice+internet',
                    'slug' => '50gb-1500-mins-30-days',
                    'description' => '50GB, 1500 Mins, 30 days',
                    'amount' => 999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            333 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '50GB, 1500 Mins, 30 days',
                    'type' => 'voice+internet',
                    'slug' => '50gb-1500-mins-30-days',
                    'description' => '50GB, 1500 Mins, 30 days',
                    'amount' => 999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            334 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '80GB , 1600 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '80gb-1600-mins-30-days',
                    'description' => '80GB , 1600 Mins , 30 days',
                    'amount' => 1299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            335 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '80GB , 1600 Mins , 30 days',
                    'type' => 'voice+internet',
                    'slug' => '80gb-1600-mins-30-days',
                    'description' => '80GB , 1600 Mins , 30 days',
                    'amount' => 1299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            336 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '50 SMS , 3 days',
                    'type' => 'sms',
                    'slug' => '50-sms-3-days',
                    'description' => '50 SMS , 3 days',
                    'amount' => 7,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            337 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '100 MB, 7 Days',
                    'type' => 'internet',
                    'slug' => '100-mb-7-days',
                    'description' => '100 MB, 7 Days',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            338 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '100 SMS , 7 days',
                    'type' => 'sms',
                    'slug' => '100-sms-7-days',
                    'description' => '100 SMS , 7 days',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            339 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '23 Mins , 3 days',
                    'type' => 'voice',
                    'slug' => '23-mins-3-days',
                    'description' => '23 Mins , 3 days',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            340 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1.0 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '10-gb-7-days',
                    'description' => '1.0 GB, 7 Days',
                    'amount' => 22,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            341 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '100 MB, 30 days',
                    'type' => 'internet',
                    'slug' => '100-mb-30-days',
                    'description' => '100 MB, 30 days',
                    'amount' => 23,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            342 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '53 Mins , 3 days',
                    'type' => 'voice',
                    'slug' => '53-mins-3-days',
                    'description' => '53 Mins , 3 days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            343 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '2.0 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '20-gb-7-days',
                    'description' => '2.0 GB, 7 Days',
                    'amount' => 38,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            344 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1 GB+25 minute+10 SMS , 7 days',
                    'type' => 'combo',
                    'slug' => '1-gb25-minute10-sms-7-days',
                    'description' => '1 GB+25 minute+10 SMS , 7 days',
                    'amount' => 39,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            345 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '500 MB, 30 days',
                    'type' => 'internet',
                    'slug' => '500-mb-30-days',
                    'description' => '500 MB, 30 days',
                    'amount' => 41,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            346 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1 GB+25 minute+10 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '1-gb25-minute10-sms-30-days',
                    'description' => '1 GB+25 minute+10 SMS , 30 days',
                    'amount' => 45,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            347 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '3.0 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '30-gb-7-days',
                    'description' => '3.0 GB, 7 Days',
                    'amount' => 46,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            348 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1 GB+55 minute+50 SMS , 7 days',
                    'type' => 'combo',
                    'slug' => '1-gb55-minute50-sms-7-days',
                    'description' => '1 GB+55 minute+50 SMS , 7 days',
                    'amount' => 52,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            349 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '4.0 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '40-gb-7-days',
                    'description' => '4.0 GB, 7 Days',
                    'amount' => 58,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            350 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '500 SMS , 30 days',
                    'type' => 'sms',
                    'slug' => '500-sms-30-days',
                    'description' => '500 SMS , 30 days',
                    'amount' => 61,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            351 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '1-gb-30-days',
                    'description' => '1 GB, 30 days',
                    'amount' => 62,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            352 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1 GB+55 minute+50 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '1-gb55-minute50-sms-30-days',
                    'description' => '1 GB+55 minute+50 SMS , 30 days',
                    'amount' => 66,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            353 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '5.0 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '50-gb-7-days',
                    'description' => '5.0 GB, 7 Days',
                    'amount' => 67,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            354 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '143 Mins , 7 days',
                    'type' => 'voice',
                    'slug' => '143-mins-7-days',
                    'description' => '143 Mins , 7 days',
                    'amount' => 91,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            355 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '2 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '2-gb-30-days',
                    'description' => '2 GB, 30 days',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            356 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1.2 GB+150 minute+120 SMS , 7 days',
                    'type' => 'combo',
                    'slug' => '12-gb150-minute120-sms-7-days',
                    'description' => '1.2 GB+150 minute+120 SMS , 7 days',
                    'amount' => 100,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            357 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '10 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '10-gb-7-days',
                    'description' => '10 GB, 7 Days',
                    'amount' => 102,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            358 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '1.2 GB+150 minute+120 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '12-gb150-minute120-sms-30-days',
                    'description' => '1.2 GB+150 minute+120 SMS , 30 days',
                    'amount' => 105,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            359 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '15 GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '15-gb-7-days',
                    'description' => '15 GB, 7 Days',
                    'amount' => 135,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            360 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '3 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '3-gb-30-days',
                    'description' => '3 GB, 30 days',
                    'amount' => 145,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            361 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '4 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '4-gb-30-days',
                    'description' => '4 GB, 30 days',
                    'amount' => 184,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            362 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '5 GB+250 minute+300 SMS , 7 days',
                    'type' => 'combo',
                    'slug' => '5-gb250-minute300-sms-7-days',
                    'description' => '5 GB+250 minute+300 SMS , 7 days',
                    'amount' => 189,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            363 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '5 GB+250 minute+300 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '5-gb250-minute300-sms-30-days',
                    'description' => '5 GB+250 minute+300 SMS , 30 days',
                    'amount' => 208,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            364 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '5 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '5-gb-30-days',
                    'description' => '5 GB, 30 days',
                    'amount' => 211,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            365 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '10 GB+100 minute+50 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '10-gb100-minute50-sms-30-days',
                    'description' => '10 GB+100 minute+50 SMS , 30 days',
                    'amount' => 218,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            366 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '2 GB+350 minute+20 SMS , 7 days',
                    'type' => 'combo',
                    'slug' => '2-gb350-minute20-sms-7-days',
                    'description' => '2 GB+350 minute+20 SMS , 7 days',
                    'amount' => 226,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            367 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '2 GB+350 minute+20 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '2-gb350-minute20-sms-30-days',
                    'description' => '2 GB+350 minute+20 SMS , 30 days',
                    'amount' => 234,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            368 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '10 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '10-gb-30-days',
                    'description' => '10 GB, 30 days',
                    'amount' => 251,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            369 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '15 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '15-gb-30-days',
                    'description' => '15 GB, 30 days',
                    'amount' => 288,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            370 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '5 GB+450 minute+50 SMS , 7 days',
                    'type' => 'combo',
                    'slug' => '5-gb450-minute50-sms-7-days',
                    'description' => '5 GB+450 minute+50 SMS , 7 days',
                    'amount' => 298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            371 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '477 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '477-mins-30-days',
                    'description' => '477 Mins , 30 days',
                    'amount' => 301,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            372 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '5 GB+450 minute+50 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '5-gb450-minute50-sms-30-days',
                    'description' => '5 GB+450 minute+50 SMS , 30 days',
                    'amount' => 310,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            373 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '10 GB+350 minute+100 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '10-gb350-minute100-sms-30-days',
                    'description' => '10 GB+350 minute+100 SMS , 30 days',
                    'amount' => 312,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            374 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '25 GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '25-gb-unlimited',
                    'description' => '25 GB, Unlimited',
                    'amount' => 323,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            375 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '30 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '30-gb-30-days',
                    'description' => '30 GB, 30 days',
                    'amount' => 359,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            376 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '12 GB+500 minute+350 SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '12-gb500-minute350-sms-30-days',
                    'description' => '12 GB+500 minute+350 SMS , 30 days',
                    'amount' => 416,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            377 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '45 GB, 30 days',
                    'type' => 'internet',
                    'slug' => '45-gb-30-days',
                    'description' => '45 GB, 30 days',
                    'amount' => 465,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            378 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '35 GB+800 minute+100SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '35-gb800-minute100sms-30-days',
                    'description' => '35 GB+800 minute+100SMS , 30 days',
                    'amount' => 572,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            379 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '50GB+1000 minute+200SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '50gb1000-minute200sms-30-days',
                    'description' => '50GB+1000 minute+200SMS , 30 days',
                    'amount' => 576,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            380 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '40GB+900 minute+100SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '40gb900-minute100sms-30-days',
                    'description' => '40GB+900 minute+100SMS , 30 days',
                    'amount' => 624,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            381 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '50 GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '50-gb-unlimited',
                    'description' => '50 GB, Unlimited',
                    'amount' => 626,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            382 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '50GB+1000 minute+200SMS , 30 days',
                    'type' => 'combo',
                    'slug' => '50gb1000-minute200sms-30-days',
                    'description' => '50GB+1000 minute+200SMS , 30 days',
                    'amount' => 676,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            383 =>
                array (
                    'service_id' => 5,
                    'country_id' => 19,
                    'name' => '75 GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '75-gb-unlimited',
                    'description' => '75 GB, Unlimited',
                    'amount' => 833,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            384 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15 Mins , 24 hrs',
                    'type' => 'voice',
                    'slug' => '15-mins-24-hrs',
                    'description' => '15 Mins , 24 hrs',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            385 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15 Mins , 24 hrs',
                    'type' => 'voice',
                    'slug' => '15-mins-24-hrs',
                    'description' => '15 Mins , 24 hrs',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            386 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '25 Mins , 2 days',
                    'type' => 'voice',
                    'slug' => '25-mins-2-days',
                    'description' => '25 Mins , 2 days',
                    'amount' => 19,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            387 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '25 Mins , 2 days',
                    'type' => 'voice',
                    'slug' => '25-mins-2-days',
                    'description' => '25 Mins , 2 days',
                    'amount' => 19,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            388 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '1gb-24-hours',
                    'description' => '1GB, 24 Hours',
                    'amount' => 23,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            389 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '1gb-24-hours',
                    'description' => '1GB, 24 Hours',
                    'amount' => 23,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            390 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 2 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-2-days',
                    'description' => '1.39tk/min , 2 Days',
                    'amount' => 24,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            391 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 2 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-2-days',
                    'description' => '1.39tk/min , 2 Days',
                    'amount' => 24,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            392 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 3 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-3-days',
                    'description' => '1.39tk/min , 3 Days',
                    'amount' => 26,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            393 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 3 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-3-days',
                    'description' => '1.39tk/min , 3 Days',
                    'amount' => 26,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            394 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '38 Mins, 2 days',
                    'type' => 'voice',
                    'slug' => '38-mins-2-days',
                    'description' => '38 Mins, 2 days',
                    'amount' => 28,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            395 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '38 Mins, 2 days',
                    'type' => 'voice',
                    'slug' => '38-mins-2-days',
                    'description' => '38 Mins, 2 days',
                    'amount' => 28,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            396 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '500MB, 7 Days',
                    'type' => 'internet',
                    'slug' => '500mb-7-days',
                    'description' => '500MB, 7 Days',
                    'amount' => 29,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            397 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '500MB, 7 Days',
                    'type' => 'internet',
                    'slug' => '500mb-7-days',
                    'description' => '500MB, 7 Days',
                    'amount' => 29,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            398 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 2 Days',
                    'type' => 'voice',
                    'slug' => '1ps-2-days',
                    'description' => '1p/s , 2 Days',
                    'amount' => 32,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            399 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 2 Days',
                    'type' => 'voice',
                    'slug' => '1ps-2-days',
                    'description' => '1p/s , 2 Days',
                    'amount' => 32,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 172800,
                            'validity' => '2 Day',
                        ),
                ),
            400 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50 Mins , 3 days',
                    'type' => 'voice',
                    'slug' => '50-mins-3-days',
                    'description' => '50 Mins , 3 days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            401 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50 Mins , 3 days',
                    'type' => 'voice',
                    'slug' => '50-mins-3-days',
                    'description' => '50 Mins , 3 days',
                    'amount' => 34,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '3 Day',
                        ),
                ),
            402 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '3GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '3gb-24-hours',
                    'description' => '3GB, 24 Hours',
                    'amount' => 38,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            403 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '3GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '3gb-24-hours',
                    'description' => '3GB, 24 Hours',
                    'amount' => 38,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            404 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 5 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-5-days',
                    'description' => '1.39tk/min , 5 Days',
                    'amount' => 39,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            405 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 5 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-5-days',
                    'description' => '1.39tk/min , 5 Days',
                    'amount' => 39,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            406 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 7 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-7-days',
                    'description' => '1.39tk/min , 7 Days',
                    'amount' => 42,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            407 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 7 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-7-days',
                    'description' => '1.39tk/min , 7 Days',
                    'amount' => 42,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            408 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '512MB+10min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '512mb10min-7-days',
                    'description' => '512MB+10min , 7 Days',
                    'amount' => 46,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            409 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '512MB+10min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '512mb10min-7-days',
                    'description' => '512MB+10min , 7 Days',
                    'amount' => 46,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            410 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '65 Mins, 4 days',
                    'type' => 'voice',
                    'slug' => '65-mins-4-days',
                    'description' => '65 Mins, 4 days',
                    'amount' => 48,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 345600,
                            'validity' => '4 Day',
                        ),
                ),
            411 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '65 Mins, 4 days',
                    'type' => 'voice',
                    'slug' => '65-mins-4-days',
                    'description' => '65 Mins, 4 days',
                    'amount' => 48,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 345600,
                            'validity' => '4 Day',
                        ),
                ),
            412 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '1gb-72-hours',
                    'description' => '1GB , 72 Hours',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            413 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '1gb-72-hours',
                    'description' => '1GB , 72 Hours',
                    'amount' => 49,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            414 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '6gb-24-hours',
                    'description' => '6GB, 24 Hours',
                    'amount' => 54,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            415 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB, 24 Hours',
                    'type' => 'internet',
                    'slug' => '6gb-24-hours',
                    'description' => '6GB, 24 Hours',
                    'amount' => 54,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 86400,
                            'validity' => '24 Hour',
                        ),
                ),
            416 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '70 mins , 5 Days',
                    'type' => 'voice',
                    'slug' => '70-mins-5-days',
                    'description' => '70 mins , 5 Days',
                    'amount' => 57,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            417 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '70 mins , 5 Days',
                    'type' => 'voice',
                    'slug' => '70-mins-5-days',
                    'description' => '70 mins , 5 Days',
                    'amount' => 57,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            418 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.5GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '1.5GB, 7 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            419 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.5GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '1.5GB, 7 Days',
                    'amount' => 59,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            420 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '3GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '3gb-72-hours',
                    'description' => '3GB , 72 Hours',
                    'amount' => 68,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            421 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '3GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '3gb-72-hours',
                    'description' => '3GB , 72 Hours',
                    'amount' => 68,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            422 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 5 Days',
                    'type' => 'voice',
                    'slug' => '1ps-5-days',
                    'description' => '1p/s , 5 Days',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            423 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 5 Days',
                    'type' => 'voice',
                    'slug' => '1ps-5-days',
                    'description' => '1p/s , 5 Days',
                    'amount' => 69,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 432000,
                            'validity' => '5 Day',
                        ),
                ),
            424 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 15 Days',
                    'type' => 'voice',
                    'slug' => '1ps-15-days',
                    'description' => '1p/s , 15 Days',
                    'amount' => 77,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 1296000,
                            'validity' => '15 Day',
                        ),
                ),
            425 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 15 Days',
                    'type' => 'voice',
                    'slug' => '1ps-15-days',
                    'description' => '1p/s , 15 Days',
                    'amount' => 77,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 1296000,
                            'validity' => '15 Day',
                        ),
                ),
            426 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '90 Mins, 7 days',
                    'type' => 'voice',
                    'slug' => '90-mins-7-days',
                    'description' => '90 Mins, 7 days',
                    'amount' => 78,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            427 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '90 Mins, 7 days',
                    'type' => 'voice',
                    'slug' => '90-mins-7-days',
                    'description' => '90 Mins, 7 days',
                    'amount' => 78,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            428 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.5GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '1.5GB, 7 Days',
                    'amount' => 79,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            429 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.5GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-7-days',
                    'description' => '1.5GB, 7 Days',
                    'amount' => 79,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            430 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '120 Mins , 7 days',
                    'type' => 'voice',
                    'slug' => '120-mins-7-days',
                    'description' => '120 Mins , 7 days',
                    'amount' => 84,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            431 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '120 Mins , 7 days',
                    'type' => 'voice',
                    'slug' => '120-mins-7-days',
                    'description' => '120 Mins , 7 days',
                    'amount' => 84,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            432 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB IMO+Messenger+Whatsapp+Snapchat+Telegram, 30 Days',
                    'type' => 'internet',
                    'slug' => '4gb-imomessengerwhatsappsnapchattelegram-30-days',
                    'description' => '4GB IMO+Messenger+Whatsapp+Snapchat+Telegram, 30 Days',
                    'amount' => 88,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            433 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB IMO+Messenger+Whatsapp+Snapchat+Telegram, 30 Days',
                    'type' => 'internet',
                    'slug' => '4gb-imomessengerwhatsappsnapchattelegram-30-days',
                    'description' => '4GB IMO+Messenger+Whatsapp+Snapchat+Telegram, 30 Days',
                    'amount' => 88,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            434 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 30 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-30-days',
                    'description' => '1.39tk/min , 30 Days',
                    'amount' => 94,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            435 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 30 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-30-days',
                    'description' => '1.39tk/min , 30 Days',
                    'amount' => 94,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            436 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '130 Mins, 7 days',
                    'type' => 'voice',
                    'slug' => '130-mins-7-days',
                    'description' => '130 Mins, 7 days',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            437 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '130 Mins, 7 days',
                    'type' => 'voice',
                    'slug' => '130-mins-7-days',
                    'description' => '130 Mins, 7 days',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            438 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '6gb-72-hours',
                    'description' => '6GB , 72 Hours',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            439 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '6gb-72-hours',
                    'description' => '6GB , 72 Hours',
                    'amount' => 98,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            440 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1GB+30min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '1gb30min-7-days',
                    'description' => '1GB+30min , 7 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            441 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1GB+30min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '1gb30min-7-days',
                    'description' => '1GB+30min , 7 Days',
                    'amount' => 99,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            442 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 30 Days',
                    'type' => 'voice',
                    'slug' => '1ps-30-days',
                    'description' => '1p/s , 30 Days',
                    'amount' => 108,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            443 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 30 Days',
                    'type' => 'voice',
                    'slug' => '1ps-30-days',
                    'description' => '1p/s , 30 Days',
                    'amount' => 108,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            444 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '4gb-7-days',
                    'description' => '4GB, 7 Days',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            445 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '4gb-7-days',
                    'description' => '4GB, 7 Days',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            446 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '180 Mins , 7 days',
                    'type' => 'voice',
                    'slug' => '180-mins-7-days',
                    'description' => '180 Mins , 7 days',
                    'amount' => 118,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            447 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '180 Mins , 7 days',
                    'type' => 'voice',
                    'slug' => '180-mins-7-days',
                    'description' => '180 Mins , 7 days',
                    'amount' => 118,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            448 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '12gb-72-hours',
                    'description' => '12GB , 72 Hours',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            449 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB , 72 Hours',
                    'type' => 'internet',
                    'slug' => '12gb-72-hours',
                    'description' => '12GB , 72 Hours',
                    'amount' => 119,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 259200,
                            'validity' => '72 Hour',
                        ),
                ),
            450 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '6gb-7-days',
                    'description' => '6GB , 7 Days',
                    'amount' => 128,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            451 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '6gb-7-days',
                    'description' => '6GB , 7 Days',
                    'amount' => 128,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            452 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '200 Mins , 10 days',
                    'type' => 'voice',
                    'slug' => '200-mins-10-days',
                    'description' => '200 Mins , 10 days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 864000,
                            'validity' => '10 Day',
                        ),
                ),
            453 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '200 Mins , 10 days',
                    'type' => 'voice',
                    'slug' => '200-mins-10-days',
                    'description' => '200 Mins , 10 days',
                    'amount' => 129,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 864000,
                            'validity' => '10 Day',
                        ),
                ),
            454 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 60 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-60-days',
                    'description' => '1.39tk/min , 60 Days',
                    'amount' => 133,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            455 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1.39tk/min , 60 Days',
                    'type' => 'voice',
                    'slug' => '139tkmin-60-days',
                    'description' => '1.39tk/min , 60 Days',
                    'amount' => 133,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 5184000,
                            'validity' => '60 Day',
                        ),
                ),
            456 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB Youtube+TikTok, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-youtubetiktok-7-days',
                    'description' => '15GB Youtube+TikTok, 7 Days',
                    'amount' => 138,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            457 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB Youtube+TikTok, 7 Days',
                    'type' => 'internet',
                    'slug' => '15gb-youtubetiktok-7-days',
                    'description' => '15GB Youtube+TikTok, 7 Days',
                    'amount' => 138,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            458 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '150 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '150-mins-30-days',
                    'description' => '150 Mins, 30 days',
                    'amount' => 139,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            459 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '150 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '150-mins-30-days',
                    'description' => '150 Mins, 30 days',
                    'amount' => 139,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            460 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '3GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '3gb-30-days',
                    'description' => '3GB , 30 Days',
                    'amount' => 148,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            461 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '3GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '3gb-30-days',
                    'description' => '3GB , 30 Days',
                    'amount' => 148,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            462 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB+100Min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '4gb100min-7-days',
                    'description' => '4GB+100Min , 7 Days',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            463 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB+100Min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '4gb100min-7-days',
                    'description' => '4GB+100Min , 7 Days',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            464 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '10GB(5GB+5GB Hoichoi+Bogo+T-Sports) , 7 Days',
                    'type' => 'internet',
                    'slug' => '10gb5gb5gb-hoichoibogot-sports-7-days',
                    'description' => '10GB(5GB+5GB Hoichoi+Bogo+T-Sports) , 7 Days',
                    'amount' => 158,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            465 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '10GB(5GB+5GB Hoichoi+Bogo+T-Sports) , 7 Days',
                    'type' => 'internet',
                    'slug' => '10gb5gb5gb-hoichoibogot-sports-7-days',
                    'description' => '10GB(5GB+5GB Hoichoi+Bogo+T-Sports) , 7 Days',
                    'amount' => 158,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            466 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '8GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '8gb-7-days',
                    'description' => '8GB, 7 Days',
                    'amount' => 168,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            467 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '10GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '10gb-7-days',
                    'description' => '10GB , 7 Days',
                    'amount' => 168,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            468 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '190 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '190-mins-30-days',
                    'description' => '190 Mins , 30 days',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            469 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '190 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '190-mins-30-days',
                    'description' => '190 Mins , 30 days',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            470 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '220 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '220-mins-30-days',
                    'description' => '220 Mins , 30 days',
                    'amount' => 178,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            471 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '220 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '220-mins-30-days',
                    'description' => '220 Mins , 30 days',
                    'amount' => 178,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            472 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB+130min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '6gb130min-7-days',
                    'description' => '6GB+130min , 7 Days',
                    'amount' => 179,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            473 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '6GB+130min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '6gb130min-7-days',
                    'description' => '6GB+130min , 7 Days',
                    'amount' => 179,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            474 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '5GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '5gb-30-days',
                    'description' => '5GB, 30 Days',
                    'amount' => 197,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            475 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '5GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '5gb-30-days',
                    'description' => '5GB, 30 Days',
                    'amount' => 197,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            476 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '12gb-7-days',
                    'description' => '12GB, 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            477 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB, 7 Days',
                    'type' => 'internet',
                    'slug' => '12gb-7-days',
                    'description' => '12GB, 7 Days',
                    'amount' => 198,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            478 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '8GB+150min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '8gb150min-7-days',
                    'description' => '8GB+150min , 7 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            479 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '8GB+150min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '8gb150min-7-days',
                    'description' => '8GB+150min , 7 Days',
                    'amount' => 199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            480 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '300 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '300-mins-30-days',
                    'description' => '300 Mins , 30 days',
                    'amount' => 207,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            481 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '300 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '300-mins-30-days',
                    'description' => '300 Mins , 30 days',
                    'amount' => 207,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            482 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '250 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '250-mins-30-days',
                    'description' => '250 Mins , 30 days',
                    'amount' => 209,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            483 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '250 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '250-mins-30-days',
                    'description' => '250 Mins , 30 days',
                    'amount' => 209,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            484 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB+150min, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '12gb150min-7-days',
                    'description' => '12GB+150min, 7 Days',
                    'amount' => 218,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            485 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB+150min, 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '12gb150min-7-days',
                    'description' => '12GB+150min, 7 Days',
                    'amount' => 218,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            486 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '20GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '20gb-7-days',
                    'description' => '20GB , 7 Days',
                    'amount' => 219,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            487 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '20GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '20gb-7-days',
                    'description' => '20GB , 7 Days',
                    'amount' => 219,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            488 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '28GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '28gb-7-days',
                    'description' => '28GB , 7 Days',
                    'amount' => 228,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            489 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '28GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '28gb-7-days',
                    'description' => '28GB , 7 Days',
                    'amount' => 228,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            490 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '8GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '8gb-30-days',
                    'description' => '8GB , 30 Days',
                    'amount' => 247,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            491 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '8GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '8gb-30-days',
                    'description' => '8GB , 30 Days',
                    'amount' => 247,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            492 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '40GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '40gb-7-days',
                    'description' => '40GB , 7 Days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            493 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '40GB , 7 Days',
                    'type' => 'internet',
                    'slug' => '40gb-7-days',
                    'description' => '40GB , 7 Days',
                    'amount' => 248,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            494 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB+200min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '15gb200min-7-days',
                    'description' => '15GB+200min , 7 Days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            495 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB+200min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '15gb200min-7-days',
                    'description' => '15GB+200min , 7 Days',
                    'amount' => 249,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            496 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '370 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '370-mins-30-days',
                    'description' => '370 Mins , 30 days',
                    'amount' => 257,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            497 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '370 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '370-mins-30-days',
                    'description' => '370 Mins , 30 days',
                    'amount' => 257,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            498 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB+100Min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '4gb100min-30-days',
                    'description' => '4GB+100Min , 30 Days',
                    'amount' => 259,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            499 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '4GB+100Min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '4gb100min-30-days',
                    'description' => '4GB+100Min , 30 Days',
                    'amount' => 259,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            500 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '25GB Youtube+TikTok , 30 Days',
                    'type' => 'internet',
                    'slug' => '25gb-youtubetiktok-30-days',
                    'description' => '25GB Youtube+TikTok , 30 Days',
                    'amount' => 288,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            501 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '25GB Youtube+TikTok , 30 Days',
                    'type' => 'internet',
                    'slug' => '25gb-youtubetiktok-30-days',
                    'description' => '25GB Youtube+TikTok , 30 Days',
                    'amount' => 288,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            502 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '10GB+100min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '10gb100min-30-days',
                    'description' => '10GB+100min , 30 Days',
                    'amount' => 297,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            503 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '10GB+100min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '10gb100min-30-days',
                    'description' => '10GB+100min , 30 Days',
                    'amount' => 297,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            504 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '20GB+300min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '20gb300min-7-days',
                    'description' => '20GB+300min , 7 Days',
                    'amount' => 298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            505 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '20GB+300min , 7 Days',
                    'type' => 'voice+internet',
                    'slug' => '20gb300min-7-days',
                    'description' => '20GB+300min , 7 Days',
                    'amount' => 298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 604800,
                            'validity' => '7 Day',
                        ),
                ),
            506 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '15gb-30-days',
                    'description' => '15GB, 30 Days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            507 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '15gb-30-days',
                    'description' => '15GB, 30 Days',
                    'amount' => 299,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            508 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '500 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '500-mins-30-days',
                    'description' => '500 Mins, 30 days',
                    'amount' => 319,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            509 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '500 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '500-mins-30-days',
                    'description' => '500 Mins, 30 days',
                    'amount' => 319,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            510 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '14GB (7GB+7GB Hoichoi+Bogo+T-Sports) , 30 Days',
                    'type' => 'internet',
                    'slug' => '14gb-7gb7gb-hoichoibogot-sports-30-days',
                    'description' => '14GB (7GB+7GB Hoichoi+Bogo+T-Sports) , 30 Days',
                    'amount' => 338,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            511 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '14GB (7GB+7GB Hoichoi+Bogo+T-Sports) , 30 Days',
                    'type' => 'internet',
                    'slug' => '14gb-7gb7gb-hoichoibogot-sports-30-days',
                    'description' => '14GB (7GB+7GB Hoichoi+Bogo+T-Sports) , 30 Days',
                    'amount' => 338,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            512 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB+150min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '12gb150min-30-days',
                    'description' => '12GB+150min , 30 Days',
                    'amount' => 348,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            513 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '12GB+150min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '12gb150min-30-days',
                    'description' => '12GB+150min , 30 Days',
                    'amount' => 348,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            514 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '18GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '18gb-30-days',
                    'description' => '18GB , 30 Days',
                    'amount' => 349,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            515 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '18GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '18gb-30-days',
                    'description' => '18GB , 30 Days',
                    'amount' => 349,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            516 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '570 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '570-mins-30-days',
                    'description' => '570 Mins , 30 days',
                    'amount' => 367,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            517 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '570 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '570-mins-30-days',
                    'description' => '570 Mins , 30 days',
                    'amount' => 367,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            518 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB+300min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '15gb300min-30-days',
                    'description' => '15GB+300min , 30 Days',
                    'amount' => 397,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            519 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '15GB+300min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '15gb300min-30-days',
                    'description' => '15GB+300min , 30 Days',
                    'amount' => 397,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            520 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '20GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '20gb-30-days',
                    'description' => '20GB , 30 Days',
                    'amount' => 398,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            521 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '20GB , 30 Days',
                    'type' => 'internet',
                    'slug' => '20gb-30-days',
                    'description' => '20GB , 30 Days',
                    'amount' => 398,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            522 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '650 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '650-mins-30-days',
                    'description' => '650 Mins, 30 days',
                    'amount' => 409,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            523 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '650 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '650-mins-30-days',
                    'description' => '650 Mins, 30 days',
                    'amount' => 409,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            524 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '22GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '22gb-30-days',
                    'description' => '22GB, 30 Days',
                    'amount' => 448,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            525 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '22GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '22gb-30-days',
                    'description' => '22GB, 30 Days',
                    'amount' => 448,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            526 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '28GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '28gb-30-days',
                    'description' => '28GB, 30 Days',
                    'amount' => 497,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            527 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '28GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '28gb-30-days',
                    'description' => '28GB, 30 Days',
                    'amount' => 497,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            528 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '22GB+400min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '22gb400min-30-days',
                    'description' => '22GB+400min , 30 Days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            529 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '22GB+400min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '22gb400min-30-days',
                    'description' => '22GB+400min , 30 Days',
                    'amount' => 499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            530 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '800 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '800-mins-30-days',
                    'description' => '800 Mins , 30 days',
                    'amount' => 507,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            531 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '800 Mins , 30 days',
                    'type' => 'voice',
                    'slug' => '800-mins-30-days',
                    'description' => '800 Mins , 30 days',
                    'amount' => 507,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            532 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '800 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '800-mins-30-days',
                    'description' => '800 Mins, 30 days',
                    'amount' => 509,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            533 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '800 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '800-mins-30-days',
                    'description' => '800 Mins, 30 days',
                    'amount' => 509,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            534 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '35GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '35gb-30-days',
                    'description' => '35GB, 30 Days',
                    'amount' => 548,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            535 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '35GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '35gb-30-days',
                    'description' => '35GB, 30 Days',
                    'amount' => 548,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            536 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '40GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '40gb-30-days',
                    'description' => '40GB, 30 Days',
                    'amount' => 598,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            537 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '40GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '40gb-30-days',
                    'description' => '40GB, 30 Days',
                    'amount' => 598,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            538 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '30GB+500min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '30gb500min-30-days',
                    'description' => '30GB+500min , 30 Days',
                    'amount' => 599,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            539 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '30GB+500min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '30gb500min-30-days',
                    'description' => '30GB+500min , 30 Days',
                    'amount' => 599,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            540 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1000 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '1000-mins-30-days',
                    'description' => '1000 Mins, 30 days',
                    'amount' => 629,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            541 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1000 Mins, 30 days',
                    'type' => 'voice',
                    'slug' => '1000-mins-30-days',
                    'description' => '1000 Mins, 30 days',
                    'amount' => 629,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            542 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '55GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '55gb-30-days',
                    'description' => '55GB, 30 Days',
                    'amount' => 648,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 432000,
                            'validity' => '30 Days',
                        ),
                ),
            543 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '55GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '55gb-30-days',
                    'description' => '55GB, 30 Days',
                    'amount' => 648,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Days',
                        ),
                ),
            544 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '45GB+600min, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '45gb600min-30-days',
                    'description' => '45GB+600min, 30 Days',
                    'amount' => 699,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            545 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '45GB+600min, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '45gb600min-30-days',
                    'description' => '45GB+600min, 30 Days',
                    'amount' => 699,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            546 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '75GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '75gb-30-days',
                    'description' => '75GB, 30 Days',
                    'amount' => 748,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            547 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '75GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '75gb-30-days',
                    'description' => '75GB, 30 Days',
                    'amount' => 748,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            548 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50GB+700min, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '50gb700min-30-days',
                    'description' => '50GB+700min, 30 Days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            549 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50GB+700min, 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '50gb700min-30-days',
                    'description' => '50GB+700min, 30 Days',
                    'amount' => 799,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            550 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '25GB , Unlimited',
                    'type' => 'internet',
                    'slug' => '25gb-unlimited',
                    'description' => '25GB , Unlimited',
                    'amount' => 848,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            551 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '25GB , Unlimited',
                    'type' => 'internet',
                    'slug' => '25gb-unlimited',
                    'description' => '25GB , Unlimited',
                    'amount' => 848,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            552 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 365 Days',
                    'type' => 'voice',
                    'slug' => '1ps-365-days',
                    'description' => '1p/s , 365 Days',
                    'amount' => 869,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            553 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '1p/s , 365 Days',
                    'type' => 'voice',
                    'slug' => '1ps-365-days',
                    'description' => '1p/s , 365 Days',
                    'amount' => 869,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 31536000,
                            'validity' => '365 Day',
                        ),
                ),
            554 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '150GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '150gb-30-days',
                    'description' => '150GB, 30 Days',
                    'amount' => 898,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            555 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '150GB, 30 Days',
                    'type' => 'internet',
                    'slug' => '150gb-30-days',
                    'description' => '150GB, 30 Days',
                    'amount' => 898,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 1,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            556 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50GB+900min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '50gb900min-30-days',
                    'description' => '50GB+900min , 30 Days',
                    'amount' => 899,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            557 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50GB+900min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '50gb900min-30-days',
                    'description' => '50GB+900min , 30 Days',
                    'amount' => 899,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            558 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '60GB+1400min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '60gb1400min-30-days',
                    'description' => '60GB+1400min , 30 Days',
                    'amount' => 999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            559 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '60GB+1400min , 30 Days',
                    'type' => 'voice+internet',
                    'slug' => '60gb1400min-30-days',
                    'description' => '60GB+1400min , 30 Days',
                    'amount' => 999,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 2592000,
                            'validity' => '30 Day',
                        ),
                ),
            560 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '50gb-unlimited',
                    'description' => '50GB, Unlimited',
                    'amount' => 1298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            561 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '50GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '50gb-unlimited',
                    'description' => '50GB, Unlimited',
                    'amount' => 1298,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            562 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '75GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '75gb-unlimited',
                    'description' => '75GB, Unlimited',
                    'amount' => 1598,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
            563 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '75GB, Unlimited',
                    'type' => 'internet',
                    'slug' => '75gb-unlimited',
                    'description' => '75GB, Unlimited',
                    'amount' => 1598,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => 0,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => 999999999,
                            'validity' => 'Unlimited Days',
                        ),
                ),
        );
    }

    public function blockedAmounts() : array
    {
        return array (
            0 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            1 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            2 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            3 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            4 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            5 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            6 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            7 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            8 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            9 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            10 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            11 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            12 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            13 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            14 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            15 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            16 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 21,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            17 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 21,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            18 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 37,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            19 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 37,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            20 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 68,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            21 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 68,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            22 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 78,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            23 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 78,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            24 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 93,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            25 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 93,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            26 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 123,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            27 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 123,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            28 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 124,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            29 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 124,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            30 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 156,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            31 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 156,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            32 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            33 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 169,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            34 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 177,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            35 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 177,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            36 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 189,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            37 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 189,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            38 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 194,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            39 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 194,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            40 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 196,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            41 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 196,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            42 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 197,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            43 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 197,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            44 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 209,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            45 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 209,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            46 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 228,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            47 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 228,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            48 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 233,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            49 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 233,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            50 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 288,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            51 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 288,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            52 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 289,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            53 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 289,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            54 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 294,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            55 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 294,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            56 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 308,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            57 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 308,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            58 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 318,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            59 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 318,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            60 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 339,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            61 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 339,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            62 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 358,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            63 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 358,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            64 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 359,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            65 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 359,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            66 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 389,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            67 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 389,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            68 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 397,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            69 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 397,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            70 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 409,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            71 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 409,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            72 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 439,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            73 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 439,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            74 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 448,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            75 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 448,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            76 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 448,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            77 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 448,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            78 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 488,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            79 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 488,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            80 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 497,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            81 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 497,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            82 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 516,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            83 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 516,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            84 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 548,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            85 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 548,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            86 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 594,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            87 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 594,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            88 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 604,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            89 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 604,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            90 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 639,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            91 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 639,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            92 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 698,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            93 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 698,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            94 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 704,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            95 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 704,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            96 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 796,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            97 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 796,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            98 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 898,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            99 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 898,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            100 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 899,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            101 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 899,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            102 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1096,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            103 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1096,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            104 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1099,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            105 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1099,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            106 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1349,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            107 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1349,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            108 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            109 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1499,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            110 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1749,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            111 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1749,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            112 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 2697,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            113 =>
                array (
                    'service_id' => 1,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 2697,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            114 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            115 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            116 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            117 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            118 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            119 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            120 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            121 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            122 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            123 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 23,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            124 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 36,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            125 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 41,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            126 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 46,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            127 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 73,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            128 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 76,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            129 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 96,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            130 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 178,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            131 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 194,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            132 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 294,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            133 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 348,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            134 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 394,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            135 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 429,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            136 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 698,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            137 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 794,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            138 =>
                array (
                    'service_id' => 2,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 907,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            139 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            140 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            141 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            142 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            143 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            144 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            145 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            146 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            147 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            148 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            149 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            150 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            151 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            152 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            153 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            154 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            155 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            156 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            157 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 37,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            158 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 37,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            159 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 42,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            160 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 42,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            161 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 51,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            162 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 51,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            163 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 67,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            164 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 67,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            165 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 74,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            166 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 74,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            167 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 88,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            168 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 88,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            169 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            170 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 109,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            171 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 112,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            172 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 112,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            173 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 121,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            174 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 121,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            175 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 122,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            176 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 122,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            177 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 127,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            178 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 127,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            179 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 136,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            180 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 136,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            181 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 144,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            182 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 144,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            183 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 146,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            184 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 146,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            185 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            186 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 149,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            187 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 159,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            188 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 159,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            189 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 178,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            190 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 178,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            191 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 206,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            192 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 206,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            193 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 238,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            194 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 238,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            195 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 244,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            196 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 244,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            197 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 307,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            198 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 307,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            199 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 358,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            200 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 358,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            201 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 407,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            202 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 407,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            203 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 489,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            204 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 489,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            205 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 496,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            206 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 496,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            207 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 516,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            208 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 516,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            209 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 589,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            210 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 589,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            211 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 591,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            212 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 591,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            213 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 609,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            214 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 609,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            215 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 649,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            216 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 649,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            217 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 729,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            218 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 729,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            219 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 796,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            220 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 796,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            221 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 848,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            222 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 848,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            223 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 911,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            224 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 911,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            225 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            226 =>
                array (
                    'service_id' => 3,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            227 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            228 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            229 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            230 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            231 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            232 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            233 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            234 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            235 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            236 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            237 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            238 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            239 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            240 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            241 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 41,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            242 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 41,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            243 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 73,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            244 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 73,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            245 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 89,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            246 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 89,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            247 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 96,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            248 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 96,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            249 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            250 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 97,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            251 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 161,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            252 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 161,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            253 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 221,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            254 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 221,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            255 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 238,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            256 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 238,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            257 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 239,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            258 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 239,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            259 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 278,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            260 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 278,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            261 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 289,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            262 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 289,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            263 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 307,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            264 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 307,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            265 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            266 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 399,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            267 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 496,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            268 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 496,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            269 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 498,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            270 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 498,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            271 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 609,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            272 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 609,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            273 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 698,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            274 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 698,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            275 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 798,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            276 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 798,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            277 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            278 =>
                array (
                    'service_id' => 6,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 1199,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            279 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            280 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 10,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            281 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            282 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 11,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            283 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            284 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 12,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            285 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            286 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 13,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            287 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            288 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 14,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            289 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            290 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 15,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            291 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            292 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 16,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            293 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            294 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 17,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            295 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'prepaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
            296 =>
                array (
                    'service_id' => 13,
                    'country_id' => 19,
                    'name' => '',
                    'type' => NULL,
                    'slug' => '',
                    'description' => '',
                    'amount' => 18,
                    'enabled' => false,
                    'service_package_data' =>
                        array (
                            'is_popular' => NULL,
                            'connection_type' => 'postpaid',
                            'validity_seconds' => NULL,
                            'validity' => NULL,
                        ),
                ),
        );
    }

}
