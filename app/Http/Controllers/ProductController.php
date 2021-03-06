<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemproduk = Product::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Produk',
                    'itemproduk' => $itemproduk);
        return view('admin.data', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $data = array('title' => 'Form Produk Baru');
        return view('admin.tambahProduk', $data);
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
            'kode_produk' => 'required|unique:products',
            'name' => 'required',
            'ram' => 'required|numeric',
            'cpu' => 'required',
            'gpu' => 'required',
            'psu' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        $itemuser = $request->user();//ambil id user yang sedang login
        $input = $request->all();
        $input['user_id'] = $itemuser->id;
        $itemproduk = Product::create($input);

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemproduk = Product::findOrFail($id);
        $data = array('title' => 'Detail Produk',
                'itemproduk' => $itemproduk);
        return view('admin.detailProduk', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemproduk = Product::findOrFail($id);
        $data = array('title' => 'Form Edit Produk',
                'itemproduk' => $itemproduk);        
        return view('admin.editProduk', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_produk' => 'required',
            'name' => 'required',
            'ram' => 'required|numeric',
            'cpu' => 'required',
            'gpu' => 'required',
            'psu' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'deskripsi' => 'required'
        ]);
        
        $itemproduk = $request->except(['_token', '_method' ]);
        
        Product::where('id', $id)
                ->update($itemproduk);

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $itemproduk = Product::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
        if ($itemproduk->delete()) {
            return back()->with('success', 'Produk berhasil dihapus');
        } else {
            return back()->with('error', 'Produk gagal dihapus');
        }
    }

 public function uploadimage(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'produk_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduk = Product::where('user_id', $itemuser->id)
                                ->where('id', $request->produk_id)
                                ->first();
        if ($itemproduk) {
            $fileupload = $request->file('image');
            $folder = 'assets/images';
            $itemgambar = $this->upload($fileupload, $itemuser, $folder);
            // simpan ke table produk_images
            $inputan = $request->all();
            $inputan['foto'] = $itemgambar->url;//ambil url file yang barusan diupload
            // simpan ke produk image
            ProductImage::create($inputan);
            // update banner produk
            $itemproduk->update(['foto' => $itemgambar->url]);
            // end update banner produk
            return back()->with('success', 'Image berhasil diupload');
        } else {
            return back()->with('error', 'Kategori tidak ditemukan');
        }
    }

    public function deleteimage(Request $request, $id) {
        // ambil data produk image by id
        $itemprodukimage = ProductImage::findOrFail($id);
        // ambil produk by produk_id kalau tidak ada maka error 404
        $itemproduk = Product::findOrFail($itemprodukimage->produk_id);
        // kita cari dulu database berdasarkan url gambar
        $itemgambar = ProductImage::where('foto', $itemprodukimage->foto)->first();
        // hapus imagenya
        if ($itemgambar) {
            Storage::delete($itemgambar->foto);
            $itemgambar->delete();
        }
        // baru update hapus produk image
        $itemprodukimage->delete();
        //ambil 1 buah produk image buat diupdate jadi banner produk
        $itemsisaprodukimage = ProductImage::where('produk_id', $itemproduk->id)->first();
        if ($itemsisaprodukimage) {
            $itemproduk->update(['foto' => $itemsisaprodukimage->foto]);
        } else {
            $itemproduk->update(['foto' => null]);
        }
        //end update jadi banner produk
        return back()->with('success', 'Data berhasil dihapus');
    }

     public function upload($fileupload, $itemuser, $folder) {
        $path = $fileupload->store('public/files');
        $inputangambar['url'] = $path;
        $inputangambar['user_id'] = $itemuser->id;
        return Image::create($inputangambar);
    }
}
