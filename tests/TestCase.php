<?php

namespace Fintech\Airtime\Tests;

use Fintech\Airtime\AirtimeServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use DatabaseMigrations;

    public function getEnvironmentSetUp($app): void
    {
        config()->set('app.env', 'testing');
        config()->set('database.default', 'testing');

        $migrations = [
        ];
        foreach ($migrations as $migration) {
            $migration->up();
        }
    }

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            AirtimeServiceProvider::class,
        ];
    }
}
