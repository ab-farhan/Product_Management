<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductRequisition;
use App\ProductDistribution;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ProductDistributionController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ProductDistribution::where('pd_status',1)->orderBy('pd_id','DESC')->get();
        return view('admin.distribution.all',compact('all'));
    }

    public function request($slug){
        $data=ProductRequisition::where('pr_status',1)->where('pr_requisition_status',0)->where('pr_code',$slug)->firstOrFail();
        return view('admin.distribution.add',compact('data'));
    }

    public function view($slug){
        $data=ProductDistribution::where('pd_status',1)->where('pd_slug',$slug)->firstOrFail();
        return view('admin.distribution.view',compact('data'));
    }

    public function request_insert(Request $request){
        $this->validate($request,[
            'employee'=>'required',
            'product'=>'required',
            'quantity'=>'required',
            'chalan'=>'required',
        ],[
            'employee.required'=>'Please enter employee name!',
            'product'=>'Please enter product name!',
            'qunatity'=>'Please enter qunatity name!',
            'chalan'=>'Please select chalan name!',
        ]);

        $creator=Auth::user()->id;
        $id=$request->id;
        $prslug=$request->prslug;
        $employee=$request->employee;
        $today=Carbon::now()->toDateTimeString();
        $year=date('Y', strtotime($today));
        $slug='PD'.uniqid();
        $insert=ProductDistribution::insertGetId([
            'user_id'=>$employee,
            'pr_id'=>$id,
            'product_id'=>$request->product,
            'pd_quantity'=>$request->quantity,
            'pd_chalan'=>$request->chalan,
            'pd_remarks'=>$request->remarks,
            'pd_creator'=>$creator,
            'pd_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        $distributionNumber='PD'.$year.$employee.$insert;
        ProductDistribution::where('pd_id',$insert)->update([
            'pd_code'=>$distributionNumber,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        ProductRequisition::where('pr_id',$id)->update([
            'pr_requisition_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success_requis','value');
            return redirect('dashboard/product/requisition');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/distribution/request/'.$prslug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=ProductDistribution::where('pd_status',1)->where('pd_id',$id)->update([
            'pd_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/product/distribution');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/product/distribution');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=ProductDistribution::where('pd_status',0)->where('pd_id',$id)->update([
            'pd_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/product/distribution');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product/distribution');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=ProductDistribution::where('pd_status',0)->where('pd_id',$id)->delete();

        if($delete){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/product/distribution');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product/distribution');
        }
    }
}
