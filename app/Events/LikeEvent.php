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

class LikeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that has been liked.
     *
     * Not sent to subscriber (private).
     */
    private $likedUserID;

    /**
     * True if the star has got turned on.
     *
     * @var boolean
     */
    public $isLikeOn;

    // ID of the user that sends the like.
    public $likingUserID;

    // Name of the user that sends the like.
    public $likingUserName;

    // Image of the user that sends the like.
    public $likingUserImage;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($likedPersonID, $isLikeOn)
    {
        $this->likedUserID = $likedPersonID;
        $this->isLikeOn = $isLikeOn;
        $this->likingUserID = Auth::user()->id;
        $this->likingUserName = Auth::user()->name;
        $this->likingUserImage = Auth::user()->image;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('LikeChannel-' . $this->likedUserID);
    }

    public function broadcastAs()
    {
        return 'LikeEvent';
    }
}
