<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membertimskor extends Model
{
    protected $table = 'member_tim_skor';

    protected $fillable = [
        'member_tim_id',
        'penilai_id',
        'tanggal',
        'skor',
    ];
}
