<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','name','category_id','price','produk_id','size','desc','photo'];

    public function cart(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function size(){
        return $this->belongsToMany(Size::class,'size_products','product_id','size_id');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class,'product_id','id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'product_id', 'id');
    }
    
}
