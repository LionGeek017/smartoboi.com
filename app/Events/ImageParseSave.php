<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImageParseSave
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $photosJsonString = "";
    public $categoryId = null;
    public $imageIds = [];
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($json, $id, $imageIds)
    {
        $this->photosJsonString = $json;
        $this->categoryId = $id;
        $this->imageIds = $imageIds;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
