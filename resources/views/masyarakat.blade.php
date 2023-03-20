<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/masyarakat.css" rel="stylesheet">
    <title>Pengaduan Masyarakat | Pengaduan</title>
</head>
<body>
    @if (session('sukses'))
    <div class="alert">
        {{ session ('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    
    <div class="container">
        <div class="card">
            <form method="POST" action="/masyarakat">
                <div class="table">
                    @csrf
                    <label for="laporan">Laporan</label>
                        <textarea class="laporan" name="isi_laporan" type="text"></textarea>
                    <label for="foto">Foto</label>
                        <input class="foto" name="foto" type="file">
                    <button type="submit">Kirim</button>
                </div>
            </form>
            <form action="/logout" method="POST">
                @csrf
                <button class="">Keluar</button>
            </form>
        </div>
    </div>
</body>
</html>