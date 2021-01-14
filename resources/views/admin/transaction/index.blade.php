@extends('layouts.masteradmin')
@section('Transaction','active')
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
    {{-- <a href="{{ route('productadmin.create') }}" class="btn btn-success mt-4 ml-2"><i class='fas fa-plus'></i> Tambah </a> --}}
</div>
<br>
@if (session()->has('pesan'))
    <div class="alert alert-success">
        {{ session()->get('pesan') }}
    </div>
@endif
<br>
<table id="example" class="table table-striped display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Nama Produk</th>
            <th>Size Yang Dipesan</th>
            <th>Jumlah Pesanan</th>
            <th>Total Bayar</th>
            <th>Tanggal Pemesanan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $tampil)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tampil->user->name }}</td>
            <td>{{ $tampil->product->name }}</td>
            <td>{{ $tampil->size->jenis_size }}</td>
            <td>{{ $tampil->qty }}</td>
            {{-- <td>{{ $tampil->timestamps }}</td> --}}
            <td><form action=" " method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form></td>
            {{-- <td>
              @foreach($tampil->size as $item)
                {{ $item->jenis_size,  }}
              @endforeach
            </td>
            <td>{{ $tampil->desc }}</td>
            <td><a href="{{ route('productadmin.edit', $tampil->id) }}" class="btn btn-info"><i class='fas fa-edit'></i></a><br><br> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>


@endsection