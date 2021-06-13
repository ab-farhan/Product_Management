<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ProductCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ProductCategory::where('procate_status',1)->orderBy('procate_id','DESC')->get();
        return view('admin.product-category.all',compact('all'));
    }

    public function add(){
        return view('admin.product-category.add');
    }

    public function edit($slug){
        $data=ProductCategory::where('procate_status',1)->where('procate_slug',$slug)->firstOrFail();
        return view('admin.product-category.edit',compact('data'));
    }

    public function view($slug){
        $data=ProductCategory::where('procate_status',1)->where('procate_slug',$slug)->firstOrFail();
        return view('admin.product-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:product_categories,procate_name',
        ],[
            
        ]);
        
        $slug='PC'.uniqid();
        $creator=Auth::user()->id;

        $insert=ProductCategory::insertGetId([
            'procate_name'=>$request['name'],
            'procate_remarks'=>$request['remarks'],
            'procate_slug'=>$slug,
            'procate_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='Pro_cate_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/product-category/'.$imageName));
            ProductCategory::where('procate_id',$insert)->update([
                'procate_image'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/product/category/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ],[

        ]);

        $id=$request['id'];
        $slug=$request['slug'];

        $update=ProductCategory::where('procate_status',1)->where('procate_id',$id)->update([
            'procate_name'=>$request['name'],
            'procate_remarks'=>$request['remarks'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='Pro_cate_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/product-category/'.$imageName));
            ProductCategory::where('procate_id',$id)->update([
                'procate_image'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);

            if($update){
                Session::flash('success','value');
                return redirect('dashboard/product/category/edit/'.$slug);
            }else{
                Session::flash('error','value');
                return redirect('dashboard/product/category/edit/'.$slug);
            }
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelet=ProductCategory::where('procate_status',1)->where('procate_id',$id)->update([
            'procate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        if($softdelet){
            Session::flash('success_soft','value');
            return redirect('dashboard/product/category');
        }else{
            Session::flash('error_soft','value');
            return redirect('dashboard/product/category');
        }

    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=ProductCategory::where('procate_status',0)->where('procate_id',$id)->update([
            'procate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/product/category');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product/category');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=ProductCategory::where('procate_status',0)->where('procate_id',$id)->delete();

        if($delete){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/product/category');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product/category');
        }
    }
    
}
