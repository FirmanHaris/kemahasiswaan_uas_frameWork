<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Berita;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $berita = Berita::latest()->limit(3)->get();
        $beasiswa = Beasiswa::latest()->get();
        // dd($berita);
        return view('frontend.__beranda', compact('berita', 'beasiswa'));
    }
}
