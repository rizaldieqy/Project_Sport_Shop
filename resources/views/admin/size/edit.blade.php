@extends('layouts.masteradmin')
@section('Size','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ url('/admin/sizeadmin/{sizeadmin}'. $daftar_size) }}" method='POST' enctype="multipart/form-data">
                <h1 class="text-center">Form Edit Data Size</h1>
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="jenis_size">Size</label>
                    <input type="text" class="form-control @error('jenis_size') is invalid @enderror" id="jenis_size" name="jenis_size" value="{{ $daftar_size[0]->jenis_size }}">
                </div>
                @error('jenis_size')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>


@endsection