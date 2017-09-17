<?php

namespace App\Modules\Event\Repositories;

use App\Modules\Event\Event;
use App\Modules\Event\Events\EventRegistered;
use App\Modules\Event\Participant;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $select = [
            'e.id', 'e.title', 'e.description', 'e.address', 'e.start_date', 'e.end_date', 'e.slug', 'e.user_id',
            'p.user_id as user',
        ];
        return $this->model->select($select)
            ->from('events as e')
            ->leftJoin('participants as p', function ($query) {
                $query->on('p.event_id', '=', 'e.id');
            })
            ->where('e.end_date', '>=', Carbon::today()->format('Y-m-d'))
            ->orderBy('e.start_date', 'asc')
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

    public function registerForEvent(Event $event)
    {
        $participant = Participant::create([
            'event_id' => $event->id,
            'user_id' => Auth::user()->id,
        ]);

        event(new EventRegistered($participant));

        return true;
    }

    public function deRegisterFromEvent(Event $event)
    {
        Participant::where('event_id', $event->id)
            ->where('user_id', Auth::user()->id)
            ->delete();

        return true;
    }

    public function eventsNearMe()
    {
        if (env('APP_ENV') == 'testing') {
            return null;
        }

        $lat = Auth::user()->lat;
        $lng = Auth::user()->long;
        $radius = 10;

        $string = "SELECT id, address, title, start_date, end_date, slug, ( 6371 * acos( cos( radians(?) ) * 
        cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) 
        AS distance FROM events HAVING distance < ? ORDER BY distance LIMIT 0 , 20;";
        $args = [$lat, $lng, $lat, $radius];

        $data = DB::select($string, $args);

        return ($data) ? $data : null;
    }
}
