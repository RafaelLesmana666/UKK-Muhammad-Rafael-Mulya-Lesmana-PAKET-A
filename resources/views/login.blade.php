<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Login.css">
    <title>Pengaduan Masyarakat | Login</title>
</head>
<body>
    @if (session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session ('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
            <div class="container">
                <div class="form-login">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="formLog">
                            <h1>Login</h1>
                            <label for="username">Username</label>
                                <input type="text" name="username" class="username">
                            <label for="password">Password</label>
                                <input type="password" name="password" class="password">
                            <small class="">Belum punya akun? <a href="/register">Register</a></small>
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <p>Layanan Pengaduan Masyarakat</p>
                    <img src="/img/opinion.png">
                </div>
            </div>
        </div>
    </div>
</body>
</html>