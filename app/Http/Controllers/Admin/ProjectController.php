<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Project::where('pro_status',1)->orderBy('pro_id','DESC')->get();
        return view('admin.project.all', compact('all'));
    }

    public function add(){
        return view('admin.project.add');
    }

    public function edit($slug){
        $data = Project::where('pro_status',1)->where('pro_slug',$slug)->firstOrFail();
        return view('admin.project.edit', compact('data'));
    }

    public function view($slug){
        $data = Project::where('pro_status',1)->where('pro_slug',$slug)->firstOrFail();
        return view('admin.project.view', compact('data'));
    }


    public function insert(Request $request){

        $this->validate($request,[
            'pro_title' => ['required','string'],
        ],[
            'pro_title.required' => 'Please enter project title.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'Project' .'-'. uniqid();

        $insert = Project::insertGetId([
            'pro_title' => $request['pro_title'],
            'pro_url' => $request['pro_url'],
            'pro_order' => $request['pro_order'],
            'pro_remarks' => $request['pro_remarks'],
            'procate_id' => $request['procate_id'],
            'pro_slug' => $slug,
            'pro_creator' => $creator,
            'pro_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/projects/'.$imageName);

            Project::where('pro_id',$insert)->update([
                'pro_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

         if($insert){
             Session::flash('success','Successfully insert project information.');
             return redirect()->back();
         }else{
             Session::flash('error','Opps! Failed insert.');
             return redirect()->back();
         }

    }

    public function update(Request $request){
        $this->validate($request,[
            'pro_title' => ['required','string'],
        ],[
            'pro_title.required' => 'Please enter project title.',
        ]);

        $project_id = $request['pro_id'];
        $editor = Auth::user()->id;

        $update = Project::where('pro_status',1)->where('pro_id',$project_id)->update([
            'pro_title' => $request['pro_title'],
            'pro_url' => $request['pro_url'],
            'pro_order' => $request['pro_order'],
            'procate_id' => $request['procate_id'],
            'pro_remarks' => $request['pro_remarks'],
            'pro_image' => $request['pro_image'],
            'pro_editor' => $editor,
            'pro_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pro_image')){
            $image = $request->file('pro_image');
            $imageName = $project_id . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/projects/'.$imageName);

            Project::where('pro_id',$project_id)->update([
                'pro_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
         }

         if($update){
             Session::flash('success','Successfully insert project information.');
             return redirect('dashboard/project');
         }else{
             Session::flash('error','Opps! Failed insert.');
             return redirect('dashboard/project/edit');
         }
    }
    public function softdelete(){
        $project_id = $_POST['modal_id'];
        $soft = Project::where('pro_status',1)->where('pro_id',$project_id)->update([
            'pro_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully deleted.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps!failed.');
            return redirect()->back();
        }
    }


    public function restore(){

    }
    public function delete(){

    }
}
