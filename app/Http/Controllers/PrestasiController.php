<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    public function index()
    {
        $data = Prestasi::all();
        if (Auth::user()) {
            return view('backend.admin.prestasi.index', compact('data'));
        }
        return view('frontend.__prestasi', compact('data'));
    }
    public function showCreate()
    {
        return view('backend.admin.prestasi.add');
    }
    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_kegiatan' => 'required',
            'tgl_kegiatan' => 'required',
            'gambar_kegiatan' => 'required'
        ]);
        $data = new Prestasi();
        if ($request->file('gambar_kegiatan')) {
            $ext = $request->file('gambar_kegiatan')->getClientOriginalExtension();
            $name = Uuid::uuid4() . "." . $ext;
            $request->file('gambar_kegiatan')->move("gambarPrestasi/", $name);

            $slug = strtolower($request->nama_kegiatan);
            $slug = str_replace(' ', '-', $slug);
            // dd($slug);
            $data->nama_kegiatan = $request->nama_kegiatan;
            $data->slug = $slug;
            $data->tgl_kegiatan = $request->tgl_kegiatan;
            $data->gambar_kegiatan = $name;
            $data->save();
            return redirect('prestasi');
        }
    }
    public function showUpdate($id)
    {
        $prestasi = Prestasi::find($id);
        return view('backend.admin.prestasi.update', compact('prestasi'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kegiatan' => 'required',
            'tgl_kegiatan' => 'required',
        ]);
        $data = Prestasi::find($id);
        if ($request->file('gambar_kegiatan')) {
            $file = public_path('gambarPrestasi/' . $data->gambar_kegiatan);
            if (file_exists($file)) {
                unlink($file);
            }
            $ext = $request->file('gambar_kegiatan')->getClientOriginalExtension();
            $name = Uuid::uuid4() . "." . $ext;
            $request->file('gambar_kegiatan')->move("gambarPrestasi/", $name);
            $data->gambar_kegiatan = $name;
        }
        $slug = strtolower($request->nama_kegiatan);
        $slug = str_replace(' ', '-', $slug);
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->slug = $slug;
        $data->tgl_kegiatan = $request->tgl_kegiatan;
        $data->save();
        return redirect('prestasi');
    }
    public function delete($id)
    {
        $id_data = Prestasi::findOrFail($id);
        $file = public_path('gambarPrestasi/' . $id_data->gambar_kegiatan);
        if (file_exists($file)) {
            unlink($file);
        }
        $id_data->delete();
        return redirect('prestasi');
    }
}
