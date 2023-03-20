@extends('layout.admin.index')
@section('title', "Pengaduan Masyarakat")
@section('konten')

<div style="display: flex;gap: 2rem;">
    <div class="cardJumlah">
        <p style="color: white;padding-left: 6px;">Jumlah Pengaduan</p>
        <p style="color: white;font-size: 1.75rem;text-align: right;padding-right: 8px;">{{ $jumlah }}</p>
    </div>

    <div class="cardJumlah">
        <p style="color: white;padding-left: 6px;">Jumlah Pending</p>
        <p style="color: white;font-size: 1.75rem;text-align: right;padding-right: 8px;">{{ $Jpending }}</p>
    </div>
</div>



 @if (Auth::user()->role == 'admin')
    <div class="buttonC">
        <a href="/cetak">Cetak PDF</a>
    </div>
@endif
    <table class="table" border="1">
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
