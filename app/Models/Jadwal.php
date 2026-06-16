<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';

    protected $fillable = [
        'kegiatan',
        'tanggal',
        'jam',
        'tempat',
        'kategori',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}