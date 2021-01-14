<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Size;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $product = Product::all();
        return view('admin.shop.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $daftar_size = Size::all();
        // return view('create', compact('bagians','daftar_hobi'));
        return view('admin.shop.create', ['category' => $category, 'daftar_size' => $daftar_size]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'desc' => 'required',
            ]);

            // dd($product);
            
        $product = Product::create($validateData);
        $product->size()->attach($request->size);
        // dd($product);
        // session()->flash('pesan',"Data {$data['nama_gambar']} Berhasil Disimpan!");
        return redirect('/admin/productadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        $daftar_size = Size::all();
        return view('admin.shop.edit',[
            'product' => $product,
            'category' => $category,
            'daftar_size' => $daftar_size ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Category $category, Size $daftar_size)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            // 'size_id' => 'required',
            'price' => 'required',
            'desc' => 'required',
            ]);
            // dd($request->all());

        // $product = $request->all();
        $product = new Product;
        $category = Category::all();
        $daftar_size = Size::all();
        $product->find($request->id)->update($validateData);
        $product->save();
        $product->size()->sync($request->daftar_size);   
        // session()->flash('pesan',"Data {$data['nama_gambar']} Berhasil Di Edit!");
        return redirect()->route('productadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findorFail($id);
        $item->delete();
        // session()->flash('pesan',"Data {$item['nama_produk']} Berhasil Di Hapus!");
        return redirect()->route('productadmin.index');
    }
}
