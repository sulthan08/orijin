@extends('layouts.main')

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
                <div class="row pt-4 pb-4">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 51rem;">
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('order.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_penerima">Nama</label>
                                        <input type="text" name="nama_penerima" id="nama_penerima" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlp">Nomor Telepon</label>
                                        <input type="text" name="no_tlp" id="no_tlp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" name="provinsi" id="provinsi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" name="kota" id="kota" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" name="kelurahan" id="kelurahan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kodepos">Kode Pos</label>
                                        <input type="text" name="kodepos" id="kodepos" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
