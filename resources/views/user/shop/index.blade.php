@extends('template.user')

@section('title', 'halaman shop')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="category">
                        <h2 id="category-label">Kategori</h2>
                        <ul class="list-group">
                            <li class="list-group-item {{ !$id ? 'active' : '' }}"><a href="{{ route('shop') }}">All</a></li>
                            @foreach($categories as $cgry)
                            <li class="list-group-item {{ $cgry->id == $id ? 'active' : ''}}"><a href="{{ route('category', $cgry->id) }}">{{ $cgry->name_category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <h2 id="category-label" class="text-center mt-5">Cari Produk</h2>
                    <form action="{{ url('/shop') }}" class="form-inline ml-5">
                        <input type="text" class="form-control" name="search">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="item-list">
                        <h2>Product</h2>
                        <hr style="margin-bottom: 2px;">
                        <div class="row list-product">
                            @foreach($products as $muncul)
                            <div class="col-lg-4 item mb-5">
                                <a href="{{ route('show', $muncul->id) }}">
                                    <img src="{{ Storage::url($muncul->galleries->first()->photo) }}" alt="gambar" height="180" width="180">
                                </a>
                                <p class="product-name mt-3 font-weight-bold">
                                    <a href="{{ url('/shop/detail') }}">{{ $muncul->name }}</a>
                                </p>
                                <p class="product-price">Rp. {{ number_format($muncul->price) }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/script.jss') }}"></script>
    <script src="{{ asset('https://kit.fontawesome.com/a076d05399.js') }}"></script>
@endsection