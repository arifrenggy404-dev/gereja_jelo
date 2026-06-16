<?php

namespace App\Http\Controllers;

use App\Models\Pelayan;
use Illuminate\Http\Request;

class PelayanController extends Controller
{
    public function index()
    {
        $pelayans = Pelayan::latest()->get(); // Gunakan latest() agar yang terbaru muncul di atas
        return view('pelayan.index', compact('pelayans'));
    }

    public function create()
    {
        return view('pelayan.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama'          => 'required|string|max:255',
        'jabatan'       => 'required|string|max:100',
        'telepon'       => 'nullable|string|max:20',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Tambahkan ini
        'alamat'        => 'required|string', // Tambahkan ini
    ]);

    Pelayan::create($validated);

    return redirect()->route('pelayan.index')
                     ->with('success', 'Data pelayan berhasil ditambahkan');
}

    public function edit(string $id)
    {
        $pelayan = Pelayan::findOrFail($id);
        return view('pelayan.edit', compact('pelayan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama'          => 'required',
        'jabatan'       => 'required',
        'jenis_kelamin' => 'required',
        'telepon'       => 'required',
        'alamat'        => 'required|string', // <--- VALIDASI ALAMAT
    ]);

    $pelayan = Pelayan::findOrFail($id);
    
    // Gunakan update() agar semua field di fillable tersimpan
    $pelayan->update($request->all());

    return redirect()->route('pelayan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pelayan = Pelayan::findOrFail($id);
        $pelayan->delete();

        return redirect()->route('pelayan.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}