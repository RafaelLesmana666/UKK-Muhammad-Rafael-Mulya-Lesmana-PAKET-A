<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Index.css">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img src="/img/megaphone.png" class="icon">
                <h3>Pengaduan Masyarakat</h3>
            </div>
            <div class="nav">
                <a href="/admin">Daftar Pengaduan</a>
                <a href="/daftarTanggapan">Daftar Tanggapan</a>
                @if(Auth::user()->role == 'admin')
                    <a href="/tambahPetugas">Tambah Petugas</a> 
                @endif
            </div>
            <form action="/logout" method="POST">
                @csrf
                <button class="keluar">Keluar</button>
            </form>
        </div>
        <div class="content">
            <div class="header">
                <h1>
                @php
                    $Hour = date('G');

                    if ( $Hour >= 0 && $Hour <= 10 ) {
                        echo "Good Morning";
                    } else if ( $Hour >= 11 && $Hour <= 14 ) {
                        echo "Good Afternoon";
                    } else if ( $Hour >= 15 || $Hour <= 18 ) {
                        echo "Good evening";
                    } else {
                        echo "Good Night";
                    }
                @endphp
                </h1>
                <div class="profil">
                    <div class="info-profil">
                        <span>{{ Auth::user()->username }}</span>
                        <span>{{ Auth::user()->role }} </span>    
                    </div>
                </div>
            </div>
            <div class="content-2">
                @yield('konten')
            </div>
        </div>
    </div>
</body>
</html>