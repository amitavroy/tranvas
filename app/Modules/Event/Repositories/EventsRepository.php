<?php

namespace App\Modules\Event\Repositories;

use App\Repositories\AbstractInterface;

interface EventsRepository extends AbstractInterface
{
    public function getUpcomingEvents();
    public function getPastEvents();
}
