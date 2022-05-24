@extends('layouts.main')
<link rel="stylesheet" href="/css/landing.css" />
<link rel="stylesheet" href="/css/main.css" />

@section('container')
<section class="header">
    <div class="container container-header">
        <div class="row r-header">
            <h2 class="text-center" style="padding-top: 3rem; padding-bottom: 3rem">PC Model</h2>
        </div>
    </div>
</section>
<section>
    <div class="container" style="margin-bottom: 3rem">
        <div class="row mt-4">
            <div class="col col-lg-8 col-md-8">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($itemproduk->images as $index => $image)
                        @if($index == 0)
                        <div class="carousel-item active">
                            <img src="{{ \Storage::url($image->foto) }}" class="d-block w-100" alt="...">
                        </div>
                        @else
                        <div class="carousel-item">
                            <img src="{{ \Storage::url($image->foto) }}" class="d-block w-100" alt="...">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- deskripsi produk -->
            <div class="col col-lg-4 col-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                {{-- <span class="small">{{ $itemproduk->kategori->nama_kategori }}</span> --}}
                                <h5>{{ $itemproduk->name }}</h5>
                                <table class="table table-borderless">
                                     <tbody>
                                        <tr>                                            
                                            <td>Kode Produk</td>
                                            <td>:</td>
                                            <td>{{ $itemproduk->kode_produk }}</td>
                                        </tr>
                                        <tr>
                                            <td>RAM</td>
                                            <td>:</td>
                                            <td>{{ $itemproduk->ram }}</td>                                            
                                        </tr>
                                        <tr>
                                            <td>CPU</td>
                                            <td>:</td>
                                            <td>{{ $itemproduk->cpu }}</td>                                            
                                        </tr>
                                        <tr>
                                            <td>GPU</td>
                                            <td>:</td>
                                            <td>{{ $itemproduk->gpu }}</td>
                                        </tr>
                                        <tr>
                                            <td>PSU</td>
                                            <td>:</td>
                                            <td>{{ $itemproduk->psu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($itemproduk->harga, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stock</td>
                                            <td>:</td>
                                            <td>{{ $itemproduk->stock }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('cartdetail.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produk_id" value={{$itemproduk->id}}>
                                    <button class="btn btn-block btn-primary" type="submit">
                                        <i class="fa fa-shopping-cart"></i> Tambahkan Ke Keranjang
                                    </button>
                                </form>
                                <button class="btn btn-block btn-success mt-4">
                                    <i class="fa fa-shopping-basket"></i> Beli Sekarang
                                </button>
                            </div>
                            <div class="card-footer">
                                <div class="row mt-4">
                                    <div class="col text-center">
                                        <i class="fa fa-truck-moving"></i>
                                        <p>Pengiriman Cepat</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fa fa-calendar-week"></i>
                                        <p>Garansi 7 hari</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fa fa-money-bill"></i>
                                        <p>Pembayaran Aman</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Deskripsi
                    </div>
                    <div class="card-body">
                        {{ $itemproduk->deskripsi }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection