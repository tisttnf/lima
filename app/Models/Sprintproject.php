<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprintproject extends Model
{
    protected $table = 'sprint_project';

    protected $fillable = [
        'project_id',
        'sprint',
        'tanggal_rilis',
        'deskripsi',
        'created_by',
    ];
}
