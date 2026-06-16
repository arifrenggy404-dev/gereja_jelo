<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    // Mengunci nama tabel
    protected $table = 'pengumuman';

    // Menentukan kolom yang boleh diisi
    protected $fillable = [
    'judul', 
    'isi', 
    'tanggal', // Kolom ini akan menyimpan format YYYY-MM-DD HH:MM:SS
];

protected $casts = [
    'tanggal' => 'datetime', // Gunakan datetime agar bisa diproses Carbon
];
}