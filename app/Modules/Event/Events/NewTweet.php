<?php

namespace App\Modules\Event\Events;

class NewTweet
{
    public $tweet;

    /**
     * NewTweet constructor.
     * @param $tweet
     */
    public function __construct(array $tweet)
    {
        $this->tweet = $tweet;
    }
}
