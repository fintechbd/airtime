<?php

namespace Fintech\Airtime;

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

        ],
        BangladeshTopUpCompleted::class => [

        ],
        BangladeshTopUpRefunded::class => [

        ],
        BangladeshTopUpRejected::class => [

        ],
        BangladeshTopUpRequested::class => [

        ],

        InternationalTopUpCancelled::class => [

        ],
        InternationalTopUpCompleted::class => [

        ],
        InternationalTopUpRefunded::class => [

        ],
        InternationalTopUpRejected::class => [

        ],
        InternationalTopUpRequested::class => [

        ],
    ];
}
