<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gallery extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'product_id', 'photo'];

    public function data(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
