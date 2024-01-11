<?php

namespace App\Http\Controllers;

use App\Models\Lemawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class LemawaController extends Controller
{
    public function index()
    {

        $data = Lemawa::all();
        return view('backend.admin.lemawa.index', compact('data'));
    }
    public function showCreate()
    {
        return view('backend.admin.lemawa.add');
    }
    public function create(Request $req)
    {
        $this->validate($req, [
            'nama_lembaga' => 'required',
            'status' => 'required',
            'logo' => 'required'
        ]);
        // dd($req->all());
        $data = new Lemawa();
        if ($req->hasFile('logo')) {
            $ext = $req->file('logo')->getClientOriginalExtension();
            $name = Uuid::uuid4() . "." . $ext;
            $req->file('logo')->move("logoLembaga/", $name);
            $data->nama_lembaga = $req->nama_lembaga;
            $data->status = $req->status;
            $data->logo = $name;
            $data->save();
            return redirect('lemawa');
        }
    }
    public function showUpdate($id)
    {
        $data = Lemawa::find($id);
        return view('backend.admin.lemawa.update', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'nama_lembaga' => 'required',
            'status' => 'required',
        ]);
        try {
            $data = Lemawa::find($id);
            if ($req->file('logo')) {
                $file = public_path('logoLembaga/' . $data->logo);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $req->file('logo')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $req->file('logo')->move("logoLembaga/", $name);
                $data->logo = $name;
            }
            $data->nama_lembaga = $req->nama_lembaga;
            $data->status = $req->status;
            $data->save();
            return redirect('lemawa');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function delete($id)
    {
        $data = Lemawa::findOrFail($id);
        $file = public_path('logoLembaga/' . $data->logo);
        if (file_exists($file)) {
            unlink($file);
        }
        $data->delete();
        return redirect('lemawa');
    }
}
