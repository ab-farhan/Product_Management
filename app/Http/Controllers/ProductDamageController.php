<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\ProductDamage;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ProductDamageController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ProductDamage::where('damage_status',1)->orderBy('damage_id','DESC')->get();
        return view('admin.damage.all',compact('all'));
    }

    public function add(){
        return view('admin.damage.add');
    }

    public function edit($slug){
        $data=ProductDamage::where('damage_status',1)->where('damage_slug',$slug)->firstOrFail();
        return view('admin.damage.edit',compact('data'));
    }

    public function view($slug){
        $data=ProductDamage::where('damage_status',1)->where('damage_slug',$slug)->firstOrFail();
        return view('admin.damage.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'product'=>'required',
            'chalan'=>'required',
            'quantity'=>'required',
        ],[]);
        $slug='PDa'.uniqid();
        $creator=Auth::user()->id;
        $insert=ProductDamage::insertGetId([
            'product_id'=>$request['product'],
            'damage_quantity'=>$request['quantity'],
            'damage_chalan'=>$request['chalan'],
            'damage_remarks'=>$request['remarks'],
            'damage_slug'=>$slug,
            'damage_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success');
            return redirect('dashboard/product/damage/add');
        }else{
            Session::flash('error');
            return redirect('dashboard/product/damage/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'product'=>'required',
            'chalan'=>'required',
            'quantity'=>'required',
        ],[]);

        $id=$request['id'];
        $slug=$request['slug'];

        $update=ProductDamage::where('damage_id',$id)->update([
            'product_id'=>$request['product'],
            'damage_chalan'=>$request['chalan'],
            'damage_quantity'=>$request['quantity'],
            'damage_remarks'=>$request['remarks'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success');
            return redirect('dashboard/product/damage/edit/'.$slug);
        }else{
            Session::flash('error');
            return redirect('dashboard/product/damage/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=ProductDamage::where('damage_status',1)->where('damage_id',$id)->update([
            'damage_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/product/damage');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/product/damage');
        }
    }
}
