<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $primaryKey='product_id';

    public function productCate(){
        return $this->belongsTo('App\ProductCategory','procate_id','procate_id');
    }
}
