@extends('layouts.masteradmin')
@section('Size','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ route('sizeadmin.store') }}" method='POST' enctype="multipart/form-data" name="photo">
                <h1 class="text-center">Form Isi Data Size</h1>
                @csrf
                <div class="form-group">
                    <label for="jenis_size">Size</label>
                    <input type="text" class="form-control" id="jenis_size" name="jenis_size" value='{{ old('jenis_size') }}'>
                </div>
                @error('jenis_size')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Buat</button>
            </form>
        </div>
    </div>
</div>


@endsection