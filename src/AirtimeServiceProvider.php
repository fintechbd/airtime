<?php

namespace Fintech\Airtime;

use Fintech\Airtime\Commands\InstallCommand;
use Fintech\Airtime\Commands\SSLWirelessSetupCommand;
use Fintech\Airtime\Commands\SyncSslWirelessTopUpPackageCommand;
use Fintech\Airtime\Providers\EventServiceProvider;
use Fintech\Airtime\Providers\RepositoryServiceProvider;
use Fintech\Core\Traits\RegisterPackageTrait;
use Illuminate\Support\ServiceProvider;

class AirtimeServiceProvider extends ServiceProvider
{
    use RegisterPackageTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->packageCode = 'airtime';

        $this->mergeConfigFrom(
            __DIR__ . '/../config/airtime.php', 'fintech.airtime'
        );

        $this->app->register(EventServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->injectOnConfig();

        $this->publishes([
            __DIR__ . '/../config/airtime.php' => config_path('fintech/airtime.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'airtime');

        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/airtime'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'airtime');

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/airtime'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                SSLWirelessSetupCommand::class,
                SyncSslWirelessTopUpPackageCommand::class,
            ]);
        }
    }
}
