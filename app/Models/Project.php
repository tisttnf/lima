<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\Tim;
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
        'created_by',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class);
    }
}
