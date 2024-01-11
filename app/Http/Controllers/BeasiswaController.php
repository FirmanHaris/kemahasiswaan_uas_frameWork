<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeasiswaController extends Controller
{
    public function index()
    {
        $data = Beasiswa::all();
        if (Auth::user()) {
            return view('backend.admin.beasiswa.index', compact('data'));
        }
        return view('frontend.__beasiswa', compact('data'));
    }
    public function showCreate()
    {
        return view('backend.admin.beasiswa.add');
    }
    public function create(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'jenis_beasiswa' => 'required',
            'mulai_pendaftaran' => 'required',
            'batas_pendaftaran' => 'required',
            'min_ipk' => 'required|decimal:1|numeric'
        ]);

        // dd($request->all());
        $data = new Beasiswa();
        $data->nama_beasiswa = $request->nama_beasiswa;
        $data->jenis_beasiswa = $request->jenis_beasiswa;
        $data->mulai_pendaftaran = $request->mulai_pendaftaran;
        $data->batas_pendaftaran = $request->batas_pendaftaran;
        $data->min_ipk = $request->min_ipk;
        $data->save();
        return redirect('beasiswa');
    }
    public function showUpdate($id)
    {
        $beasiswa = Beasiswa::find($id);
        return view('backend.admin.beasiswa.update', compact('beasiswa'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nama_beasiswa' => 'required',
            'jenis_beasiswa' => 'required',
            'mulai_pendaftaran' => 'required',
            'batas_pendaftaran' => 'required',
            'min_ipk' => 'required|decimal:1'
        ]);
        $data = Beasiswa::findOrFail($id);
        $data->nama_beasiswa = $req->nama_beasiswa;
        $data->jenis_beasiswa = $req->jenis_beasiswa;
        $data->mulai_pendaftaran = $req->mulai_pendaftaran;
        $data->batas_pendaftaran = $req->batas_pendaftaran;
        $data->min_ipk = $req->min_ipk;
        $data->save();
        return redirect('beasiswa');
    }
    public function delete($id)
    {
        $data = Beasiswa::findOrFail($id);
        $data->delete();
        return redirect('beasiswa');
    }
}
