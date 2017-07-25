<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mailer\UserMailer;

class UserRegisterSendEmail
{

    protected  $mailer;

    public function __construct(UserMailer $mailer)
    {
        $this->mailer=$mailer;
    }


    public function handle(UserRegistered $event)
    {
         $this->mailer->welcome($event->user);
    }
}
