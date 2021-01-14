<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Gallery;
use App\Size;

class ShopController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(Request $request, $id = null){
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(6);
        $gambar = Gallery::where('photo')->get();
        return view('user.shop.index', compact('products','categories','id','gambar'));
    }

    public function category($id){
        $categories = Category::all();
        $products = Product::where('category_id',$id)->paginate(6);
        return view('user.shop.index', compact('categories','products','id'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        $daftar_size = Size::all();
        return view('user.shop.show', compact('product'));
    }

    public function store(Request $request){
        
    }
}
