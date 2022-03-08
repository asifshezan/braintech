<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Gallery::where('gallery_status',1)->orderBy('gallery_id','DESC')->get();
        return view('admin.gallery.all', compact('all'));
    }

    public function add(){
        return view('admin.gallery.add');
    }

    public function edit($slug){
        $data = Gallery::where('gallery_status',1)->where('gallery_slug',$slug)->firstOrFail();
        return view('admin.gallery.edit', compact('data'));
    }

    public function view($slug){
        $data = Gallery::where('gallery_status',1)->where('gallery_slug',$slug)->firstOrFail();
        return view('admin.gallery.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'gallery_title' => ['required', 'string'],
        ],[
            'gallery_title.required' => 'Please enter gallery title.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'G' .'.'. uniqid();

        $insert = Gallery::insertGetId([
            'gallery_title' => $request['gallery_title'],
            'gallery_remarks' => $request['gallery_remarks'],
            'gallery_order' => $request['gallery_order'],
            'gallery_category_id' => $request['gallery_category_id'],
            'gallery_publish' => 1,
            'gallery_creator' => $creator,
            'gallery_slug' => $slug,
            'gallery_status' =>1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/galleries/'.$imageName);

            Gallery::where('gallery_id',$insert)->update([
                'gallery_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert gallery information.');
            return redirect('dashboard/gallery/add');
        }else
        {
            Session::flash('error','Opps!! Failed to insert gallery.');
            return redirect('dashboard/gallery/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'gallery_title' => ['required', 'string'],
        ],[
            'gallery_title.required' => 'Please enter gallery title.',
        ]);

        $editor = Auth::user()->id;
        $id = $request['gallery_id'];

        $update = Gallery::where('gallery_status', 1)->where('gallery_id', $id)->update([
            'gallery_title' => $request['gallery_title'],
            'gallery_remarks' => $request['gallery_remarks'],
            'gallery_order' => $request['gallery_order'],
            'gallery_category_id' => $request['gallery_category_id'],
            'gallery_editor' => $editor
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $id . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/galleries/'.$imageName);

            Gallery::where('gallery_id',$id)->update([
                'gallery_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','Successfully insert gallery information.');
            return redirect('dashboard/gallery');
        }else
        {
            Session::flash('error','Opps!! Failed to insert gallery.');
            return redirect('dashboard/gallery/edit');
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Gallery::where('gallery_status',1)->where('gallery_id',$id)->update([
            'gallery_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/gallery');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/gallery');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
