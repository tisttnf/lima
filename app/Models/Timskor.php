<?php

namespace App\Models;

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
}
