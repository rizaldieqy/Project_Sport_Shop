@extends('template.user')

@section('title','halaman cart')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        @php
            $total = 0;
        @endphp

        {{-- @if($carts->count()==0) --}}
            <p class="text-center">Cart Masih Kosong</p>
        {{-- @endif --}}
        {{-- <h3>{{ $carts->count() }} Barang Yang Sudah Dipilih</h3> --}}
        @foreach($carts as $cart)
            <div class="cart">
                <div class="row">
                    
                    {{-- @foreach($carts as $gambar) --}}
                    {{-- @php
                        dd($gambar);    
                    @endphp --}}
                    <div class="col-lg-3">
                        <img src="{{ Storage::url($gambar['photo']) }}" alt="gambar" height="100">
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        {{-- @endsection --}}
        
        <div class="cart">
            <div class="row">
                <div class="col-lg-3">
                    {{-- <img src="{{ asset('toko.jpg') }}" alt="gambar" height="100""> --}}
                </div>
                <div class="col-lg-9">
                    <div class="top">
                        <p class="name-item">{{ $cart->product->name }}</p>
                        <p class="name-size">{{ $cart->size->jenis_size }}</p>
                        {{-- <select name="size" id="size" class="form-control">
                            <label for="">Pilih Size</label>
                            
                                <option value="{{ $cart->jenis_size }}">{{ $cart->jenis_size }}</option>
                        
                         </select> --}}
                        <div class="top-right">
                            <p>Rp. {{ number_format($cart->product->price) }}</p>
                            <select name="qty" id="qty" class="quantity" data-item="{{ $cart->id }}">
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ $cart->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                                </select>
                            <p class="total-item">Rp. {{ number_format($cart->product->price * $cart->qty) }}</p>
                        </div>
                    </div>
                    <hr class="mt-2 mb-2">
                        <div class="bottom">
                            <div class="row">
                                <p class="col-lg-6 item-desc">
                                    {{ $cart->product->desc }}
                                </p>
                                
                                <div class="offset-lg-4">

                                </div>
                                <div class="col-lg-2">
                                    <form action="{{ url('/cart/{id}') }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="totalharga">
            @php
            $total += ($cart->product->price * $cart->qty)
            @endphp
            {{-- <p>{{ $cart->total }}</p> --}}
        </div>
        

        @endforeach
        <div class="total2">
            <h4 class="total-price">Total Harga : Rp. {{ number_format($total) }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form action="https://api.whatsapp.com/send?phone=081279082470&text=Halo%Saya%Ingin%Melakukan%Pembayaran" method="POST" style="margin-left: 440px">
                @csrf
                <button type="submit" class="btn btn-success">Whatsapp</button>
            </form>
        </div>

        <div class="col-sm-6">
            <form action="{{ route('shop') }}">
                <button type="submit" class="btn btn-danger">Kembali Ke Shop</button>
            </form>
        </div>
    </div>

    {{-- <form action="{{ url('/cart/store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="submit" class="btn btn-primary" value="Masukkan ke Cart">
    </form> --}}

@endsection

@section('script')
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-item');
                    axios.patch(`/cart/${id}}`,{
                        quantity: this.value,
                        id: id
                    })
                    .then(function(response){
                        window.location.href = '/cart'
                    })
                    .catch(function(error){
                        console.log(error);
                    });
                })
            })
        })();
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection