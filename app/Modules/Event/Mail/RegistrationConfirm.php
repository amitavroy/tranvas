<?php

namespace App\Modules\Event\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirm extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;


    /**
     * RegistrationConfirm constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.reg-confirm')->with('user', $this->user);
    }
}
