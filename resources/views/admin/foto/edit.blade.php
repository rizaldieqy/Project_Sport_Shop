@extends('layouts.masteradmin')
@section('Gallery','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ url('admin/galleryadmin/{galleryadmin}'). $item }}" method='POST' enctype="multipart/form-data" name="photo">
                <h1 class="text-center">Form Edit Data Foto Produk</h1>
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="product_id">Produk</label>
                    <select name="product_id" required class="form-control">
                        {{-- <option value="">Pilih Produk</option> --}}
                        @foreach($product as $item)
                            <option value="{{ $item->id }}" {{$item->name ? 'selected' : ''}}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Gambar</label>
                    <input type="file" class="form-control" name="photo" placeholder="photo" >
                </div>
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>


@endsection