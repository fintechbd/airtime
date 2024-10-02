<?php

namespace Fintech\Airtime\Listeners;

use Fintech\Airtime\Events\BangladeshTopUpRequested;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Airtime\Jobs\BangladeshTopUp\AssignVendorJob;
use Fintech\Core\Enums\Enabled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ValidateInternationalTopUpPackage implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The number of times the queued listener may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * Handle the event.
     */
    public function handle(BangladeshTopUpRequested $event)
    {
        $bangladeshTopUp = Airtime::assignVendor()->requestQuote($event->bangladeshTopUp);

        logger('Order', ['statue' => $bangladeshTopUp->order_data['assign_order'] == Enabled::Yes->value, 'entry' => $bangladeshTopUp]);

        AssignVendorJob::dispatchIf($bangladeshTopUp->order_data['assign_order'] == Enabled::Yes->value, $bangladeshTopUp->getKey());
    }

    /**
     * Handle a failure.
     */
    public function failed(BangladeshTopUpRequested $event, \Throwable $exception): void
    {
        Airtime::bangladeshTopUp()->update($event->bangladeshTopUp->getKey(), [
            'status' => \Fintech\Core\Enums\Transaction\OrderStatus::AdminVerification->value,
            'notes' => $exception->getMessage(),
        ]);
    }
}
