<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Str;
use App\Gallery;
use App\Product;
use Illuminate\Http\Request;
use Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gambar = Gallery::all();
        return view('admin.foto.index', ['gambar' => $gambar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.foto.create',['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/gallery', 'public');
        // $data['gambar'] = $request->file('gambar')->store('assets/gallery', 'public');


        Gallery::create($data);
        // session()->flash('pesan',"Data {$data['nama_gambar']} Berhasil Disimpan!");
        return redirect()->route('galleryadmin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $id)
    {
        $item = Gallery::findOrFail($id);
        $product = Product::all();

        return view('admin.foto.edit',[
            'item' => $item,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $tampung = $gallery->find($gallery->id);
        $data = $request->all();
        if($request->photo){
            Storage::delete('public/'.$tampung->photo);
            $data['photo'] = $request->file('photo')->store(
                'assets/gallery', 'public'
            );
        }

        // $item = Gallery::findOrFail($id);

        $tampung->update($data);
        $tampung->save();
        // session()->flash('pesan',"Data {$data['nama_gambar']} Berhasil Di Edit!");
        return redirect()->route('galleryadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery, $id)
    {
        $item = Gallery::findorFail($id);
        $item->delete();
        // session()->flash('pesan',"Data {$item['nama_gambar']} Berhasil Di Hapus!");
        return redirect()->route('galleryadmin.index');
    }
}
