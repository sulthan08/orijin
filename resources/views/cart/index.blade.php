@extends('layouts.main')
<link rel="stylesheet" href="/css/landing.css" />
<link rel="stylesheet" href="/css/main.css" />

@section('container')
<section class="container-fluid" style="background-color: #999790">
    <div class="container container-header">
        <div class="row r-header">
            <h1 class="text-center" style="padding-top: 5rem; padding-bottom: 3rem">Cart</h1>
        </div>
    </div>
</section>
<section>
    <div class="container" style="padding-top: 5rem; padding-bottom: 3rem">
        <div class="row">
            <div class="col col-md-8">
                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
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
                <div class="card">
                    <div class="card-header">
                        Item
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>                        
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($itemcart->detail))
                                @foreach($itemcart->detail as $detail)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>
                                        {{ $detail->produk->nama_produk }}
                                        <br />
                                        {{ $detail->produk->kode_produk }}
                                    </td>
                                    <td>
                                        {{ number_format($detail->harga, 2) }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                                                @method('patch')
                                                @csrf()
                                                <input type="hidden" name="param" value="kurang">
                                                <button class="btn btn-primary btn-sm">
                                                    -
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-primary btn-sm" disabled="true">
                                                {{ number_format($detail->qty, 2) }}
                                            </button>
                                            <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                                                @method('patch')
                                                @csrf()
                                                <input type="hidden" name="param" value="tambah">
                                                <button class="btn btn-primary btn-sm">
                                                    +
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($detail->subtotal, 2) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-sm btn-danger mb-2">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                @if(!empty($itemcart))
                <div class="card">
                    <div class="card-header">
                        Ringkasan
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>No Invoice</td>
                                <td class="text-right">
                                    {{ $itemcart->no_invoice }}
                                </td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right">
                                    {{ number_format($itemcart->subtotal, 2) }}
                                </td>
                            </tr>   
                            <tr>
                                <td>Total</td>
                                <td class="text-right">
                                    {{ number_format($itemcart->total, 2) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('order.index') }}" class="btn btn-primary btn-block">
                                    Checkout
                                </a>
                            </div>
                            <div class="col">
                                <form action="{{ url('kosongkan').'/'.$itemcart->id }}" method="post">
                                    @method('patch')
                                    @csrf()
                                    <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection