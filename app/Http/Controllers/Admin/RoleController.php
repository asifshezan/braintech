<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $rol = Role::where('role_status',1)->orderBy('role_id','DESC')->get();
        return view('admin.role.all', compact('rol'));
    }

    public function add(){
        return view('admin.role.add');
    }

    public function edit($role_id){
        $data = Role::where('role_status',1)->where('role_id',$role_id)->firstOrFail();
        return view('admin.role.edit', compact('data'));
    }

    public function view($role_id){
        $data = Role::where('role_status',1)->where('role_id',$role_id)->firstOrFail();
        return view('admin.role.view', compact('data'));
    }

    public function insert(Request $request){

        $slug = Str::slug($request['role_name'], '-');
        $insert=Role::insertGetId([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'role_status' => 1,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if($insert){
            Session::flash('success','Successfully registration completed.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Registration failed.');
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $id = $request['id'];
        $slug = Str::slug($request['role_name'], '-');
        $update = Role::where('role_id',$id)->update([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success', 'Successfully update role information.');
            return redirect('dashboard/role/view/'.$id);
        }else{
            Session::flash('error', 'Opps! failed update.');
            return redirect('dashboard/role/edit/'.$id);
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Role::where('role_status',1)->where('role_id',$id)->update([
            'role_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            Session::flash('success','Successfully Delete.');
            return redirect('dashboard/role');
        }else{
            Session::flash('error','Oppps! Failed Delete.');
            return redirect('dashboard/role');
        }
    }

}
