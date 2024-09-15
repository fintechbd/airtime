<?php

namespace Fintech\Airtime\Commands;

use Fintech\Business\Facades\Business;
use Fintech\Core\Traits\HasCoreSettingTrait;
use Illuminate\Console\Command;
use Throwable;

class InstallCommand extends Command
{
    use HasCoreSettingTrait;

    public $signature = 'airtime:install';

    public $description = 'Configure the system for the `fintech/airtime` module';

    private string $module = 'Airtime';

    private string $image_svg = __DIR__ . '/../../resources/img/service_type/logo_svg/';

    private string $image_png = __DIR__ . '/../../resources/img/service_type/logo_png/';

    /**
     * @throws Throwable
     */
    public function handle(): int
    {
        $this->task("Module Installation", function () {

            $this->addDefaultServiceTypes();

            $this->addServiceSettings();

        }, "COMPETED");

        return self::SUCCESS;
    }

    /**
     * @throws Throwable
     */
    private function addDefaultServiceTypes(): void
    {
        $this->task("<fg=bright-white;bg=bright-blue;options=bold> {$this->module} </> Creating system default service types", function () {

            $entry = [
                'service_type_name' => 'Airtime',
                'service_type_slug' => 'airtime',
                'logo_svg' => "{$this->image_svg}air_time.svg",
                'logo_png' => "{$this->image_png}air_time.png",
                'service_type_is_parent' => 'yes',
                'service_type_is_description' => 'no',
                'enabled' => true,
            ];

            Business::serviceTypeManager($entry)->execute();
        });
    }

    private function addServiceSettings(): void
    {
        $this->task("Populating service setting data", function () {

            $entries = [
                [
                    'service_setting_type' => 'service',
                    'service_setting_name' => 'Operator Number Prefix',
                    'service_setting_field_name' => 'operator_prefix',
                    'service_setting_type_field' => 'text',
                    'service_setting_feature' => 'Operator Number Prefix',
                    'service_setting_rule' => 'string|nullable|size:2',
                    'service_setting_value' => '',
                    'enabled' => true,
                ],
                [
                    'service_setting_type' => 'service',
                    'service_setting_name' => 'Operator Amount Range',
                    'service_setting_field_name' => 'amount_range',
                    'service_setting_type_field' => 'text',
                    'service_setting_feature' => 'Operator Amount Range',
                    'service_setting_rule' => 'string|max:255',
                    'service_setting_value' => '20,100,200,400',
                    'enabled' => true,
                ],
            ];

            foreach ($entries as $entry) {
                if (Business::serviceSetting()->list(['service_setting_field_name' => $entry['service_setting_field_name']])->isEmpty()) {
                    Business::serviceSetting()->create($entry);
                }
            }
        });

    }
}
