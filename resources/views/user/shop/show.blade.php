@extends('template.user')

@section('title', 'Toko Klontong')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <div class="container">
        <h2 class="title">
            {{ $product->name }}
        </h2>
        <hr>
        <div class="row">
            <div class="wrapper">
                @if($product->galleries->count() > 0)
                <div class="col-lg-4" id="picture">
                    <img
                            src="{{ Storage::url($product->galleries->first()->photo) }}"
                            class="xzoom-container"
                            width="190"
                            height="190"
                            id="xzoom-default"
                            xoriginal="{{ Storage::url($product->galleries->first()->photo) }}"
                        />
                    <br>
                    <br>
                    <div class="row">
                        @foreach($product->galleries as $galeri)
                        <div class="col-sm-4">
                            {{-- <img src="{{ Storage::url($galeri->photo) }}" class="xzoom-gallery" alt="gambar" height="50" width="50" style="margin-right: 10px"> --}}
                            <a href="{{ Storage::url($galeri->photo) }}">
                                <img
                                    src="{{ Storage::url($galeri->photo) }}"
                                    class="xzoom-gallery"
                                    width="50"
                                    height="50"
                                    xpreview="{{ Storage::url($galeri->photo) }}"
                                />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-4 desc">
                <h4 id="description">Deskripsi</h4>
                <br>
                <p>{{ $product->desc }}</p>
                <br>
                <br>
                <br>    
                <h5>Size Yang Tersedia: </h5>
                <p>
                    @foreach($product->size as $item)
                    {{ "$item->jenis_size, " }}
                    @endforeach
                </p>
                <br>
                <br>
                <form action="{{ url('/cart/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <select name="size" id="size" class="form-control">
                    <label for="">Pilih Size</label>
                        @foreach($product->size as $item)
                        {{-- {{ "$item->jenis_size, " }} --}}
                        <option value="{{ $item->id }}">{{ $item->jenis_size }}</option>
                        @endforeach
                        {{-- <option value="{{ $product->size->first()->jenis_size }}">{{ $product->size->first()->jenis_size }}</option> --}}
                
                 </select>
            </div>
            
            <div class="col-lg-4">
                <div class="kartu">
                    <p>Harga</p>
                    <h2>Rp. {{ number_format($product->price) }}</h2>
                   
                        
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-primary" value="Masukkan ke Cart">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-distributed">
        <div class="footer-right">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
        </div>
        <div class="footer-left">
            <p class="footer-links">
                <a href="#" class="link-1">HOME</a>
                <a href="#" >SHOP</a>
                <a href="#" >ABOUT</a>
                <a href="#" >FAQ</a>
            </p>
        </div>  
    </footer>
@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('xZoom-master/dist/xzoom.min.js') }}"></script>
    {{-- <script src="{{ asset('https://kit.fontawesome.com/a076d05399.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $('.xzoom-container, .xzoom-gallery').xzoom({
              zoomWidth: 500,
              title: false,
              tint: '#333',
              Xoffset: 15
            });
        });
    </script>
@endsection