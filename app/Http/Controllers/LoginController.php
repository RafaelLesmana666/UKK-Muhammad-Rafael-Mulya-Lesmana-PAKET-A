<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Masyarakat;
use \Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authanticate(Request $request){
        $auth = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role'
        ]);

        if(Auth::attempt($auth)){
            $request->session()->regenerate();

            if(Auth::user()->role == 'admin'|| Auth::user()->role == 'petugas'){
                return redirect('/admin');
            }else {
                return redirect('/masyarakat');
            }
        }

        return back()->with('error','username atau password salah');
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nik' => 'required|unique:masyarakats',
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'telpon' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);
        Masyarakat::create($data);

        $user = $request->validate([
            'username',
            'password',
            'role'
        ]);

        $user['username'] = $data['username'];
        $user['password'] = $data['password'];
        $user['role'] = "masyarakat";

        User::create($user);
        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
