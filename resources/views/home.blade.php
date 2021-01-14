@extends('template.user')

@section('title', 'Profile')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="" alt="gambar" class="img-profile">
            </div>
            <div class="offset-md-2 col-md-5">
                <div class="content">
                    <label for="name">Nama</label>
                    <p>{{ Auth::user()->name }}</p>
                    <label for="email">Email</label><label for="name">Nama</label>
                    <p>{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->email }}</p>
                    <label for="address">Address</label>
                    <p>{{ Auth::user()->address }}</p>
                    <label for="phone">Phone</label>
                    <p>{{ Auth::user()->phone }}</p>
                </div>
            </div>
        </div>
    </div>


