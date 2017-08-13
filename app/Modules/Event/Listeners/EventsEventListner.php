<?php

namespace App\Modules\Event\Listeners;

use App\Modules\Event\Events\EventRegistered;

class EventsEventListner
{
    public function userRegistered(EventRegistered $event)
    {
    }

    public function subscribe($events)
    {
        $class = "App\Modules\Event\Listeners\EventsEventListner";
        
        $events->listen(EventRegistered::class, "{$class}@userRegistered");
    }
}
