<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDamage extends Model{
  
    public function productInfo(){
        return $this->belongsTo('App\Product','product_id','product_id');
    }
}
