<?php

namespace Fintech\Airtime\Jobs\BangladeshTopUp;

use Fintech\Airtime\Events\BangladeshTopUpRequested;
use Fintech\Core\Enums\Transaction\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AssignVendorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \Fintech\Core\Abstracts\BaseModel|null
     */
    private $bangladeshTopUp;

    /**
     * Create a new job instance.
     */
    public function __construct($order_id)
    {
        $this->bangladeshTopUp = airtime()->bangladeshTopUp()->find($order_id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->bangladeshTopUp = airtime()->assignVendor()->processOrder($this->bangladeshTopUp, $this->bangladeshTopUp->vendor);

        StatusUpdateJob::dispatchIf(
            $this->bangladeshTopUp->status->value == OrderStatus::Accepted->value,
            $this->bangladeshTopUp->getKey())
            ->delay(now()->addSeconds(5));
    }

    /**
     * Handle a failure.
     */
    public function failed(BangladeshTopUpRequested $event, \Throwable $exception): void
    {
        airtime()->bangladeshTopUp()->update($event->bangladeshTopUp->getKey(), [
            'status' => \Fintech\Core\Enums\Transaction\OrderStatus::AdminVerification->value,
            'notes' => $exception->getMessage(),
        ]);
    }
}
