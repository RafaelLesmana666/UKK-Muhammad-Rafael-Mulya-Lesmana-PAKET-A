<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Carbon\Carbon;

class TanggapanController extends Controller
{
    public function index(){
        $Tanggapan = Tanggapan::leftjoin('pengaduans','tanggapans.id_pengaduan' ,'=','pengaduans.id')->simplePaginate(5);
        return view('admin.daftarTanggapan',['tanggapan' => $Tanggapan]);
    }

    public function show($id_tanggapan){
        $tanggapan = Tanggapan::where('id_tanggapan', $id_tanggapan)->first();
        return view('admin.tanggapan',['tanggapan' => $tanggapan]);
    }

    public function tanggapi($id_tanggapan,Request $request){
        $update = $request->validate([
            'tgl_tanggapan',
            'tanggapan' => 'required',
        ]);
        $find = Tanggapan::where('id_tanggapan', $id_tanggapan);
        $find->update($update);

        $idTanggapan = Tanggapan::where('id_tanggapan', $id_tanggapan)->first();
        $pengaduan = $idTanggapan['id_pengaduan'];
        $idCek = Pengaduan::where('id',$pengaduan);
        $updateStatus = ['status' => 'selesai'];
        
        $idCek->update($updateStatus);

        return redirect('/daftarTanggapan');
    }
}
