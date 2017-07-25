<?php

namespace App\Mailer;


class UserMailer  extends  Mailer
{
    public  function welcome($user){
        $subject="welcome to laravel";
        $view="emails.welcome";
        $data=['name'=>$user->name];
        $this->sendTo($user,$subject,$view,$data);
    }
}
