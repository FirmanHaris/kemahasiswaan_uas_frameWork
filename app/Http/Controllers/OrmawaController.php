<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;


class OrmawaController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $data = Ormawa::all();
            return view('backend.admin.ormawa.index', compact('data'));
        }
    }
    public function showCreate()
    {
        return view('backend.admin.ormawa.add');
    }
    public function create(Request $req)
    {
        $this->validate($req, [
            'nama_ormawa' => 'required',
            'status' => 'required',
            'logo' => 'required'
        ]);
        // dd($req->all());
        $data = new Ormawa();
        if ($req->hasFile('logo')) {
            $ext = $req->file('logo')->getClientOriginalExtension();
            $name = Uuid::uuid4() . "." . $ext;
            $req->file('logo')->move("logoUkm/", $name);
            $data->nama_ormawa = $req->nama_ormawa;
            $data->status = $req->status;
            $data->logo = $name;
            $data->save();
            return redirect('ormawa');
        }
        return "Logo tidak boleh kosong";
    }
    public function showUpdate($id)
    {
        $data = Ormawa::find($id);
        return view('backend.admin.ormawa.update', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nama_ormawa' => 'required',
            'status' => 'required',
        ]);
        try {
            $data = Ormawa::find($id);
            if ($req->file('logo')) {
                $file = public_path('logoUkm/' . $data->logo);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $req->file('logo')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $req->file('logo')->move("logoUkm/", $name);
                $data->logo = $name;
            }
            $data->nama_ormawa = $req->nama_ormawa;
            $data->status = $req->status;
            $data->save();
            return redirect('ormawa');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function delete($id)
    {
        $data = Ormawa::findOrFail($id);
        $file = public_path('logoUkm/' . $data->logo);
        if (file_exists($file)) {
            unlink($file);
        }
        $data->delete();
        return redirect('ormawa');
    }
    public function detailShow($id)
    {
        $data = Ormawa::findOrFail($id);
        return view('frontend.detail_ormawa.detail', compact('data'));
    }
}
