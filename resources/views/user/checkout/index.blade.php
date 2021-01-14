@extends('template.user')

@section('title', 'halaman shop')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="container">
        <h3>Form Checkout</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @foreach($transaction as $muncul)
                    <div class="content">
                        <label for="name">Nama Pemesan:</label>
                        <p> {{ $muncul->user->name }} </p>
                        <label for="product">Produk Yang Dipesan:</label>
                        <p> {{ $muncul->product->name }} </p>
                        <label for="size">Size Yang Dipesan:</label>
                        <p>{{ $muncul->size->jenis_size }}</p>
                        <label for="email">Jumlah Pesanan:</label>
                        <p>{{ $muncul->cart['qty'] }} </p>
                        <label for="total_harga">Total Harga:</label>
                        <p>Rp. {{ number_format($muncul->total) }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="offset-md-2 col-md-5">
                    
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Jumlah Pesanan</th>
            <th>Total Bayar</th>
            <th>Tanggal Pemesanan</th>
            <th>Action</th> --}}