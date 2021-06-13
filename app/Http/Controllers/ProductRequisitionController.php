<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductRequisition;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ProductRequisitionController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ProductRequisition::where('pr_status',1)->where('pr_requisition_status',0)->orderBy('pr_id','DESC')->get();
        return view('admin.requisition.all',compact('all'));
    }

    public function view($slug){
        $data=ProductRequisition::where('pr_status',1)->where('pr_slug',$slug)->firstOrFail();
        return view('admin.requisition.view',compact('data'));
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=ProductRequisition::where('pr_status',1)->where('pr_id',$id)->update([
            'pr_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/product/requisition');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/product/requisition');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=ProductRequisition::where('pr_status',0)->where('pr_id',$id)->update([
            'pr_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/product/requisition');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product/requisition');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=ProductRequisition::where('pr_status',0)->where('pr_id',$id)->delete();

        if($delete){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/product/requisition');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product/requisition');
        }
    }
}
