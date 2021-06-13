<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductPurchase;
use Illuminate\Support\Str;
use App\Product;
use Carbon\Carbon;
use Session;
use Auth;

class ProductPurchaseController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ProductPurchase::where('purchase_status',1)->orderBy('purchase_id','DESC')->get();
        return view('admin.product-purchase.all',compact('all'));
    }

    public function add(){
        $proPurchase=Product::where('product_status',1)->orderBy('product_id','DESC')->get();
        return view('admin.product-purchase.add',compact('proPurchase'));
    }

    public function edit($slug){
        $proPurchase=Product::where('product_status',1)->orderBy('product_id','DESC')->get();
        $data=ProductPurchase::where('purchase_status',1)->where('purchase_slug',$slug)->firstOrFail();
        return view('admin.product-purchase.edit',compact('data','proPurchase'));
    }

    public function view($slug){
        $data=ProductPurchase::where('purchase_status',1)->where('purchase_slug',$slug)->firstOrFail();
        return view('admin.product-purchase.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'product'=>'required',
            'quantity'=>'required|integer',
            'unitprice'=>'required|integer',
            'date'=>'required',
            'brand'=>'required',
            'supplier'=>'required',
        ],[]);

        $slugTitle=Str::slug($request['product'],'-'); //slug e product-name name dorbo kivabe???
        $slug=time().'-'.$slugTitle;
        $creator=Auth::user()->id;

        $insert=ProductPurchase::insertGetId([
            'product_id'=>$request['product'],
            'purchase_quantity'=>$request['quantity'],
            'purchase_unit_price'=>$request['unitprice'],
            'purchase_sub_price'=>$request['subprice'],
            'purchase_discount'=>$request['discountprice'],
            'purchase_total_price'=>$request['totalprice'],
            'purchase_date'=>$request['date'],
            'purchase_brand'=>$request['brand'],
            'purchase_supplier'=>$request['supplier'],
            'purchase_chalan'=>$request['chalan'],
            'purchase_voucher'=>$request['voucher'],
            'purchase_slug'=>$slug,
            'purchase_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/product/purchase/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/purchase/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'product'=>'required',
            'quantity'=>'required|integer',
            'unitprice'=>'required|integer',
            'date'=>'required',
            'supplier'=>'required',
        ],[]);

        $id=$request['id'];
        $pslug=$request['slug'];
        $slugTitle=Str::slug($request['product'],'-'); //slug e product-name name dorbo kivabe???
        $slug=time().'-'.$slugTitle;

        $update=ProductPurchase::where('purchase_id',$id)->update([
            'product_id'=>$request['product'],
            'purchase_quantity'=>$request['quantity'],
            'purchase_unit_price'=>$request['unitprice'],
            'purchase_total_price'=>$request['totalprice'],
            'purchase_date'=>$request['date'],
            'purchase_brand'=>$request['brand'],
            'purchase_supplier'=>$request['supplier'],
            'purchase_chalan'=>$request['chalan'],
            'purchase_voucher'=>$request['voucher'],
            'purchase_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success','value');
            return redirect('dashboard/product/purchase/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/purchase/edit/'.$pslug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelete=ProductPurchase::where('purchase_status',1)->where('purchase_id',$id)->update([
            'purchase_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success_soft','value');
            return redirect('dashboard/product/purchase');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/purchase');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=ProductPurchase::where('purchase_status',0)->where('purchase_id',$id)->update([
            'purchase_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/product/purchase');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/product/purchase');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=ProductPurchase::where('purchase_status',0)->where('purchase_id',$id)->delete();
        if($delete){
            Session::flash('delete','value');
            return redirect('dashboard/product/purchase/delete');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/product/purchase/delete');
        }
    }
}
