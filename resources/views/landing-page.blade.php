@extends('layouts.main')
<link rel="stylesheet" href="/css/landing.css" />

@section('container')
    <section class="header">
        <div class="container container-header">
            <div class="row r-header">
                <div class="col-md-7 isi-header">
                    <div class="row">
                        <h6 class="judul"> ORIJIN PC </h6>
                    </div>
                    <div class="row">
                        <h6 class="desk">Memberikan pengalaman terbaik pada setiap komputer yang kami tawarkan
                            dengan optimasi terbaik pada setiap kebutuhan pelanggan.

                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-md pt-4">
                            <a href="/pcmodel" class="btn btn-dftr" style="color:white; background-color: black">Beli
                                Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <img class="img-header" src="/image/header.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="features pb-4">
        <div class="container">
            <div class="row pb-4">
                <h4 style="font-weight: bold; font-size: 28px; color: #343A40">Rekomendasi</h4>
            </div>
            <div class="row r-card justify-content-md-center">
                <div class="card-fitur col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/1.svg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Shroud PC</h5>
                            <p class="card-text">8K GAMING 120FPS++.</p>
                        </div>
                    </div>
                </div>
                <div class="card-fitur col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/1.svg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Linus PC</h5>
                            <p class="card-text">AAA GAMING READY.</p>
                        </div>
                    </div>
                </div>
                <div class="card-fitur col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/1.svg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Pudidi PC</h5>
                            <p class="card-text">AMD ADVANTAGE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
