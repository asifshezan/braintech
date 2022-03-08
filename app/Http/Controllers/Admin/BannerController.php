<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;


class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Banner::where('ban_status',1)->orderBy('ban_id','DESC')->get();
        return view('admin.banner.all', compact('all'));
    }

    public function add(){
        return view('admin.banner.add');
    }

    public function edit($ban_id){
        $data = Banner::where('ban_status',1)->where('ban_id',$ban_id)->firstOrFail();
        return view('admin.banner.edit', compact('data'));
    }

    public function view($ban_id){
        $data = Banner::where('ban_status',1)->where('ban_id',$ban_id)->firstOrFail();
        return view('admin.banner.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'ban_title' => ['required', 'string', 'max:200'],
            'ban_button' => ['required', 'string', 'max:20'],
        ],[
            'ban_title.required' => 'Please enter banner title.',
            'ban_button.required' => 'Please enter button name.',
        ]);

        $slug = 'Ban' . '-' . uniqid();
        $creator = Auth::user()->id;

        $insert = Banner::insertGetId([
            'ban_title' => $request['ban_title'],
            'ban_subtitle' => $request['ban_subtitle'],
            'ban_button' => $request['ban_button'],
            'ban_url' => $request['ban_url'],
            'ban_order' => $request['ban_order'],
            'ban_publish' => 1,
            'ban_creator' => $creator,
            'ban_slug' => $slug,
            'ban_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert.time().'_'.rand(1000,2000).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/banners/'.$imageName);

            Banner::where('ban_id',$insert)->update([
                'ban_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert.');
            return redirect('dashboard/banner/add');
        }else{
            Session::flash('error','opps! failed.');
            return redirect('dashboard/banner/add');
        }
    }

    public function update(Request $request){
        $ban_id = $request['ban_id'];
        $editor = Auth::user()->id;
        $this->validate($request,[
            'ban_title' => ['required', 'string', 'max:200'],
            'ban_button' => ['required', 'string', 'max:20'],
        ],[
            'ban_title.required' => 'Please enter banner title.',
            'ban_button.required' => 'Please enter button name.',
        ]);

        $update = Banner::where('ban_id', $ban_id)->update([
            'ban_title' => $request['ban_title'],
            'ban_subtitle' => $request['ban_subtitle'],
            'ban_button' => $request['ban_button'],
            'ban_url' => $request['ban_url'],
            'ban_order' => $request['ban_order'],
            'ban_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $ban_id . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/banners/'.$imageName);

            Banner::where('ban_id', $ban_id)->update([
                'ban_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/banner');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/banner/edit');
        }
    }

    public function softdelete(){
        $ban_id = $_POST['modal_id'];
        $softdelete = Banner::where('ban_status',1)->where('ban_id',$ban_id)->update([
            'ban_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully Delete');
            return redirect('dashboard/banner');
        }else{
            Session::flash('error','Opps! Failed Delete.');
            return redirect('dashboard/banner');
        }
    }

    public function restore(){

    }

    public function delete(){

    }
}
