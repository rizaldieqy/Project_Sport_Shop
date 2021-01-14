@extends('layouts.masteradmin')
@section('Shop','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ url('admin/productadmin/{productadmin}'). $product->id }}" method='POST' enctype="multipart/form-data">
                <h1 class="text-center">Form Edit Data Barang</h1>
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value='{{ $product->name }}'>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                 <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" required class="form-control">
                        @foreach($category as $item)
                            <option value="{{ $item->id }}" {{ $item->name_category ? 'selected' : ''}}>
                                {{ $item->name_category }}
                            </option>
                        @endforeach
                        {{-- @foreach($categories as $category ?? '')
                            <li class="list-group-item {{ $category ?? ''->id == $id ? 'active' : ''}}"><a href="{{ route('category', $category ?? ''->id) }}">{{ $category ?? ''->name }}</a></li>
                            @endforeach --}}
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control" id="price" name="price" value='{{ $product->price }}'>
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="size">Ukuran</label>
                    <select class="js-example-placeholder-multiple js-states form-control" multiple="multiple" name="size[]">
                        @foreach($daftar_size as $size)
                            <option value="{{ $size->id }}">{{ $size->jenis_size }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="desc">Deskripsi Barang</label>
                    <input type="textarea" class="form-control" id="desc" name="desc" value='{{ $product->desc }}'>
                </div>
                @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection


@section('js')
<script>
    $(".js-example-placeholder-multiple").select2().val({!! json_encode($product->size()->allRelatedIds() ) !!}).trigger('change');
</script>

@endsection