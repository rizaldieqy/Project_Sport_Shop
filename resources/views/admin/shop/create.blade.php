@extends('layouts.masteradmin')
@section('Shop','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ route('productadmin.store') }}" method='POST' enctype="multipart/form-data">
                <h1 class="text-center">Form Isi Data Barang</h1>
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value='{{ old('name') }}'>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                 <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" required class="form-control">
                        @foreach($category as $item)
                            <option value="{{ $item->id }}" {{old('category_id') == "$item->name_category" ? 'selected' : ''}}>
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
                    <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga" value='{{ old('price') }}'>
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- <div class="form-group">
                    <label for="size">Ukuran</label>
                    <select name="size" id="size" class="form-control">
                      <option value="S" {{ old('size') == 'S' ? 'selected' : '' }}> S </option>
                      <option value="M" {{ old('size') == 'M' ? 'selected' : '' }}> M </option>
                      <option value="L" {{ old('size') == 'L' ? 'selected' : '' }}> L </option>
                      <option value="XL" {{ old('size') == 'XL' ? 'selected' : '' }}> XL </option>
                    </select>
                  @error('size')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror 
                </div> --}}

                <div class="form-group">
                    <label for="size">Size</label>
                    <select class="js-example-placeholder-multiple js-states form-control" multiple="multiple" name="size[]" style="color: black">
                        @foreach($daftar_size as $size)
                            <option value="{{ $size->id }}">{{ $size->jenis_size }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="desc">Deskripsi Barang</label>
                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="10" value='{{ old('desc') }}'></textarea>
                </div>
                @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <button type="submit" class="btn btn-primary mb-2">Buat</button>
            </form>
        </div>
    </div>
</div>


@endsection