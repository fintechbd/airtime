<?php

namespace Fintech\Airtime\Events;

use Illuminate\Broadcasting\Channel;
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
        $this->bangladeshTopUp = $bangladeshTopUp;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
