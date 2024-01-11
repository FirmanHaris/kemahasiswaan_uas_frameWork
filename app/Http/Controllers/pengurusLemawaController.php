<?php

namespace App\Http\Controllers;

use App\Models\Lemawa;
use App\Models\Pengurus_lemawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class pengurusLemawaController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $lemawa = Lemawa::with('pengurusLemawa')->get();
            $data = Pengurus_lemawa::with('lemawa')->get();
            return view('backend.admin.pengurus_lemawa.index', compact('data', 'lemawa'));
        }
        $lemawa = Lemawa::with('pengurusLemawa')->get();
        $data = Pengurus_lemawa::with('lemawa')->where('jabatan', 'ketua')->get();
        return view('frontend.__lemawa', compact('data', 'lemawa'));
    }
    public function showInsert()
    {
        $lemawa = Lemawa::all();
        return view('backend.admin.pengurus_lemawa.add', compact('lemawa'));
    }
    public function insert(Request $req)
    {
        $this->validate($req, [
            'id_lemawa' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required'
        ]);
        try {
            $data = new Pengurus_lemawa();
            if ($req->hasFile('foto')) {
                $ext = $req->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $req->file('foto')->move("fotoLemawa/", $name);

                $data->id_lemawa = $req->id_lemawa;
                $data->nama = $req->nama;
                $data->jabatan = $req->jabatan;
                $data->foto = $name;
                $data->save();
                return redirect('pengurus_lemawa');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function showUpdate($id)
    {
        $lemawa = Lemawa::with('pengurusLemawa')->get();
        $data = Pengurus_lemawa::findOrFail($id);
        return view('backend.admin.pengurus_lemawa.update', compact('data', 'lemawa'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_lemawa' => 'required',
            'nama' => 'required',
            'jabatan' => 'required'
        ]);
        try {
            $data = Pengurus_lemawa::find($id);
            if ($request->file('foto')) {

                $file = public_path('fotoLemawa/' . $data->foto);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('foto')->move("fotoLemawa/", $name);
                $data->foto = $name;
            }
            $data->id_lemawa = $request->id_lemawa;
            $data->nama = $request->nama;
            $data->jabatan = $request->jabatan;
            $data->save();
            return redirect('pengurus_lemawa');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deletePengurus($id)
    {
        try {
            $data = Pengurus_lemawa::findOrFail($id);
            $file = public_path('fotoLemawa/' . $data->foto);
            if (file_exists($file)) {
                unlink($file);
            }
            $data->delete();
            return redirect('pengurus_lemawa');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
