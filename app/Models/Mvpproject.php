<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class Mvpproject extends Model
{
    protected $table = 'mvp_project';

    protected $fillable = [
        'project_id',
        'sprint',
        'tanggal_rilis',
        'deskripsi',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
