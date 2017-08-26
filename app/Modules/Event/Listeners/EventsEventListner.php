<?php

namespace App\Modules\Event\Listeners;

use App\Modules\Event\Events\AddNewTweet;
use App\Modules\Event\Events\EventRegistered;
use App\Modules\Event\Events\NewTweet;
use App\Modules\Event\Services\TweetHistory;

class EventsEventListner
{
    public function userRegistered(EventRegistered $event)
    {
        $event->handleEventRegistration();
    }

    public function handleNewTweet(AddNewTweet $tweet)
    {
        \Log::info(123);

        $TweetHistory = new TweetHistory;

        $TweetHistory->addTweet($tweet->tweet);
    }

    public function subscribe($events)
    {
        $class = "App\Modules\Event\Listeners\EventsEventListner";
        
        $events->listen(EventRegistered::class, "{$class}@userRegistered");
        $events->listen(AddNewTweet::class, "{$class}@handleNewTweet");
    }
}
