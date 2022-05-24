@extends('layouts.main')

@section('container')
<section class="container-fluid" style="background-color: #999790">
    <div class="container container-header">
        <div class="row r-header">
            <h1 class="text-center" style="padding-top: 10rem; padding-bottom: 3rem">Histori Belanja</h1>
        </div>
    </div>
</section>
<section>
    <div class="container" style="padding-top: 5rem; padding-bottom: 3rem">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data Transaksi
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Sub Total</th>
                                        <th>Total</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Pengiriman</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($itemorder))
                                    @foreach($itemorder as $order)
                                    <tr>
                                        <td>
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            {{ $order->cart->no_invoice }}
                                        </td>
                                        <td>
                                            {{ number_format($order->cart->subtotal, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($order->cart->total, 2) }}
                                        </td>
                                        <td>
                                            {{ $order->cart->status_pembayaran }}
                                        </td>
                                        <td>
                                            {{ $order->cart->status_pengiriman }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection