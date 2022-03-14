<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cat = ProjectCategory::where('procate_status',1)->orderBy('procate_order','ASC')->get();
        return view('admin.project-category.all', compact('cat'));
    }

    public function add(){
        return view('admin.project-category.add');
    }

    public function edit($slug){
        $data = ProjectCategory::where('procate_status',1)->where('procate_slug',$slug)->firstOrFail();
        return view('admin.project-category.edit', compact('data'));
    }

    public function view($slug){
        $data = ProjectCategory::where('procate_status',1)->where('procate_slug',$slug)->firstOrFail();
        return view('admin.project-category.view', compact('data'));
    }

    public function insert(Request $request){

        $creator = Auth::user()->name;
        $slug = str::slug($request['procate_name'], '-');
        $insert=ProjectCategory::insertGetId([
            'procate_name' => $request['procate_name'],
            'procate_order' => $request['procate_order'],
            'procate_remarks' => $request['procate_remarks'],
            'procate_slug' => $slug,
            'procate_creator' => $creator,
            'procate_status' => 1,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if($insert){
            Session::flash('success','Successfully insert category.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Registration failed.');
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $id = $request['procate_id'];
        $editor = Auth::user()->name;
        $slug = str::slug($request['procate_name'], '-');
        $update = ProjectCategory::where('procate_status',1)->where('procate_id',$id)->update([
            'procate_name' => $request['procate_name'],
            'procate_order' => $request['procate_order'],
            'procate_remarks' => $request['procate_remarks'],
            'procate_slug' => $slug,
            'procate_editor' => $editor,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if($update){
            Session::flash('success','Successfully update category.');
            return redirect('dashboard/project-category/view/'.$slug);
        }else{
            Session::flash('error','Opps! Registration failed.');
            return redirect()->back();
        }
    }


    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = ProjectCategory::where('procate_status',1)->where('procate_id',$id)->update([
            'procate_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            Session::flash('success','Successfully Delete.');
            return redirect('dashboard/project-category');
        }else{
            Session::flash('error','Oppps! Failed Delete.');
            return redirect('dashboard/project-category');
        }
    }

    public function restore(){

    }

}
