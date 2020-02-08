<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

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
