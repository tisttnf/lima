<?php

namespace App;

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

    public function project()
    {
        return $this->hasMany(Project::class, 'created_by_id', 'id');        
    }

    public function tims1()
    {
        return $this->hasMany(Tim::class, 'asisten_dosen_id', 'id');        
    }

    public function tims2()
    {
        return $this->hasMany(Tim::class, 'created_by_id', 'id');        
    }    

    public function membertims1()
    {
        return $this->hasMany(Membertim::class, 'mahasiswa_id', 'id');        
    }

    public function membertims2()
    {
        return $this->hasMany(Membertim::class, 'created_by_id', 'id');        
    }

    public function timskor()
    {
        return $this->hasMany(Timskor::class, 'penilai_id', 'id');        
    }
}
