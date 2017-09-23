<?php

namespace App\Modules\Event\Jobs;

use App\Modules\Event\Event;
use App\Modules\Event\Mail\DeRegistrationConfirm;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class DeRegConfirmMail implements ShouldQueue
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
     * Create a new job instance.
     *
     * @param User $user
     * @param Event $event
     */
    public function __construct(User $user, Event $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)
            ->send(new DeRegistrationConfirm($this->user));
    }
}
