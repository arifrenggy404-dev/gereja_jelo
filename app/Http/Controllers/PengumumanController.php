<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        $jumlahPengumuman = Pengumuman::count();
        $jadwals = Jadwal::where('tanggal', '>=', today()->format('Y-m-d'))
                         ->orderBy('tanggal')
                         ->get();

        return view('pengumuman.index', compact('pengumuman', 'jadwals', 'jumlahPengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date', // 'tanggal' ini sekarang berisi format Y-m-d\TH:i
        ]);

        // 2. Simpan ke database
        // Karena input 'tanggal' dari datetime-local sudah dalam format yang benar untuk MySQL (setelah di-parse),
        // kita bisa langsung menyimpannya.
        Pengumuman::create([
            'judul'   => $validated['judul'],
            'isi'     => $validated['isi'],
            'tanggal' => $validated['tanggal'], // MySQL akan mengonversi '2026-06-11T11:30' menjadi '2026-06-11 11:30:00'
        ]);

        return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        
        // Memperbarui data
        $pengumuman->update([
            'judul'   => $validated['judul'],
            'isi'     => $validated['isi'],
            'tanggal' => $validated['tanggal'],
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}