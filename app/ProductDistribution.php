<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDistribution extends Model{
    public function employeeInfo(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function productInfo(){
        return $this->belongsTo('App\Product','product_id','product_id');
    }
}
