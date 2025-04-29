<?php

namespace App\Events;

use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    public $user;
    public $message;
    public $coursId;

    public function __construct($user, $message, $coursId)
    {
        $this->user = $user;
        $this->message = $message;
        $this->coursId = $coursId;
    }

    public function broadcastOn()
    {
        return new PresenceChannel('cours.' . $this->coursId);
    }

    public function broadcastAs()
    {
        return 'message.envoye';
    }
}
