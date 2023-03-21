@extends('layout.admin.index')
@section('konten')
<div>
    <div class="buttonT">
        <a href="/tambah">Tambah +</a>
    </div>
</div>
<table class="table" border="1">
    <h4>Daftar Petugas</h4>
    <thead>
        <th>ID Petugas</th>
        <th>Nama Petugas</th>
        <th>Username</th>
        <th>Telpon</th>
        <th>Level</th>
        <th>Action</th>
    </thead>
    @foreach ($petugas as $p)
    <tr>
        <td>{{ $p->id_petugas }}</td>
        <td>{{ $p->nama_petugas }}</td>
        <td>{{ $p->username }}</td>
        <td>{{ $p->telpon }}</td>
        <td>{{ $p->level}}</td>
        <td>
            @if($p->nama_petugas == 'admin1')

            @else
            <a href="/edit/{{ $p->id_petugas}}">edit</a>
            <a href="/hapus/{{ $p->id_petugas}}">hapus</a>
            @endif
        </td>
    </tr> 
    @endforeach
</table>

{{ $petugas->links()}}
@endsection