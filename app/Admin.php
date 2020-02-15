<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'nama', 
        'role', 
        'email', 
        'password',
        'foto', 
        'nohp', 
        'fingerprint_pin', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
