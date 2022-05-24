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
    
    <div class="container container-pcmodel" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row r-card justify-content-md-center">
            @foreach ($itemproduk as $item)
            <div class="card-fitur col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/1.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        <a href="{{ URL::to('pcmodel/detail/'.$item->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach        
        </div>
    </div>
</section>
@endsection

