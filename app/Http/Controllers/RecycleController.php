<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecycleController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.recycle.index');
    }

    public function user(){
        return view('admin.recycle.user');
    }

    public function empolyee(){
        return view('admin.recycle.employee');
    }

    public function product(){
        return view('admin.recycle.product');
    }

    public function productCategory(){
        return view('admin.recycle.product-category');
    }

    public function productpurchase(){
        return view('admin.recycle.product-purchase');
    }

    public function productrequisition(){
        return view('admin.recycle.product-requisition');
    }

    public function productDistribution(){
        return view('admin.recycle.product-distribution');
    }

}
