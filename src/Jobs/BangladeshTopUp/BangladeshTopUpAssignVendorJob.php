<?php

namespace Fintech\Airtime\Jobs\BangladeshTopUp;

use Fintech\Airtime\Events\BangladeshTopUpRequested;
use Fintech\Airtime\Facades\Airtime;
use Fintech\Core\Enums\Enabled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BangladeshTopUpAssignVendorJob implements ShouldQueue
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
        logger("BangladeshTopUpAssignVendorJob", $event->bangladeshTopUp->toArray());

        $bangladeshTopUp = Airtime::bangladeshTopUp()->find($event->bangladeshTopUp->getKey());

        if ($bangladeshTopUp->order_data['assign_order'] == Enabled::Yes->value) {
            Airtime::assignVendor()->processOrder($bangladeshTopUp, $bangladeshTopUp->vendor);
        }
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
