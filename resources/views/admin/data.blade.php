@extends('admin.layouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Produk</h1>
                        <br>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col">
                        <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">
                            Tambah Produk
                        </a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itemproduk as $item)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>
                                @if($item->foto != null)
                                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_produk }}" width='150px' class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <a href="{{ route('produk.show', $item->id) }}" class="btn btn-sm btn-success mr-2 mb-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-info mr-2 mb-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $item->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mb-2">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
