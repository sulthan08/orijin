<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemgambar = Image::where('user_id', $itemuser->id)->paginate(20);
        $data = array('title' => 'Data Image',
                    'itemgambar' => $itemgambar);
        return view('admin.image.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $itemuser = $request->user();
        $fileupload = $request->file('image');
        $folder = 'assets/storage';
        $itemgambar = $this->upload($fileupload, $itemuser, $folder);
        // $inputan = $request->all();
        // $inputan['user_id'] = $itemuser->id;
        // Image::create($inputan);
        return back()->with('success', 'Image berhasil diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request, $id)
    {
        $itemuser = $request->user();
        $itemgambar = Image::where('user_id', $itemuser->id)
                            ->where('id', $id)
                            ->first();
        if ($itemgambar) {
            \Storage::delete($itemgambar->url);
            $itemgambar->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function upload($fileupload, $itemuser, $folder) {
        $path = $fileupload->store('files');
        $inputangambar['url'] = $path;
        $inputangambar['user_id'] = $itemuser->id;
        return Image::create($inputangambar);
    }
}
