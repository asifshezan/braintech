<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Service::where('service_status',1)->orderBy('service_id','DESC')->get();
        return view('admin.service.all', compact('all'));
    }

    public function add(){
        return view('admin.service.add');
    }

    public function edit($service_id){
        $data = Service::where('service_status',1)->where('service_id',$service_id)->firstOrFail();
        return view('admin.service.edit', compact('data'));
    }


    public function view($service_id){
        $data = Service::where('service_status',1)->where('service_id',$service_id)->firstOrFail();
        return view('admin.service.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'service_title' => ['required', 'string', 'max:100'],
            'service_subtitle' => ['required', 'string', 'max:100'],
        ],[
            'service_title.required' => 'Please enter service name.',
            'service_subtitle.required' => 'Please enter service subtitle.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'Ser'.'-'. uniqid();

        $insert = Service::insertGetId([
            'service_title' => $request['service_title'],
            'service_subtitle' => $request['service_subtitle'],
            'service_icon' => $request['service_icon'],
            'service_order' => $request['service_order'],
            'service_details' => $request['service_details'],
            'service_url' => Str::slug($request['service_title'], '-'),
            'service_feature' => 1,
            'service_publish' => 1,
            'service_creator' => $creator,
            'service_slug' => $slug,
            'service_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,210) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/services/'.$imageName);

            Service::where('service_id',$insert)->update([
                'service_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert service information.');
            return redirect('dashboard/service/add');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/service/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'service_title' => ['required', 'string', 'max:100'],
            'service_subtitle' => ['required', 'string', 'max:100'],
        ],[
            'service_title.required' => 'Please enter service name.',
            'service_subtitle.required' => 'Please enter service subtitle.',
        ]);

        $service_id = $request['service_id'];
        $editor = Auth::user()->id;
        $update = Service::where('service_id',$service_id)->update([
            'service_title' => $request['service_title'],
            'service_subtitle' => $request['service_subtitle'],
            'service_icon' => $request['service_icon'],
            'service_order' => $request['service_order'],
            'service_details' => $request['service_details'],
            'service_editor' => $editor,
            'service_url' => Str::slug($request['service_title'], '-'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $service_id . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/services/'.$imageName);

            Service::where('service_id',$service_id)->update([
                'service_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        }

        if($update){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/service');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/service/edit');
        }
    }

    public function softdelete(){
        $service_id = $_POST['modal_id'];
        $softdelete = Service::where('service_status',1)->where('service_id',$service_id)->update([
            'service_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/service');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/service');
        }

    }

    public function restore(){

    }

    public function delete(){

    }
}
