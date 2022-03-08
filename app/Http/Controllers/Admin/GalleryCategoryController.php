<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GalleryCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = GalleryCategory::where('galcate_status',1)->orderBy('galcate_id','DESC')->get();
        return view('admin.gallery.category.all', compact('all'));
    }

    public function add(){
        return view('admin.gallery.category.add');
    }

    public function edit($slug){
        $data = GalleryCategory::where('galcate_status',1)->where('galcate_slug',$slug)->firstOrFail();
        return view('admin.gallery.category.edit', compact('data'));
    }

    public function view($slug){
        $data = GalleryCategory::where('galcate_status',1)->where('galcate_slug',$slug)->firstOrFail();
        return view('admin.gallery.category.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'galcate_name' => ['required', 'string'],
        ],[
            'galcate_name.required' => 'Please enter galcate_name.',
        ]);

        $creator = Auth::user()->name;
        $slug = 'GC' .'.'. uniqid();

        $insert = GalleryCategory::insertGetId([
            'galcate_name' => $request['galcate_name'],
            'galcate_remarks' => $request['galcate_remarks'],
            'galcate_order' => $request['galcate_order'],
            'galcate_url' => $request['galcate_url'],
            'galcate_creator' => $creator,
            'galcate_slug' => $slug,
            'galcate_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){

            Session::flash('success','Successfully insert Gallery Category information.');
            return redirect('dashboard/gallery-category/add');
        }else
        {
            Session::flash('error','Opps!! Failed to insert GalleryCategory.');
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'galcate_name' => ['required', 'string'],
        ],[
            'galcate_name.required' => 'Please enter galcate_name.',
        ]);

        $editor = Auth::user()->id;
        $id = $request['galcate_id'];

        $update = GalleryCategory::where('galcate_status', 1)->where('galcate_id', $id)->update([
            'galcate_name' => $request['galcate_name'],
            'galcate_remarks' => $request['galcate_remarks'],
            'galcate_order' => $request['galcate_order'],
            'galcate_url' => $request['galcate_url'],
            'galcate_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($update){
            Session::flash('success','Successfully insert gallery information.');
            return redirect('dashboard/gallery-category');
        }else
        {
            Session::flash('error','Opps!! Failed to insert gallery.');
            return redirect('dashboard/gallery-category/edit');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = GalleryCategory::where('galcate_status',1)->where('galcate_id',$id)->update([
            'galcate_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/gallery-category');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/gallery-category');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
