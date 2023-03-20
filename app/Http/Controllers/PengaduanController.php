<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use \Auth;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use \PDF;

class PengaduanController extends Controller
{
    public function index(){
       return view('masyarakat');
    }
    public function store(Request $request){    
        $data = $request->validate([
            'tgl_laporan',
            'nik',
            'isi_laporan' => 'required',
            'foto' => 'nullable',
            'status',
        ]);

        $today = Carbon::now();
        $auth = Auth::user()->username;
        $user = Masyarakat::where('username' , $auth)->first();
        $nik = $user['nik'];

        if($file = $request->hasFile('foto')){
            $file = $request->file('foto');
            $imagename = $file->getClientOriginalName();
            $destination = public_path() . '/foto/';
            $file->move($imagename, $destination);  

            $data['foto'] = $imagename;

        }

        $data['tgl_laporan'] = $today;
        $data['nik'] = $nik;
        $data['status'] = 'pending';
        Pengaduan::create($data);
        return back()->with('sukses','laporan terkirim');

    }

    public function cetak(){
        $pengaduan = Pengaduan::all();
        $pdf = PDF::loadview('admin.laporanPDF',['pengaduan' => $pengaduan]);
        return $pdf->stream();
    }

    public function show(){
        $pengaduan = Pengaduan::orderBy('id','asc')->simplePaginate(5);
        return view('admin.dashboard',['pengaduan' => $pengaduan]);
    }

    public function detail($id){
        $detail = Pengaduan::where('id',$id)->first();
        return view('admin.validasi',['detail' => $detail]);
    }

    public function validasi($id, Request $request){
        $request->validate([
            'tgl_tanggapan',
            'id_pengaduan',
            'tanggapan',
            'id_petugas'
        ]);

        $today = Carbon::now();
        $auth = Auth::user()->username;
        $petugas = Petugas::where('username',$auth)->first();
        $id_petugas = $petugas['id_petugas'];
        $pengaduanUpdate = Pengaduan::where('id',$id);
        $update = ['status' => 'proses'];
        $pengaduanUpdate->update($update);

        $data['tgl_tanggapan'] = $today;
        $data['id_pengaduan'] = $id;
        $data['tanggapan'] = '-';
        $data['id_petugas'] = $id_petugas;

        Tanggapan::create($data);
        
        if(Auth::user()->role == 'admin'){
            return redirect('/admin');
        }else {
            return redirect('/petugas');
        }
    }
}
