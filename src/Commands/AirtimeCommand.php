<?php

namespace Fintech\Airtime\Commands;

use Illuminate\Console\Command;

class AirtimeCommand extends Command
{
    public $signature = 'airtime';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
