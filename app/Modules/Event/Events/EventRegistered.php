<?php

namespace App\Modules\Event\Events;

use App\Modules\Event\Event;
use App\Modules\Event\Jobs\RegConfirmMail;
use App\Modules\Event\Participant;
use App\User;

class EventRegistered
{
    /**
     * @var Participant
     */
    private $participant;

    /**
     * EventRegistered constructor.
     * @param Participant $participant
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function handleEventRegistration()
    {
        $user = User::find($this->participant->user_id);
        $event = Event::find($this->participant->event_id);

        $this->sendConfirmationToUser($user, $event);
    }

    private function sendConfirmationToUser($user, $event)
    {
        dispatch(new RegConfirmMail($user, $event));
    }
}
