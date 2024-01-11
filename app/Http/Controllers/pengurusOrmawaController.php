<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Pengurus_ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class pengurusOrmawaController extends Controller
{
    public function index()
    {

        if (Auth::user()) {
            $ormawa = Ormawa::with('pengurusOrmawa')->get();
            $data = Pengurus_ormawa::with('ormawa')->get();
            return view('backend.admin.pengurus_ormawa.index', compact('data', 'ormawa'));
        }
        $ormawa = Ormawa::with('pengurusOrmawa')->get();
        $data = Pengurus_ormawa::with('ormawa')->where('jabatan', 'ketua')->get();
        return view('frontend.__ormawa', compact('data', 'ormawa'));
    }
    public function showInsert()
    {
        $ormawa = Ormawa::all();
        return view('backend.admin.pengurus_ormawa.add', compact('ormawa'));
    }
    public function insert(Request $req)
    {
        $this->validate($req, [
            'id_ormawa' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required'
        ]);
        try {
            $data = new Pengurus_ormawa();
            if ($req->hasFile('foto')) {
                $ext = $req->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $req->file('foto')->move("fotoOrmawa/", $name);

                $data->id_ormawa = $req->id_ormawa;
                $data->nama = $req->nama;
                $data->jabatan = $req->jabatan;
                $data->foto = $name;
                $data->save();
                return redirect('pengurus_ormawa');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function showUpdate($id)
    {
        $ormawa = Ormawa::with('pengurusOrmawa')->get();
        $data = Pengurus_ormawa::findOrFail($id);
        return view('backend.admin.pengurus_ormawa.update', compact('data', 'ormawa'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_ormawa' => 'required',
            'nama' => 'required',
            'jabatan' => 'required'
        ]);
        try {
            $data = Pengurus_ormawa::find($id);
            if ($request->file('foto')) {

                $file = public_path('fotoOrmawa/' . $data->foto);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('foto')->move("fotoOrmawa/", $name);
                $data->gambar = $name;
            }
            $data->id_ormawa = $request->id_ormawa;
            $data->nama = $request->nama;
            $data->jabatan = $request->jabatan;
            $data->save();
            return redirect('pengurus_ormawa');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deletePengurus($id)
    {
        try {
            $data = Pengurus_ormawa::findOrFail($id);
            $file = public_path('fotoOrmawa/' . $data->foto);
            if (file_exists($file)) {
                unlink($file);
            }
            $data->delete();
            return redirect('pengurus_ormawa');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
