<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Testimonial::where('test_status',1)->orderBy('test_id','DESC')->get();
        return view('admin.testimonial.all', compact('all'));
    }

    public function add(){
        return view('admin.testimonial.add');
    }

    public function edit($test_id){
        $data = Testimonial::where('test_status',1)->where('test_id',$test_id)->firstOrFail();
        return view('admin.testimonial.edit', compact('data'));
    }


    public function view($test_id){
        $data = Testimonial::where('test_status',1)->where('test_id',$test_id)->firstOrFail();
        return view('admin.testimonial.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'test_name' => ['required', 'string', 'max:100'],
            'test_company' => ['required', 'string', 'max:100'],
        ],[
            'test_name.required' => 'Please enter testimonial name.',
            'test_company.required' => 'Please enter company name.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'Test'.'-'. uniqid();

        $insert = Testimonial::insertGetId([
            'test_name' => $request['test_name'],
            'test_designation' => $request['test_designation'],
            'test_company' => $request['test_company'],
            'test_order' => $request['test_order'],
            'test_feedback' => $request['test_feedback'],
            'test_feature' => 1,
            'test_creator' => $creator,
            'test_slug' => $slug,
            'test_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,210) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/testimonials/'.$imageName);

            Testimonial::where('test_id',$insert)->update([
                'test_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert testimonial information.');
            return redirect('dashboard/testimonial/add');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/testimonial/add');
        }
    }


    public function update(Request $request){
        $this->validate($request,[
            'test_name' => ['required', 'string', 'max:100'],
            'test_company' => ['required', 'string', 'max:100'],
        ],[
            'test_name.required' => 'Please enter testimonial name.',
            'test_company.required' => 'Please enter company name.',
        ]);

        $test_id = $request['test_id'];
        $editor = Auth::user()->id;
        $update = Testimonial::where('test_id',$test_id)->update([
            'test_name' => $request['test_name'],
            'test_designation' => $request['test_designation'],
            'test_company' => $request['test_company'],
            'test_order' => $request['test_order'],
            'test_feedback' => $request['test_feedback'],
            'test_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $test_id . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/testimonials/'.$imageName);

            Testimonial::where('test_id',$test_id)->update([
                'test_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        }

        if($update){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/testimonial');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/testimonial/edit');
        }
    }

    public function softdelete(){
        $test_id = $_POST['modal_id'];
        $softdelete = Testimonial::where('test_status',1)->where('test_id',$test_id)->update([
            'test_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/testimonial');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/testimonial');
        }

    }

    public function restore(){

    }

    public function delete(){

    }
}
