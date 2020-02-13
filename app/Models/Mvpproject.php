<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mvpproject extends Model
{
    protected $table = 'mvp_project';

    protected $fillable = [
        'project_id',
        'tanggal_rilis',
        'deskripsi',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
