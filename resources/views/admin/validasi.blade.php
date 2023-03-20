@extends('layout.admin.index')
@section('konten')

<table class="table" border="1">
    <tr>
        <th>Tanggal Pengaduan</th>
        <td>{{ $detail->tgl_laporan }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ $detail->nik }}</td>
    </tr>
    <tr>
        <th>Laporan</th>
        <td style="width: 24rem;height: 4rem;">{{ $detail->isi_laporan }}</td>
    </tr>
    <tr>
        <th>Foto</th>
        <td><img src={{ url("/image/" . $detail->foto)}}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $detail->status }}</td>
    </tr>
</table>
<form method="POST" action="/detail/{{ $detail->id}}">
    @csrf
    <button class="valid">Valid</button>
</form>
@endsection