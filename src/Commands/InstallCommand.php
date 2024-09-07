<?php

namespace Fintech\Airtime\Commands;

use Fintech\Business\Facades\Business;
use Fintech\Core\Traits\HasCoreSettingTrait;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    use HasCoreSettingTrait;

    public $signature = 'airtime:install';

    public $description = 'Configure the system for the `fintech/airtime` module';

    private string $module = 'Airtime';

    private string $image_svg = __DIR__.'/../../resources/img/service_type/logo_svg/';

    private string $image_png = __DIR__.'/../../resources/img/service_type/logo_png/';

    public function handle(): int
    {
        $this->addDefaultServiceTypes();

        $this->components->twoColumnDetail("[<fg=yellow;options=bold>{$this->module}</>] Installation", '<fg=green;options=bold>COMPLETED</>');

        return self::SUCCESS;
    }

    private function addDefaultServiceTypes(): void
    {
        $this->components->task("[<fg=yellow;options=bold>{$this->module}</>] Creating system default service types", function () {

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
}
