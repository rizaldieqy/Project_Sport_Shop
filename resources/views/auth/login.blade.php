<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body style="background-image: url('login6.png')">
    <div class="login">
        <div class="container">
            <div class="login-wrapper mt-5 mb-0">
                <h1 class="title">Login</h1>
                <hr>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <input type="text" placeholder="E-Mail" {{ $errors->has('email') ? ' is-invalid' : '' }} name="email" value="{{ old('email') }}" required autofocus>
    
                    @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
    
                    <input type="password" placeholder="Password" {{ $errors->has('password') ? ' is-invalid' : ''}} name="password" required>
    
                    @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
    
                    <button type="submit">Login</button>
                    {{-- @can('create', App\User::class) --}}
                    <p class="message">Belum Punya Akun? <br><a href="/register">Yuk Bikin Akun Kamu Disini!</a></p>
                    {{-- @endcan --}}
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>   
</body>
</html>