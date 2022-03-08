<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all=User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all', compact('all'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function edit($id){

        $data = User::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.user.edit',compact('data'));
    }

    public function view($id){
        $data=User::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.user.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=> ['required']
        ],[
            'name.required'=>'Please enter your name.',
            'role.required'=>'Please select user role.',
        ]);

        $insert=User::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'role'=>$request['role'],
            'password'=>Hash::make($request['password']),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName = $insert . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/users/'.$imageName);

            User::where('id', $insert)->update([
                'photo'=>$imageName,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully registration completed.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Registration failed.');
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $id=$request['id'];
        $this->validate($request,[
            'name'=>'required|string|max:200',
            'email'=>'required|string|email|max:255|unique:users,id,'.$id.',email',
            'role'=>'required',
        ],[
            'name.required'=>'Please enter name.',
            'role.required'=>'Please select a role.',
        ]);

        $update=User::where('id',$id)->update([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'role'=>$request['role'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName=$id.'_'.time().'_'.rand(112000,11112000).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/users/'.$imageName);

            User::where('id',$id)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        if($update){
            Session::flash('success','Successfully Update User information.');
            return redirect('dashboard/user/view/'.$id);
        }else{
            Session::flash('error','Opps!! Failded Update.');
            return redirect('dashboard/user/edit/'.$id);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=User::where('status',1)->where('id',$id)->update([
          'status'=>'0',
          'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
          Session::flash('success','Successfully delete user information.');
          return redirect('dashboard/user');
        }else{
          Session::flash('error','Opps! delete failed.');
          return redirect('dashboard/user/edit');
        }
      }

    public function restore(){

    }

    public function delete(){

    }
}
