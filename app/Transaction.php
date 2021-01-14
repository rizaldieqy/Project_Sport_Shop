<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function detail(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class,'cart_id','id');
    }
}
