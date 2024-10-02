<?php

namespace Fintech\Airtime\Events;

use Fintech\Airtime\Facades\Airtime;
use Fintech\Business\Facades\Business;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BangladeshTopUpRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bangladeshTopUp;

    /**
     * Create a new event instance.
     */
    public function __construct($bangladeshTopUp)
    {
        $timeline = $bangladeshTopUp->timeline;

        $service = Business::service()->find($bangladeshTopUp->service_id);

        $timeline[] = [
            'message' => ucwords(strtolower($service->service_name)) . ' bangladesh top up requested',
            'flag' => 'info',
            'timestamp' => now(),
        ];


        $this->bangladeshTopUp = Airtime::bangladeshTopUp()->update($bangladeshTopUp->getKey(), ['timeline' => $timeline]);
    }
}
