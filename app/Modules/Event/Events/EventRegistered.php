<?php

namespace App\Modules\Event\Events;

use App\Modules\Event\Event;
use App\Modules\Event\Mail\RegistrationConfirm;
use App\Modules\Event\Participant;
use App\User;
use Illuminate\Support\Facades\Mail;

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

        $this->sendConfirmationToUser($user);
    }

    private function sendConfirmationToUser(User $user)
    {
        Mail::to($user)
            ->subject('Event registration confirmation')
            ->send(new RegistrationConfirm($user));
    }
}