@extends('layout.admin.index')
@section('konten')
    <div>
        <form method="POST" action="/edit/{{ $petugas->id_petugas }}">
            @csrf
          <div class="tambah">
            <label for="nama_petugas">Nama Petugas</label>
                <input type="text" name="nama_petugas">
            <label for="username">Username</label>
                <input type="text" name="username">
            <label for="">Password</label>
                <input type="text" name="password">
            <label for="">Telpon</label>
                <input type="text" name="telpon">
            <label for="level">Level</label>
                <select name="level">
                    <option value="admin" name="admin">admin</option>
                    <option value="petugas" name="petugas">petugas</option>
                </select>
            <button type="submit" class="tambahBtn">Edit</button>
        </div>
        </form>
    </div>
@endsection