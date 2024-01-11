<?php

namespace App\Http\Controllers;

use App\Models\Karya_mhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class KaryaMhsController extends Controller
{
    public function index()
    {
        $data = Karya_mhs::all();
        return view('backend.admin.karya_mhs.index', compact('data'));
    }
    public function karyaTI()
    {
        $karya = Karya_mhs::latest()->where('prodi', 'teknik informatika')->get();
        return view('frontend.__karya_ti', compact('karya'));
    }
    public function karyaSI()
    {
        $karya = Karya_mhs::latest()->where('prodi', 'sistem informasi')->get();
        return view('frontend.__karya_si', compact('karya'));
    }
    public function showAdd()
    {
        return view('backend.admin.karya_mhs.add');
    }
    public function addKarya(Request $request)
    {
        $this->validate($request, [
            'judul_karya' => 'required',
            'jenis_karya' => 'required',
            'prodi' => 'required',
            'keterangan' => 'required',
            'gambar_karya' => 'required'
        ]);
        // dd($request);
        try {
            $data = new Karya_mhs();
            if ($request->hasFile('gambar_karya')) {
                $ext = $request->file('gambar_karya')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('gambar_karya')->move("gambar_Karya/", $name);

                $data->judul_karya = $request->judul_karya;
                $data->jenis_karya = $request->jenis_karya;
                $data->prodi = $request->prodi;
                $data->keterangan = $request->keterangan;
                $data->gambar_karya = $name;
                $data->save();
                return redirect()->route('karya');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function showUpdate($id)
    {
        $data = Karya_mhs::find($id);
        return view('backend.admin.karya_mhs.update', compact('data'));
    }
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'judul_karya' => 'required',
            'jenis_karya' => 'required',
            'prodi' => 'required',
            'keterangan' => 'required'
        ]);
        try {
            $data = Karya_mhs::findOrFail($id);
            if ($request->file('gambar_karya')) {

                $file = public_path('gambar_Karya/' . $data->gambar_karya);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $request->file('gambar_karya')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('gambar_karya')->move("gambar_Karya/", $name);
                $data->gambar_karya = $name;
            }
            $data->judul_karya = $request->judul_karya;
            $data->jenis_karya = $request->jenis_karya;
            $data->prodi = $request->prodi;
            $data->keterangan = $request->keterangan;
            $data->save();
            return redirect()->route('karya');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deleteData($id)
    {
        $data = Karya_mhs::findOrFail($id);
        try {
            $file = public_path('gambar_Karya/' . $data->gambar_karya);
            if (file_exists($file)) {
                unlink($file);
            }
            $data->delete();
            return redirect()->route('karya');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
