<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['id','jenis_size'];

    public function product(){
        return $this->belongsToMany(Product::class,'size_products','size_id','product_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'cart_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'size_id', 'id');
    }
}
