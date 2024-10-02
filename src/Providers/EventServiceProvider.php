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
use Fintech\Core\Listeners\TriggerListener;
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
            TriggerListener::class,
        ],
        BangladeshTopUpCompleted::class => [
            TriggerListener::class,
        ],
        BangladeshTopUpRefunded::class => [
            TriggerListener::class,
        ],
        BangladeshTopUpRejected::class => [
            TriggerListener::class,
        ],
        BangladeshTopUpRequested::class => [
            TriggerListener::class,
            \Fintech\Airtime\Jobs\BangladeshTopUp\ValidateBangladeshTopUpPackage::class

        ],

        InternationalTopUpCancelled::class => [
            TriggerListener::class,
        ],
        InternationalTopUpCompleted::class => [
            TriggerListener::class,
        ],
        InternationalTopUpRefunded::class => [
            TriggerListener::class,
        ],
        InternationalTopUpRejected::class => [
            TriggerListener::class,
        ],
        InternationalTopUpRequested::class => [
            TriggerListener::class,
        ],
    ];
}
