<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemorder = DetailOrder::where('user_id', $itemuser->id)->paginate(10);
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        $data = array('title' => 'Order',
                    'itemuser' => $itemuser,
                    'itemcart' => $itemcart,
                    'itemorder' => $itemorder);
        return view('pages.order', $data)->with('no', ($request->input('page', 1) - 1) * 10);
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
         $this->validate($request, [
            'nama_penerima' => 'required',
            'no_tlp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            // 'kecematan' => 'required',
            'kelurahan' => 'required',
            'kodepos' => 'required',
            'alamat' => 'required',
        ]);

        $messages = [
            'nama_penerima.required' => 'We need to know your email address!',
        ];


        $itemuser = $request->user();//ambil data user yang sedang login
        $inputan = $request->all();//buat variabel dengan nama $inputan
        // var_dump($inputan);exit();
        // $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        if ($itemcart) {
            $itemorder = DetailOrder::where('user_id', $itemuser->id);
            if ($itemorder) {
                // buat variabel inputan order                
                $inputanorder['user_id'] = $itemuser->id;
                $inputanorder['cart_id'] = $itemcart->id;
                $inputanorder['nama_penerima'] = $request->nama_penerima;
                $inputanorder['no_tlp'] = $request->no_tlp;
                $inputanorder['provinsi'] = $request->provinsi;
                $inputanorder['kota'] = $request->kota;
                $inputanorder['kecamatan'] = $request->kecamatan;
                $inputanorder['kelurahan'] = $request->kelurahan;
                $inputanorder['kodepos'] = $request->kodepos;
                $inputanorder['alamat'] = $request->alamat;
               
                $itemorder = Order::create($inputanorder);//simpan order
                $itemdetail = DetailOrder::create($inputanorder);//simpan order
                // $itemdetail = DetailOrder::create($inputanorder);//simpan order
                // update status cart
                $itemcart->update(['status_cart' => 'checkout']);
                $data = array('title' => 'Alamat Pengiriman',
                        'itemorder' => $itemorder,
                        'itemdetail' => $itemdetail,
                        'itemcard'=>$itemuser);
                return redirect()->route('history.index')->with('alert', 'Order berhasil disimpan');
                // return view('pages.checkout', $data)->with('success', 'Order berhasil disimpan');
            } 
        } else {
            return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailOrder $detailOrder)
    {
        //
    }
}
