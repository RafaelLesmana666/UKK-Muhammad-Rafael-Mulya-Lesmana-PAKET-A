@extends('layout.admin.index')
@section('konten')
<table class="table" border="1">
    <thead>
        <th>No</th>
        <th>Tanggal Tanggapan</th>
        <th>Tanggapan</th>
        <th>Id Petugas</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    @foreach ($tanggapan as $p)
    <tr>
        <td>{{ $p->id_tanggapan }}</td>
        <td>{{ $p->tgl_tanggapan }}</td>
        <td>{{ $p->tanggapan }}</td>
        <td>{{ $p->id_petugas}}</td>
        <td>{{ $p->status }}</td>
        <td>
            @if($p->status == 'selesai')
            @else
             <a href="/tanggapan/{{ $p->id_tanggapan }}">tanggapi</a>
            @endif
        </td>
    </tr> 
    @endforeach
</table>
@endsection