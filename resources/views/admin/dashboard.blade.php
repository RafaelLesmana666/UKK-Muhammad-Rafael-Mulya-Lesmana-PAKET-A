@extends('layout.admin.index')
@section('title', "Pengaduan Masyarakat")
@section('konten')

<div style="display: flex;gap: 2rem;">
    <a class="cardJumlah" href="/admin">
        <div style="color: white;padding-left: 10px;padding-top:12px;">Jumlah Pengaduan</div>
        <div style="color: white;font-size: 1.75rem;text-align: right;padding-right: 10px;padding-top: 1rem;">{{ $jumlah }}</div>
    </a>
    <a class="cardJumlah" href="/filterPending">
        <div style="color: white;padding-left: 10px;padding-top:12px;">Jumlah Pending</div>
        <div style="color: white;font-size: 1.75rem;text-align: right;padding-right: 10px;padding-top: 1rem;">{{ $pending }}</div>
    </a>
    <a class="cardJumlah" href="/filterProses">
        <div style="color: white;padding-left: 10px;padding-top:12px;">Jumlah Proses</div>
        <div style="color: white;font-size: 1.75rem;text-align: right;padding-right: 10px;padding-top: 1rem;">{{ $proses }}</div>
    </a>
    <a class="cardJumlah" href="/filterSelesai">
        <div style="color: white;padding-left: 10px;padding-top:12px;">Jumlah Selesai</div>
        <div style="color: white;font-size: 1.75rem;text-align: right;padding-right: 10px;padding-top: 1rem;">{{ $selesai }}</div>
    </a>
</div>



 @if (Auth::user()->role == 'admin')
    <div class="buttonC">
        <a href="/cetak/{{ $cetak }}">Cetak PDF</a>
    </div>
@endif
    <table class="table" border="1">
        <h4>Daftar Pengaduan</h4>
        <thead>
            <th>Id Pengaduan</th>
            <th>Tanggal Pengaduan</th>
            <th>NIK</th>
            <th>Laporan</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        @foreach ($pengaduan as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->tgl_laporan }}</td>
            <td>{{ $p->nik }}</td>
            <td style="height: 1rem;overflow:hidden;">{{ $p->isi_laporan }}</td>
            <td>{{ $p->status }}</td>
            <td>
            @if($p->status == 'pending')
                <a href="/detail/{{ $p->id}}">Detail</a>
            @else
            @endif
            </td>
        </tr> 
        @endforeach
    </table>

    {{ $pengaduan->links() }}
    
@endsection
