<?php

namespace Fintech\Airtime\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
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

        $service = business()->service()->find($bangladeshTopUp->service_id);

        $timeline[] = [
            'message' => ucwords(strtolower($service->service_name)).' bangladesh top up requested',
            'flag' => 'info',
            'timestamp' => now(),
        ];

        $this->bangladeshTopUp = airtime()->bangladeshTopUp()->update($bangladeshTopUp->getKey(), ['timeline' => $timeline]);
    }
}
