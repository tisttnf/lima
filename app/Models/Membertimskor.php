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

    public function member_tim()
    {
        return $this->belongsTo(Membertim::class);
    }

    public function penilai()
    {
        return $this->belongsTo(User::class);
    }
}
