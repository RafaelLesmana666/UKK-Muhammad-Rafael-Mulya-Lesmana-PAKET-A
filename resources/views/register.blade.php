<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Register.css">
    <title>Pengaduan Masyarakat | Register</title>
</head>
<body>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session ('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <div class="form-register">
                    <form action="/register" method="POST">
                       @csrf
                       <div class="title">
                        <h1>Register</h1>
                        </div>
                        <div class="formRegis">
                            <label for="nik">NIK</label>
                                <input type="text" name="nik" class="nik" id="nik">
                            <label for="nama">Nama</label>
                                <input type="text" name="nama" class="nama" id="nama">
                            <label for="username">Username</label>
                                <input type="text" name="username" class="username" id="username">
                            <label for="password">Password</label>
                                <input type="password" name="password" class="password" id="password">
                            <label for="telpon">Telpon</label>
                                <input type="telpon" name="telpon" class="telpon" id="telpon">
                            <button class="" type="submit">Daftar</button>
                            <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Login</a></small>
                        </div>
                    </form>
                </div>
                <div class="image-left">
                    <img src="/img/Rbg.png">
                </div>
                <div class="image-right">
                    <img src="/img/rbg2.png">
                </div>
            </div>
    </div>
</body>
</html>