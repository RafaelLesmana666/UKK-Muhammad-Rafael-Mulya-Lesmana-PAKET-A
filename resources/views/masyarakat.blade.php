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
            <form method="POST" action="/masyarakat" enctype="multipart/form-data">
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
                <button class="logout">Keluar</button>
            </form>
        </div>
        <div class="card1" style="margi-left: 4rem;">
            <table>
                <thead>
                    <th>Tanggal laporan</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                </thead>
                @foreach( $pengaduan as $p)
                    <tr>
                        <td>{{ $p->tgl_laporan }}</td>
                        <td>{{ $p->isi_laporan }}</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->tanggapan }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
    </div>
</body>
</html>