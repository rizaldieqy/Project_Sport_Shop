<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Transaction;
use App\User;
use App\Product;
use Auth;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $transaction = Transaction::all();
        $cart = Cart::with(['product'])->get();
        $users = User::where('name')->get();
        // $products = Product::with(['cart'])->get();
        
        return view('user.checkout.index', compact('transaction','cart','users'));
    }

    public function store(Request $request){
        $carts = Cart::where('user_id',Auth::user()->id);   

        $cartUser = $carts->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'product_id' => $carts->first()->product_id,
            'size_id' => $carts->first()->size_id,
            'cart_id' => $carts->first()->cart_id,
            'total' => '1000'
        ]);

        // $transaction->collect($carts)->sum(function($q){
        //     return $q['price'] * $q['qty'];
        // });
        // $subtotal collect($carts)->sum(function($q) {
        //     return $q['price'] * $q['qty'];
        // });

        // $total += ($cart->product->price * $cart->qty);

        foreach($cartUser as $cart){
            $transaction->detail()->create([
                'product_id' => $cart->product_id,
                'qty' => $cart->qty
            ]);
        }

        $carts->delete();
        return redirect('/checkout');
    }
}
