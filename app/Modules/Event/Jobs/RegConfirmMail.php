<?php

namespace App\Modules\Event\Jobs;

use App\Modules\Event\Event;
use App\Modules\Event\Mail\RegistrationConfirm;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RegConfirmMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Event
     */
    private $event;


    /**
     * RegConfirmMail constructor.
     * @param User $user
     * @param Event $event
     */
    public function __construct(User $user, Event $event)
    {
        $this->user = $user;
        $this->event = $event;
    }
    
    public function handle()
    {
        Mail::to($this->user)
            ->send(new RegistrationConfirm($this->user));
    }
}
