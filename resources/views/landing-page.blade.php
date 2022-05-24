@extends('layouts.main')
<link rel="stylesheet" href="/css/landing.css"/>

@section('container')
<section class="header">
    <div class="container container-header">
        <div class="row r-header">
            <div class="col-md-7 isi-header">
                <div class="row">
                    <h6 class="judul">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h6>
                </div>
                <div class="row">
                    <h6 class="desk">Website merupakan salah satu sumber informasi yang paling sering diakses. Saat ini, website merupakan media yang wajib dimiliki oleh perusahaan atau instansi maupun start-up.</h6>
                </div>
                <div class="row">
                    <div class="col-md pt-4">
                        <a href="#" class="btn btn-dftr" style="color:white; background-color: black">Beli Sekarang</a>
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
                        <h5 class="card-title">Barang 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>                        
                    </div>
                </div>
            </div>            
            <div class="card-fitur col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/1.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Barang 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>                        
                    </div>
                </div>
            </div>            
            <div class="card-fitur col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/1.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Barang 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>                        
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

@endsection