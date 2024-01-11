<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Ramsey\Uuid\Uuid;

class DokumenController extends Controller
{
    public function index()
    {

        if (Auth::user()) {
            $data = Dokumen::all();
            return view('backend.dokumen.index', compact('data'));
        } else {
            $simkatmawa = Dokumen::latest()->where('jenis', 'simkatmawa')->get();
            $ami = Dokumen::latest()->where('jenis', 'ami')->get();
            return view('frontend.__dokumen', compact('ami', 'simkatmawa'));
        }
    }
    public function showCreate()
    {
        return view('backend.dokumen.add');
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'nama_dokumen' => 'required',
            'jenis' => 'required',
            'dokumen' => 'required'
        ]);
        try {
            $data = new Dokumen();
            if ($request->hasFile('dokumen')) {
                $ext = $request->file('dokumen')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('dokumen')->move('arsipDokumen/', $name);
                $data->nama_dokumen = $request->nama_dokumen;
                $data->jenis = $request->jenis;
                $data->dokumen = $name;
                $data->save();
                return redirect('dokumen');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function showUpdate($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('backend.dokumen.update', compact('dokumen'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_dokumen' => 'required',
            'jenis' => 'required'
        ]);
        try {
            $data = Dokumen::findOrFail($id);
            if ($request->file('dokumen')) {
                $file = public_path('arsipDokumen/' . $data->dokumen);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $request->file('dokumen')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('dokumen')->move('arsipDokumen/', $name);
                $data->dokumen = $name;
            }
            $data->nama_dokumen = $request->nama_dokumen;
            $data->jenis = $request->jenis;
            $data->save();
            return redirect('dokumen');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function delete($id)
    {
        try {
            $data = Dokumen::findOrFail($id);
            $file = public_path('arsipDokumen/' . $data->dokumen);
            if (file_exists($file)) {
                unlink($file);
            }
            $data->delete();
            return redirect('dokumen');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
