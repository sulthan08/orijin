@extends('admin.layouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Image</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/admin/image') }}" method="post" enctype="multipart/form-data"
                                    class="form-inline">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning">{{ $error }}</div>
                                    @endforeach
                                @endif
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
                                    @foreach ($itemgambar as $gambar)
                                        <div class="col col-lg-3 col-md-3 mb-2">
                                            {{-- <?php
                                            var_dump($gambar->url);
                                            exit(); ?> --}}
                                            <img src="{{ \Storage::url($gambar->url) }}" alt="img"
                                                class="img-thumbnail mb-2">
                                            <form action="{{ url('/admin/image/' . $gambar->id) }}" method="post"
                                                style="display:inline;">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-sm btn-danger mb-2">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @endsection
