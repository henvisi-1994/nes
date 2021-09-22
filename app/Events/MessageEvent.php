<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Message;

/*
Example of sent notification:
{
  "message": {
    "id": 6,
    "created_at": "2021-08-18T09:11:51.000000Z",
    "user_id_to": 6,
    "message": "mensaje numero 1",
    "user_id_from": 19,
    "isread": 0
  },
  "messagingUserID": 19,
  "messagingUserName": "Juan",
  "messagingUserImage": "Juan_1.jpg"
}
*/

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Message details
     *
     * @var Message
     */
    public $message;

    // current user ID
    public $messagingUserID;

    // current user name
    public $messagingUserName;

    // current user image
    public $messagingUserImage;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->messagingUserID    = Auth::user()->id;
        $this->messagingUserName  = Auth::user()->name;
        $this->messagingUserImage = Auth::user()->image;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('MessageChannel-' . $this->message->user_id_to);
    }

    public function broadcastAs()
    {
        return 'MessageEvent';
    }
}
