<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';

    protected $fillable = [
        'nama'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'semester_id', 'id');        
    }
}
