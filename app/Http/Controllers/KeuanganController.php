<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Menampilkan daftar keuangan dengan pagination.
     */
    public function index()
    {
        // Menggunakan paginate(10) karena di Blade Anda memanggil $keuangans->links()
        $keuangans = Keuangan::latest('tanggal')->paginate(10);
        return view('keuangan.index', compact('keuangans'));
    }

    /**
     * Menyimpan data keuangan baru.
     */
    public function store(Request $request)
    {
        // Perbaikan: 'in' rule sekarang menggunakan huruf kapital (Pemasukan, Pengeluaran)
        // agar sesuai dengan <option value="..."> di file Blade Anda.
        $validated = $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah'     => 'required|numeric',
            'jenis'      => 'required|in:Pemasukan,Pengeluaran', 
            'tanggal'    => 'required|date',
            'kategori'   => 'required|string|max:100', // Diwajibkan sesuai form input
        ]);

        // Pastikan model Keuangan memiliki protected $fillable = [...]
        Keuangan::create($validated);

        return redirect()->route('keuangan.index')
                         ->with('success', 'Data keuangan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit data keuangan.
     */
    public function edit(string $id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('keuangan.edit', compact('keuangan'));
    }

    /**
     * Memperbarui data keuangan yang sudah ada.
     */
   public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'keterangan' => 'required|string|max:255',
        'jumlah'     => 'required|numeric',
        'jenis'      => 'required|in:pemasukan,pengeluaran',
        'tanggal'    => 'required|date',
    ]);

    $keuangan = Keuangan::findOrFail($id);

    $keuangan->update([
        'keterangan' => $validated['keterangan'],
        'jumlah'     => $validated['jumlah'],
        'jenis'      => $validated['jenis'],
        'tanggal'    => $validated['tanggal'],
    ]);

    return redirect()
        ->route('keuangan.index')
        ->with('success', 'Data keuangan berhasil diperbarui');
}

    /**
     * Menghapus data keuangan.
     */
    public function destroy($id)
    {
        Keuangan::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    /**
     * Export data ke file CSV (Format Excel).
     */
    public function exportExcel()
    {
        $keuangans = Keuangan::orderBy('tanggal', 'desc')->get();
        $filename = "Laporan_Keuangan_" . date('Y-m-d') . ".csv";

        return response()->stream(function () {
            // Membersihkan buffer agar file tidak rusak
            if (ob_get_level() > 0) ob_clean();
            
            $handle = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($handle, ['Tanggal', 'Keterangan', 'Kategori', 'Jenis', 'Jumlah']);
            
            Keuangan::chunk(100, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->tanggal, 
                        $row->keterangan, 
                        $row->kategori, 
                        $row->jenis, 
                        $row->jumlah
                    ]);
                }
            });
            
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}