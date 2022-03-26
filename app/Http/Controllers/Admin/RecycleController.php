<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\ProjectCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RecycleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Banner Recycle
    public function recycle_banner(){
        $allban = Banner::where('ban_status',0)->orderBy('ban_id','ASC')->get();
        return view('admin.recycle.recycle_banner', compact('allban'));
    }

    public function banner_restore($slug){
        $restore = Banner::where('ban_status',0)->where('ban_slug',$slug)->update([
            'ban_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('success','Successfully restore');
            return redirect('dashboard/banner');
        }else{
            Session::flash('error','Opps!! Failed update.');
            return redirect()->back();
        }
    }

    public function banner_delete(){
        $id = $_POST['modal_id'];
        $delete = Banner::where('ban_status',0)->where('ban_id',$id)->delete();

        if($delete){
            Session::flash('success','Successfully Delete');
            return redirect('dashboard/banner/recycle_banner');
        }else{
            Session::flash('error','Opps!! Failed Delete.');
            return redirect('dashboard/banner/recycle_banner');
        }
    }


    // Service Recycle
    public function recycle_service(){
        $allser = Service::where('service_status',0)->orderBy('service_id','ASC')->get();
        return view('admin.recycle.recycle_service', compact('allser'));
    }

    public function service_restore($slug){
        $restore_ser = Service::where('service_status',0)->where('service_slug',$slug)->update([
            'service_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($restore_ser){
            Session::flash('success','Successfully restore');
            return redirect('dashboard/service');
        }else{
            Session::flash('error','Opps!! Failed update.');
            return redirect()->back();
        }
    }


    public function service_delete(){
        $id = $_POST['modal_id'];
        $delete_ser = Service::where('service_status',0)->where('service_id',$id)->delete();

        if($delete_ser){
            Session::flash('success','Successfully Delete');
            return redirect('dashboard/service/recycle_service');
        }else{
            Session::flash('error','Opps!! Failed Delete.');
            return redirect('dashboard/service/recycle_service');
        }

    }


    // Project Recycle

    public function recycle_project(){
        $allpro = Project::where('pro_status',0)->orderBy('pro_id','ASC')->get();
        return view('admin.recycle.recycle_project', compact('allpro'));
    }

    public function project_restore($slug){
        $restore = Project::where('pro_status',0)->where('pro_slug',$slug)->update([
            'pro_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('success','Successfully restore');
            return redirect('dashboard/project');
        }else{
            Session::flash('error','Opps!! Failed update.');
            return redirect()->back();
        }

    }

    public function project_delete(){
        $id = $_POST['modal_id'];
        $delete = Project::where('pro_status',0)->where('pro_id',$id)->delete();

        if($delete){
            Session::flash('success','Successfully Delete');
            return redirect('dashboard/recycle/project');
        }else{
            Session::flash('error','Opps!! Failed Delete.');
            return redirect('dashboard/recycle/project');
        }

    }


    // Testimonial Recycle

    public function recycle_testimonial(){
        $allTes = Testimonial::where('test_status',0)->orderBy('test_id','ASC')->get();
        return view('admin.recycle.recycle_testimonial', compact('allTes'));
    }

    public function test_restore($slug){
        $restore = Testimonial::where('test_status',0)->where('test_slug',$slug)->update([
            'test_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('success','Successfully restore');
            return redirect('dashboard/testimonial');
        }else{
            Session::flash('error','Opps!! Failed update.');
            return redirect()->back();
        }
    }

    public function test_delete(){
        $id = $_POST['modal_id'];
        $delete = Testimonial::where('test_status',0)->where('test_id',$id)->delete();

        if($delete){
            Session::flash('success','Successfully Delete');
            return redirect('dashboard/recycle/project');
        }else{
            Session::flash('error','Opps!! Failed Delete.');
            return redirect('dashboard/recycle/project');
        }
    }
}
