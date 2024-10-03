<?php

namespace Fintech\Airtime\Jobs\BangladeshTopUp;

use Fintech\Airtime\Events\BangladeshTopUpRequested;
use Fintech\Airtime\Facades\Airtime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StatusUpdateJob implements ShouldQueue
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
        $this->bangladeshTopUp = Airtime::bangladeshTopUp()->find($order_id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->bangladeshTopUp = Airtime::assignVendor()->statusUpdate($this->bangladeshTopUp);
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
