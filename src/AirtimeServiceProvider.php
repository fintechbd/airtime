<?php

namespace Fintech\Airtime;

use Fintech\Airtime\Commands\AirtimeCommand;
use Fintech\Airtime\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class AirtimeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/airtime.php', 'fintech.airtime'
        );

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/airtime.php' => config_path('fintech/airtime.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'airtime');

        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/airtime'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'airtime');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/airtime'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                AirtimeCommand::class,
            ]);
        }
    }
}
