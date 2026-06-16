<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Pelayan;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengumpulkan semua data dalam satu array agar mudah dikelola di View
        $data = [
            'jumlahJemaat'     => Jemaat::count(),
            'jumlahPelayan'    => Pelayan::count(),
            'jumlahJadwal'     => Jadwal::count(),
            'jumlahPengumuman' => Pengumuman::count(),
            
            // Query untuk data tampil di dashboard
            'jadwal' => Jadwal::where('tanggal', '>=', now()->toDateString())
                              ->orderBy('tanggal', 'asc')
                              ->limit(5)
                              ->get(),

            'pengumuman' => Pengumuman::latest()
                                      ->limit(5)
                                      ->get()
        ];

        // Karena $data sudah berupa array asosiatif, 
        // kita bisa langsung mengirimnya ke view dengan 'with' 
        // atau mengekstraknya di view nanti. 
        // Cara termudah adalah:
        return view('dashboard', $data);
    }
}