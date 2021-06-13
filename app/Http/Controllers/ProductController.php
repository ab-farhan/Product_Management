<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\ProductCategory;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ProductController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Product::where('product_status',1)->orderBy('product_id','DESC')->get();
        return view('admin.product.all',compact('all'));
    }

    public function add(){
        $procate=ProductCategory::where('procate_status',1)->orderBy('procate_id','DESC')->get();
        return view('admin.product.add',compact('procate'));
    }

    public function edit($slug){
        $procate=ProductCategory::where('procate_status',1)->orderBy('procate_id','DESC')->get();
        $data=Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
        return view('admin.product.edit',compact('data','procate'));
    }

    public function view($slug){
        $data=Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
        return view('admin.product.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'procate'=>'required',
        ],[

        ]);

        $slugTitle=Str::slug($request['name'],'-');
        $slug=time().$slugTitle;
        $creator=Auth::user()->id;

        $insert=Product::insertGetId([
            'product_name'=>$request['name'],
            'procate_id'=>$request['procate'],
            'product_details'=>$request['details'],
            'product_remarks'=>$request['remarks'],
            'product_slug'=>$slug,
            'product_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='Product'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/product/'.$imageName));
            Product::where('product_id',$insert)->update([
                'product_image'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/product/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'procate'=>'required',
        ],[

        ]);

        $pslug=$request['slug'];
        $id=$request['id'];
        $slugTitle=Str::slug($request['name'],'-');
        $slug=time().$slugTitle;

        $update=Product::where('product_status',1)->where('product_id',$id)->update([
            'product_name'=>$request['name'],
            'procate_id'=>$request['procate'],
            'product_details'=>$request['details'],
            'product_remarks'=>$request['remarks'],
            'product_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='Product'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/product/'.$imageName));
            Product::where('product_id',$id)->update([
                'product_image'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/product/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/product/edit/'.$plug);
        }

    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelete=Product::where('product_status',1)->where('product_id',$id)->update([
            'product_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success_soft','value');
            return redirect('dashboard/product/');
        }else{
            Session::flash('error_soft','value');
            return redirect('dashboard/product/');
        }

    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Product::where('product_status',0)->where('product_id',$id)->update([
            'product_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/product');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=Product::where('product_status',0)->where('product_id',$id)->delete();

        if($delete){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/product');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/product');
        }
    }
}
