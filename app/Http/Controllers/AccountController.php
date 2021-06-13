<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProductRequisition;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class AccountController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return redirect('dashboard/account/profile');
    }

    public function profile(){
        $user=Auth::user()->id;
        $data=User::where('status',1)->where('id',$user)->firstOrFail();
        return view('admin.account.profile',compact('data'));
    }

    public function requisition_insert(Request $request){
        $this->validate($request,[
            'procate'=>'required',
            'product'=>'required',
            'quantity'=>'required',
        ],[
            'procate.required'=>'The product category field is required.',
            'product.required'=>'The product name field is required.',
            'quantity.required'=>'The product quantity field is required.',
            
        ]);
        $user=Auth::user()->id;
        $today=Carbon::now()->toDateTimeString();
        $year=date('Y', strtotime($today));
        $slug='PR'.uniqid();
        $insert=ProductRequisition::insertGetId([
            'user_id'=>$user,
            'product_id'=>$request->product,
            'pr_quantity'=>$request->quantity,
            'pr_remarks'=>$request->remarks,
            'pr_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        $requisitionNumber='PR'.$year.$user.$insert;
        ProductRequisition::where('pr_id',$insert)->update([
            'pr_code'=>$requisitionNumber,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success_requis','value');
            return redirect('dashboard/account/profile');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/account/profile');
        }
    }
}
