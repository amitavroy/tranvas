<?php

namespace App\Modules\Event\Listeners;

use App\Modules\Event\Events\EventDeRegistered;
use App\Modules\Event\Events\EventRegistered;

class EventsEventListner
{
    public function userRegistered(EventRegistered $event)
    {
        $event->handleEventRegistration();
    }

    public function userDeRegistered(EventDeRegistered $event)
    {
        $event->handleEventDeRegistration();
    }

    public function subscribe($events)
    {
        $class = "App\Modules\Event\Listeners\EventsEventListner";
        
        $events->listen(EventRegistered::class, "{$class}@userRegistered");
        $events->listen(EventDeRegistered::class, "{$class}@userDeRegistered");
    }
}
