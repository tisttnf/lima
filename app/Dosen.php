<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use Notifiable;

    protected $table = 'dosen';

    protected $fillable = [
        'nama', 
        'role', 
        'email', 
        'password',
        'foto', 
        'nohp', 
        'fingerprint_pin', 
        'nidn',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
