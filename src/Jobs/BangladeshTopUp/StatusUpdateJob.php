<?php

namespace Fintech\Airtime\Jobs\BangladeshTopUp;

use DateTime;
use Fintech\Airtime\Facades\Airtime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
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
    public function failed(\Throwable $exception): void
    {
        Airtime::bangladeshTopUp()->update($this->bangladeshTopUp->getKey(), [
            'status' => \Fintech\Core\Enums\Transaction\OrderStatus::AdminVerification->value,
            'notes' => $exception->getMessage(),
        ]);
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array<int, object>
     */
    public function middleware(): array
    {
        return [(new ThrottlesExceptions(2, 1))->by('bangladesh-top-up')];
    }

    /**
     * Determine the time at which this job should time out.
     */
    public function retryUntil(): DateTime
    {
        return now()->addMinutes(5);
    }
}
