<?php

namespace App\Modules\Event\Events;

use App\Modules\Event\Services\TweetHistory;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTweet implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tweet;
    public $data;

    /**
     * NewTweet constructor.
     * @param $tweet
     */
    public function __construct(array $tweet)
    {
        $this->tweet = $tweet;

        $this->data = $this->tweet;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['tweetChannel'];
    }
}
