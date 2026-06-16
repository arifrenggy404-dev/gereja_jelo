<?php

namespace App\Http\Controllers;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->take(3)->get();

        return view('beranda', compact('pengumuman'));
    }
}
