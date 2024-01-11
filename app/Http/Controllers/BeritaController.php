<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class BeritaController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $kategori = Kategori::with('berita')->get();
            $data = Berita::with('kategori')->get();
            return view('backend.admin.berita.index', compact('data', 'kategori'));
        } else {
            $kategori = Kategori::with('berita')->get();
            $data = Berita::with('kategori')->latest()->get();
            return view('frontend.__berita', compact('data', 'kategori'));
        }
    }
    public function showCreate()
    {
        $kategori = Kategori::all();
        return view('backend.admin.berita.add', compact('kategori'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'judul_berita' => 'required',
            'id_kategori' => 'required',
            'isi_berita' => 'required',
            'gambar' => 'required'
        ]);
        // dd($request->all());
        try {
            $data = new Berita();

            if ($request->hasFile('gambar')) {
                $ext = $request->file('gambar')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('gambar')->move("gambarBerita/", $name);

                $slug = strtolower($request->judul_berita);
                $slug = str_replace(' ', '-', $slug);
                $data->judul_berita = $request->judul_berita;
                $data->slug = $slug;
                $data->id_kategori = $request->id_kategori;
                $data->isi_berita = $request->isi_berita;
                // foto
                $data->gambar = $name;
                $data->save();
                return redirect()->route('berita');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function showUpdate($id)
    {
        $kategori = Kategori::with('berita')->get();
        $berita = Berita::find($id);
        return view('backend.admin.berita.update', compact('berita', 'kategori'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul_berita' => 'required',
            'id_kategori' => 'required',
            'isi_berita' => 'required',
        ]);
        $data = Berita::find($id);
        if ($request->file('gambar')) {

            $file = public_path('gambarBerita/' . $data->gambar);
            if (file_exists($file)) {
                unlink($file);
            }
            $ext = $request->file('gambar')->getClientOriginalExtension();
            $name = Uuid::uuid4() . "." . $ext;
            $request->file('gambar')->move("gambarBerita/", $name);
            $data->gambar = $name;
        }
        $slug = strtolower($request->judul_berita);
        $slug = str_replace(' ', '-', $slug);
        $data->judul_berita = $request->judul_berita;
        $data->slug = $slug;
        $data->id_kategori = $request->id_kategori;
        $data->isi_berita = $request->isi_berita;

        $data->save();
        return redirect()->route('berita');
    }
    public function delete($id)
    {
        $id_data = Berita::findOrFail($id);
        $file = public_path('gambarBerita/' . $id_data->gambar);
        if (file_exists($file)) {
            unlink($file);
        }
        $id_data->delete();
        return redirect()->route('berita');
    }
    public function detailShow($id)
    {
        $data = Berita::findOrFail($id);
        return view('frontend.detail_berita.detail', compact('data'));
    }
    // public function showinAsside()
    // {
    //     $berita  = Berita::latest()->get(5);
    // }
}
