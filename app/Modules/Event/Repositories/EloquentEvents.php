<?php

namespace App\Modules\Event\Repositories;

use App\Modules\Event\Event;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;

class EloquentEvents extends AbstractRepository implements EventsRepository
{
    protected $model;

    /**
     * EloquentEvents constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function getUpcomingEvents()
    {
        return $this->model
            ->where('end_date', '>', Carbon::today()->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get();
    }

    public function getPastEvents()
    {
        return $this->model
            ->where('end_date', '<', Carbon::today()->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();
    }
}
