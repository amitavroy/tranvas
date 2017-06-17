<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Modules\Event\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('end_date', '>', Carbon::today()->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get();

        $pastEvents = Event::where('end_date', '<', Carbon::today()->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('event/event-list')
            ->with('upcomingEvents', $upcomingEvents)
            ->with('pastEvents', $pastEvents);
    }
}
