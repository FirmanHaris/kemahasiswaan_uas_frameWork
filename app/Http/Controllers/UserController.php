<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('backend.auth.user.index', compact('data'));
    }
    public function getViewLogin()
    {
        return view('backend.auth.__login');
    }
    public function loginAuth(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $validated = $request->only('email', 'password');
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('LoginError', 'Login Gagal!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function viewReg()
    {
        return view('backend.auth.user.register');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $data = new User();
        try {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->role = $request->role;
            $data->save();
            return redirect()->route('user');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deleteUser($id)
    {
        try {
            $data = User::findOrFail($id);
            $data->delete();
            return redirect()->route('user');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
