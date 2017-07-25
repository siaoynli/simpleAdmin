<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//软删除
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use Notifiable,SoftDeletes;

   protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password'
    ];

    //Illuminate\Database\Eloquent\Concerns\HasEvents
    protected  $events=[

    ];
}
