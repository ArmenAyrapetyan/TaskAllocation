<?php

namespace App\Broadcasting;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function broadcastOn()
    {
        return ['notify-channel'];
    }

    public function broadcastAs()
    {
        return 'my-notify';
    }
}
