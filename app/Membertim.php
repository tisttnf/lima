<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membertim extends Model
{
    protected $table = 'member_tim';

    protected $fillable = [
        'tim_id',
        'mahasiswa_id',
        'peran_id',
        'tanggung_jawab',
        'final_skor',
        'created_by_id',
    ];

    public function member_tim_skors()
    {
        return $this->hasMany(Membertimskor::class, 'member_tim_id', 'id');
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class);
    }

    public function peran()
    {
        return $this->belongsTo(Peran::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class);
    }
}
