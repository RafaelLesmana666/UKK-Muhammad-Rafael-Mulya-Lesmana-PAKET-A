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
        $user = Auth::user()->username;
        $nama = Masyarakat::where('username',$user)->first();
        $nik = $nama['nik'];
        $pengaduan = Pengaduan::leftjoin('tanggapans','pengaduans.id','=','tanggapans.id_pengaduan')->get();
        return view('masyarakat',['pengaduan' => $pengaduan->where('nik', $nik,)]);
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
            $destination = public_path() . '/foto';
            $file->move($destination, $imagename);

            $data['foto'] = $imagename;

        }

        $data['tgl_laporan'] = $today;
        $data['nik'] = $nik;
        $data['status'] = 'pending';
        Pengaduan::create($data);
        return back()->with('sukses','laporan terkirim');

    }

    public function cetak($cetak){
        if($cetak == 'pending'){
            $pengaduan = Pengaduan::where('status','pending')->get();
            $pdf = PDF::loadview('admin.laporanPDF',['pengaduan' => $pengaduan]);
            return $pdf->stream();
        }elseif($cetak == 'proses'){
            $pengaduan = Pengaduan::where('status','proses')->get();
            $pdf = PDF::loadview('admin.laporanPDF',['pengaduan' => $pengaduan]);
            return $pdf->stream();
        }elseif($cetak == 'selesai'){
            $pengaduan = Pengaduan::where('status','selesai')->get();
            $pdf = PDF::loadview('admin.laporanPDF',['pengaduan' => $pengaduan]);
            return $pdf->stream();
        }elseif($cetak == 'semua'){
            $pengaduan = Pengaduan::all();
            $pdf = PDF::loadview('admin.laporanPDF',['pengaduan' => $pengaduan]);
            return $pdf->stream();
        }else {

        }
    }

    public function show(){
        $pengaduan = Pengaduan::orderBy('id','asc')->simplePaginate(5);
        $jumlah = Pengaduan::count('id');
        $pending = Pengaduan::where('status','pending')->count();
        $proses = Pengaduan::where('status','proses')->count();
        $selesai = Pengaduan::where('status','selesai')->count();
        $cetak = 'semua';
        return view('admin.dashboard',
        [
            'pengaduan' => $pengaduan,
            'jumlah' => $jumlah,
            'pending' => $pending,
            'proses' => $proses,
            'selesai' => $selesai,
            'cetak' => $cetak
        ]);
    }

    public function filterPending(){
        $pengaduan = Pengaduan::where('status','pending')->simplePaginate(5);
        $jumlah = Pengaduan::count('id');
        $pending = Pengaduan::where('status','pending')->count();
        $proses = Pengaduan::where('status','proses')->count();
        $selesai = Pengaduan::where('status','selesai')->count();
        $cetak = 'pending';
        return view('admin.dashboard',
        [
            'pengaduan' => $pengaduan,
            'jumlah' => $jumlah,
            'pending' => $pending,
            'proses' => $proses,
            'selesai' => $selesai,
            'cetak' => $cetak
        ]);
    }

    public function filterProses(){
        $pengaduan = Pengaduan::where('status','proses')->simplePaginate(5);
        $jumlah = Pengaduan::count('id');
        $pending = Pengaduan::where('status','pending')->count();
        $proses = Pengaduan::where('status','proses')->count();
        $selesai = Pengaduan::where('status','selesai')->count();
        $cetak = 'proses';
        return view('admin.dashboard',
        [
            'pengaduan' => $pengaduan,
            'jumlah' => $jumlah,
            'pending' => $pending,
            'proses' => $proses,
            'selesai' => $selesai,
            'cetak' => $cetak
        ]);
    }

    public function filterSelesai(){
        $pengaduan = Pengaduan::where('status','selesai')->simplePaginate(5);
        $jumlah = Pengaduan::count('id');
        $pending = Pengaduan::where('status','pending')->count();
        $proses = Pengaduan::where('status','proses')->count();
        $selesai = Pengaduan::where('status','selesai')->count();
        $cetak = 'selesai';
        return view('admin.dashboard',
        [
            'pengaduan' => $pengaduan,
            'jumlah' => $jumlah,
            'pending' => $pending,
            'proses' => $proses,
            'selesai' => $selesai,
            'cetak' => $cetak
        ]);
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
