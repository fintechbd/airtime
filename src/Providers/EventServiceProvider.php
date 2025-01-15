<?php

namespace Fintech\Airtime\Providers;

use Fintech\Airtime\Events\BangladeshTopUpCancelled;
use Fintech\Airtime\Events\BangladeshTopUpCompleted;
use Fintech\Airtime\Events\BangladeshTopUpRefunded;
use Fintech\Airtime\Events\BangladeshTopUpRejected;
use Fintech\Airtime\Events\BangladeshTopUpRequested;
use Fintech\Airtime\Events\InternationalTopUpCancelled;
use Fintech\Airtime\Events\InternationalTopUpCompleted;
use Fintech\Airtime\Events\InternationalTopUpRefunded;
use Fintech\Airtime\Events\InternationalTopUpRejected;
use Fintech\Airtime\Events\InternationalTopUpRequested;
use Fintech\Airtime\Listeners\ValidateBangladeshTopUpPackage;
use Fintech\Airtime\Listeners\ValidateInternationalTopUpPackage;
use Fintech\Core\Listeners\TriggerNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        BangladeshTopUpCancelled::class => [
            TriggerNotification::class,
        ],
        BangladeshTopUpCompleted::class => [
            TriggerNotification::class,
        ],
        BangladeshTopUpRefunded::class => [
            TriggerNotification::class,
        ],
        BangladeshTopUpRejected::class => [
            TriggerNotification::class,
        ],
        BangladeshTopUpRequested::class => [
            ValidateBangladeshTopUpPackage::class,
            TriggerNotification::class,
        ],
        InternationalTopUpCancelled::class => [
            TriggerNotification::class,
        ],
        InternationalTopUpCompleted::class => [
            TriggerNotification::class,
        ],
        InternationalTopUpRefunded::class => [
            TriggerNotification::class,
        ],
        InternationalTopUpRejected::class => [
            TriggerNotification::class,
        ],
        InternationalTopUpRequested::class => [
            ValidateInternationalTopUpPackage::class,
            TriggerNotification::class,
        ],
    ];
}
