<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timskor extends Model
{
    protected $table = 'tim_skor';

    protected $fillable = [
        'tim_id',
        'penilai_id',
        'tanggal',
        'skor',
    ];

    public function tim()
    {
        return $this->belongsTo(Tim::class);
    }

    public function penilai()
    {
        return $this->belongsTo(User::class);
    }
}
