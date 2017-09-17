<?php

namespace App\Modules\Event\Repositories;

use App\Modules\Event\Event;
use App\Repositories\AbstractInterface;

interface EventsRepository extends AbstractInterface
{
    public function getUpcomingEvents();
    public function getPastEvents();
    public function registerForEvent(Event $event);
    public function deRegisterFromEvent(Event $event);
    public function eventsNearMe();
}
