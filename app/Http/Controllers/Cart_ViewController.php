<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Gallery;
use App\Product;
use App\Size;

class Cart_ViewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $gambar = Gallery::where('photo')->get();
        $products = Product::where('name')->get();
        // $daftar_size = Size::where('size_id')->get();
        return view('user.cart.index', compact('carts','gambar'));
    }

    public function store(Request $request){
        dd($request->all());
        $duplicate = Cart::where('product_id',$request->product_id)->first();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        // $subtotal = collect($carts)->sum(function($q) {
        //     return $q['price'] * $q['qty'];
        // });

        if($duplicate){
            return redirect('/cart')->with('error','Barang Sudah Terdapat di Dalam Cart');
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->size,
            'size_id' => $request->size,
        ]);

        

        return redirect('/cart')->with('success', 'Berhasil Menambahkan Barang di Cart');
    }

    public function update(Request $request, $id){
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        $item = Cart::findorFail($id);
        $item->delete();
        return redirect('/cart');
    }
}
