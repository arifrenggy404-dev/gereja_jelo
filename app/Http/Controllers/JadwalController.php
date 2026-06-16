<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // 📄 LIST + SEARCH + FILTER + PAGINATION
    public function index(Request $request)
    {
        $jadwal = Jadwal::query()

            // 🔍 SEARCH
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('kegiatan', 'like', '%' . $request->search . '%')
                      ->orWhere('tempat', 'like', '%' . $request->search . '%');
                });
            })

            // 🧭 FILTER KATEGORI
            ->when($request->kategori, function ($query) use ($request) {
                $query->where('kategori', $request->kategori);
            })

            // 📅 SORT TERDEKAT
            ->orderBy('tanggal', 'asc')

            // 📄 PAGINATION
            ->paginate(12)
            ->withQueryString();

        return view('jadwal.index', compact('jadwal'));
    }

    // ➕ FORM CREATE
    public function create()
    {
        return view('jadwal.create');
    }

    // 💾 STORE (VERSI CLEAN)
    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        Jadwal::create($validated);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    // ✏️ EDIT (ROUTE MODEL BINDING)
    public function edit(Jadwal $jadwal)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    // 🔄 UPDATE
    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $this->validateData($request);

        $jadwal->update($validated);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    // 🗑 DELETE
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }

    // 🧠 VALIDASI DIPISAH (BIAR RAPI)
    private function validateData(Request $request)
    {
        return $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal'  => 'required|date',
            'jam'      => 'required',
            'tempat'   => 'required|string|max:255',

            // 🆕 KATEGORI IBADAH
            'kategori' => 'required|in:rumah_tangga,pemuda,mingguan',
        ]);
    }
}