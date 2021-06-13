<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model{
    protected $primaryKey='purchase_id';

    public function proPurchase(){
        return $this->belongsTO('App\Product','product_id','product_id');
    }
}
