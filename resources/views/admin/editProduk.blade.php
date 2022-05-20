@extends('admin.layouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
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
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                        <br>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col">
                        <a href="{{ route('produk.index') }}" class="btn btn-sm btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 ps-4 pt-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('produk.update', $itemproduk->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="kode_produk">Kode Produk</label>
                                        <input type="text" name="kode_produk" id="kode_produk"
                                            value="{{ old('kode_produk', $itemproduk->kode_produk) }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $itemproduk->name) }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ram">RAM</label>
                                        <input type="text" name="ram" id="ram" value="{{ old('ram', $itemproduk->ram) }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpu">CPU</label>
                                        <input type="text" name="cpu" id="cpu" value="{{ old('cpu', $itemproduk->cpu) }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="gpu">GPU</label>
                                        <input type="text" name="gpu" id="gpu" value="{{ old('gpu', $itemproduk->gpu) }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="psu">PSU</label>
                                        <input type="text" name="psu" id="psu" value="{{ old('psu', $itemproduk->psu) }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="text" name="stock" id="stock"
                                            value="{{ old('stock', $itemproduk->stock) }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                                            class="form-control">{{ old('deskripsi', $itemproduk->deskripsi) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" name="harga" id="harga"
                                            value="{{ old('harga', $itemproduk->harga) }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @endsection
