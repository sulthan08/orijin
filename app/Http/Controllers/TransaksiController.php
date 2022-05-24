<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        
        // kalo member maka menampilkan cart punyanya sendiri
        $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                        $q->where('status_cart', 'checkout');
                        $q->where('user_id', $itemuser->id);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);
        $data = array('title' => 'Data Transaksi',
                    'itemorder' => $itemorder,
                    'itemuser' => $itemuser);
        return view('transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        if ($itemcart) {
                // buat variabel inputan order
                $inputanorder['cart_id'] = $itemcart->id;
                $inputanorder['nama_penerima'] = $request->nama_penerima;
                $inputanorder['no_tlp'] = $request->no_tlp;
                $inputanorder['alamat'] = $request->alamat;
                $inputanorder['provinsi'] = $request->provinsi;
                $inputanorder['kota'] = $request->kota;
                $inputanorder['kecamatan'] = $request->kecamatan;
                $inputanorder['kelurahan'] = $request->kelurahan;
                $inputanorder['kodepos'] = $request->kodepos;
                $itemorder = Order::create($inputanorder);//simpan order
                // update status cart
                $itemcart->update(['status_cart' => 'checkout']);
                return redirect()->route('transaksi.index')->with('success', 'Order berhasil disimpan');

        } else {
            return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array('title' => 'Detail Transaksi');
        return view('transaksi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
