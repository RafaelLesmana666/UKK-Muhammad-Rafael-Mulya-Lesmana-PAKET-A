@extends('layout.admin.index')
@section('konten')
    <div>
        <form method="POST" action="/tanggapan/{{$tanggapan->id_tanggapan}}">
            @csrf
            <div class="tang">
                <label for="tanggapan" style="font-size: 1.5rem;">Tanggapan</label>
                    <textarea type="text" name="tanggapan" style="width: 34rem;height: 16rem;margin-top: 2rem;padding: 0.5rem;"></textarea>
                <button type="submit" class="valid">Kirim</button>
        </div>
        </form>
    </div>
    
@endsection