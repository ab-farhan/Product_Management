<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class EmployeeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=User::where('status',1)->where('role_id',7)->orderBy('id','DESC')->get();
        return view('admin.employee.all',compact('all'));
    }

    public function add(){
        return view('admin.employee.add');
    }

    public function edit($slug){
        $data=User::where('status',1)->where('role_id',7)->where('slug',$slug)->firstOrFail();
        return view('admin.employee.edit',compact('data'));
    }

    public function view($slug){
        $data=User::where('status',1)->where('role_id',7)->where('slug',$slug)->firstOrFail();
        return view('admin.employee.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'phone'=>'required',
            'designation'=>'required',
            'employee_id'=>'required',
        ],[
            'name.required'=>'Please enter employee name!',
            'email.required'=>'Please enter employee email address!',
            'password.required'=>'Please enter password!',
            'phone.required'=>'Please enter employee phone number!',
            'designation.required'=>'Please enter employee designation!',
            'employee_id.required'=>'Please enter employee ID!',
        ]);

        $slug='EMP'.uniqid();
        $creator=Auth::user()->id;
        $insert=User::insertGetId([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password' =>Hash::make($request['password']),
            'designation'=>$request['designation'],
            'phone'=>$request['phone'],
            'employee_id'=>$request['employee_id'],
            'slug'=>$slug,
            'role_id'=>'7',
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save(base_path('public/uploads/users/'.$imageName));
            User::where('id',$insert)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/employee/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/employee/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'phone'=>'required',
        ],[

        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=User::where('status',1)->where('id',$id)->update([
            'name'=>$request['name'],
            'designation'=>$request['designation'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='user_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save(base_path('public/uploads/users/'.$imageName));
            User::where('id',$id)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        if($update){
            Session::flash('success','value');
            return redirect('dashboard/employee/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/employee/edit/'.$slug);
        }

    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $sofdelete=Employee::where('employee_status',1)->where('employee_id',$id)->update([
            'employee_status'=> 0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($sofdelete){
            Session::flash('success_soft','value');
            return redirect('dashboard/employee');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/employee');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Employee::where('employee_status',0)->where('employee_id',$id)->update([
            'employee_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/employee');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/recycle/employee');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=Employee::where('employee_status',0)->where('employee_id',$id)->delete();

        if($delete){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/employee');
        }else{
            Session::flash('delete','value');
            return redirect('dashboard/recycle/employee');
        }
    }
}
