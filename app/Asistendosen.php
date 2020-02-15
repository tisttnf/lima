<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Asistendosen extends Authenticatable
{
    use Notifiable;

    protected $table = 'asisten_dosen';

    protected $fillable = [
        'nama', 
        'role', 
        'email', 
        'password',
        'foto', 
        'nohp', 
        'fingerprint_pin', 
        'nim',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
