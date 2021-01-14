@extends('layouts.masteradmin')
@section('Shop','active')
@section('contentadmin')

<div class="container">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="mr-5 text-center text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tambah Tentang</a></li>
            <li class="breadcrumb-item active">Data Status</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

<div>
    <a href="{{ route('productadmin.create') }}" class="btn btn-success mt-4 ml-2"><i class='fas fa-plus'></i> Tambah Data Produk</a>
</div>
<br>
@if (session()->has('pesan'))
    <div class="alert alert-success">
        {{ session()->get('pesan') }}
    </div>
@endif
<br>
<table class="table table-striped display responsive nowrap" style="width:100%" id="example">
  <thead>
      <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Ukuran</th>
        <th>Keterangan</th>
        <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach($product as $tampil)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $tampil->name }}</td>
        <td>{{ $tampil->category_id}}</td>
        <td>{{ $tampil->price }}</td>
        <td>
          @foreach($tampil->size as $item)
            {{ $item->jenis_size,  }}
          @endforeach
        </td>
        <td>{{ $tampil->desc }}</td>
        <td><a href="{{ route('productadmin.edit', $tampil->id) }}" class="btn btn-info"><i class='fas fa-edit'></i></a><br><br>
            <form action="{{ route('productadmin.destroy', $tampil->id) }} " method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </form>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>


@endsection