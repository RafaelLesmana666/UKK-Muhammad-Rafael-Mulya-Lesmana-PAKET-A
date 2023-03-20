<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\User;

class PetugasController extends Controller
{
    public function index(){
        $petugas = Petugas::orderBy('id_petugas','asc')->simplePaginate(5);
        return view('admin.tambahpetugas',['petugas' => $petugas]);
    }

    public function tambah(){
        return view('admin.tambah');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'telpon' => 'required',
            'level' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);
        Petugas::create($data);

        $user = $request->validate([
            'username',
            'password',
            'role'
        ]);

        $user['username'] = $data['username'];
        $user['password'] = $data['password'];
        $user['role'] = $data['level'];

        User::create($user);
        return redirect('/tambahPetugas');
    }

    public function edit($id_petugas){
        $petugas = Petugas::where('id_petugas',$id_petugas)->first();
        return view('admin.editPetugas',['petugas' => $petugas]);
    }

    public function update($id_petugas,Request $request){
        $update = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'telpon' => 'required',
            'level' => 'required',
        ]);

        $update['password'] = bcrypt($update['password']);
        $petugas = Petugas::where('id_petugas',$id_petugas);
        $petugas->update($update);

        return redirect('/tambahPetugas');
    }

    public function delete($id_petugas){
       $petugas = Petugas::where('id_petugas',$id_petugas);
       $petugas->delete();
    }
}
