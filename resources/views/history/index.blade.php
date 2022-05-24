@extends('layouts.main')

@section('container')
<div class="container-fluid">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection