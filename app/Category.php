<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;
    protected $fillable = ['id','name_category'];

    public function product(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
