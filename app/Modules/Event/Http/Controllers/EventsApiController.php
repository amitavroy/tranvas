<?php

namespace App\Modules\Event\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Event\Participant;
use App\Modules\Event\Repositories\EventsRepository;
use Illuminate\Http\Request;

class EventsApiController extends Controller
{
    protected $event;

    /**
     * EventsApiController constructor.
     * @param EventsRepository $eventsRepository
     */
    public function __construct(EventsRepository $eventsRepository)
    {
        $this->event = $eventsRepository;
    }

    public function handleRegistration(Request $request)
    {
        $user = $request->user();
        $event = $this->event->getById($request->input('eventId'));
        $participant = Participant::where('user_id', $user->id)->where('event_id', $event->id)->first();

        if (!$participant) {
            $this->event->registerForEvent($event);
            return response(['message' => 'Registered'], 201);
        }

        $this->event->deRegisterFromEvent($event);
        return response(['message' => 'De-registered'], 200);
    }
}
