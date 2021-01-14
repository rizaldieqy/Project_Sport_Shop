<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
  </head>
  <body>
    @include('includes.user.header')
    
    
    @yield('content')
    
    
    
    
    @include('includes.user.footer')
    
    
    
    
    
    
    
    
    <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 {{-- @include('sweetalert::alert') --}}
</body>
</html>