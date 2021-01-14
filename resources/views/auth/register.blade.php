<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register user</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body style="background-image: url('register.jpg')">

    <div class="container">
        <div class="login-wrapper">
            <h1 class="title">
                Register
            </h1>
            <hr>
            <form action="{{ route('register') }}" method="POST" class="login-form">
                @csrf
                <input type="text" class="text" placeholder="Masukkan nama" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
                <input type="email" class="input" placeholder="Masukkan email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
                <input type="password" class="input" placeholder="Masukkan password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
                <input type="password" class="input" placeholder="Konfirmasi password" name="password_confirmation" id="password-confirm" required>

                <textarea name="address" id="address" rows="3" required placeholder="Masukkan alamat"></textarea>
                @error('address')
                    <span class="invaflid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <input type="text" class="text" placeholder="Masukkan Nomer Hp" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <button type="submit">Register</button>
                <p class="message">Apakah kamu sudah punya akun ? <a href="{{ route('login') }}"></a></p>
            </form>
        </div>
    </div>
    
</body>
</html>
