<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use Illuminate\Http\Request;
use Exception;

class JemaatController extends Controller
{
    // MENAMPILKAN DATA (SEARCH + FILTER + PAGINATION)
    public function index(Request $request)
    {
        $query = Jemaat::query();

        // 🔍 SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%')
                  ->orWhere('telepon', 'like', '%' . $request->search . '%');
            });
        }

        // 🧭 FILTER JENIS KELAMIN
        if ($request->jenis_kelamin) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // 📄 PAGINATION
        $jemaat = $query->latest()->paginate(10)->withQueryString();

        return view('jemaat.index', compact('jemaat'));
    }

    // FORM CREATE
    public function create()
    {
        return view('jemaat.create');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        try {
            Jemaat::create($validated);

            return redirect()
                ->route('jemaat.index')
                ->with('success', 'Data jemaat berhasil disimpan.');
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Gagal menyimpan data: ' . $e->getMessage()
            ]);
        }
    }

    // EDIT FORM
    public function edit(string $id)
    {
        $jemaat = Jemaat::findOrFail($id);
        return view('jemaat.edit', compact('jemaat'));
    }

    // UPDATE DATA
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        try {
            $jemaat = Jemaat::findOrFail($id);
            $jemaat->update($validated);

            return redirect()
                ->route('jemaat.index')
                ->with('success', 'Data jemaat berhasil diperbarui.');
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Gagal memperbarui data: ' . $e->getMessage()
            ]);
        }
    }

    // DELETE DATA
    public function destroy(string $id)
    {
        try {
            $jemaat = Jemaat::findOrFail($id);
            $jemaat->delete();

            return redirect()
                ->route('jemaat.index')
                ->with('success', 'Data jemaat berhasil dihapus.');
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Gagal menghapus data.'
            ]);
        }
    }
}