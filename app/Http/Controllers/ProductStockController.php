<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductPurchase;
use App\ProductRequisition;
use App\ProductDistribution;
use App\ProductDamage;
use Carbon\Carbon;
use Session;
use Auth;

class ProductStockController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Product::where('product_status',1)->orderBy('product_name','ASC')->get();
        return view('admin.product-stock.all',compact('all'));
    }

    public function view($slug){
        $data=Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
        return view('admin.product-stock.view',compact('data'));
    }
}
