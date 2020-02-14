<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tim';

    protected $fillable = [
        'nama',
        'semester_id',
        'prodi_id',
        'final_skor',
        'asisten_dosen_id',
        'created_by_id',
    ];
  
    public function projects()
    {
        return $this->hasMany(Project::class, 'tim_id', 'id');        
    }

    public function tim_skors()
    {
        return $this->hasMany(Timskor::class, 'tim_id', 'id');        
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function asisten_dosen()
    {
        return $this->belongsTo(User::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class);
    }
}
