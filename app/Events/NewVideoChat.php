<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\VideoChat;

class NewVideoChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $videoChat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( VideoChat $videoChat)
    {
       return $this->videoChat = $videoChat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('video.chat.' . $this->videoChat->video_room_id);
    }
}
