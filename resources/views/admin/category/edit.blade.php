@extends('layouts.masteradmin')
@section('Category','active')
@section('contentadmin')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <form action="{{ url('/admin/categoryadmin/{categoryadmin}'. $category) }}" method='POST' enctype="multipart/form-data">
                <h1 class="text-center">Form Edit Data Kategori</h1>
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name_category">Nama Kategori</label>
                    <input type="text" class="form-control @error('name_category') is invalid @enderror" id="name_category" name="name_category" value="{{ $category->first()->name_category }}">
                </div>
                @error('name_category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>


@endsection