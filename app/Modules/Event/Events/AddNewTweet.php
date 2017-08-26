<?php

namespace App\Modules\Event\Events;

class AddNewTweet
{
    /**
     * @var array
     */
    public $tweet;

    /**
     * AddNewTweet constructor.
     */
    public function __construct(array $tweet)
    {
        $this->tweet = $tweet;
    }
}