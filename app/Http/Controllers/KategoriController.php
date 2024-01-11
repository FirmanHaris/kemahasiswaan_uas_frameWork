<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('backend.admin.kategori.index', compact('data'));
    }
    public function formadd()
    {
        return view('backend.admin.kategori.add');
    }
    public function insertKtgr(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);
        try {
            $data = new Kategori();
            $data->nama_kategori = $request->nama_kategori;
            $data->save();
            return redirect('kategori');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function formUpdate($id)
    {
        $data = Kategori::findOrFail($id);
        return view('backend.admin.kategori.update', compact('data'));
    }
    public function updateKtgr(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);
        $data = Kategori::findOrFail($id);
        try {
            $data->nama_kategori = $request->nama_kategori;
            $data->save();
            return redirect('kategori');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deleteKtgr($id)
    {
        try {
            $data = Kategori::findOrFail($id);
            $data->delete();
            return redirect('kategori');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
