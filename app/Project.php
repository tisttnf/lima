<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_akhir',
        'jumlah_sprint',
        'budget',
        'status',
        'persen',
        'semester_id',
        'tim_id',
        'final_skor',
        'created_by_id',
    ];

    public function mvpprojects()
    {
        return $this->hasMany(Mvpproject::class, 'project_id', 'id');        
    }

    public function sprintprojects()
    {
        return $this->hasMany(Sprintproject::class, 'project_id', 'id');        
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class);
    }
}
