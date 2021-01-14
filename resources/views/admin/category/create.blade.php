@extends('layouts.masteradmin')
@section('Category','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ route('categoryadmin.store') }}" method='POST' enctype="multipart/form-data" name="photo">
                <h1 class="text-center">Form Isi Data Kategori</h1>
                @csrf
                <div class="form-group">
                    <label for="name_category">Nama Kategori</label>
                    <input type="text" class="form-control" id="name_category" name="name_category" value='{{ old('name_category') }}'>
                </div>
                @error('name_category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Buat</button>
            </form>
        </div>
    </div>
</div>


@endsection