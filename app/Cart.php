<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}
