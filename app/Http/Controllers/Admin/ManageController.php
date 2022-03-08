<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basic;
use App\Models\ContactInformation;
use App\Models\SocialMedia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function basic(){
        $basic_all = Basic::where('basic_status',1)->orderBy('basic_id','DESC')->firstOrFail();
        return view('admin.manage.basic', compact('basic_all'));
    }

    public function basic_update(Request $request){
        $this->validate($request,[
            'basic_company' => ['required', 'string'],
            'basic_title' => ['required', 'string'],
        ],[
            'basic_company.required' => 'Please enter company name.',
            'basic_title.required' => 'Please enter company title',
        ]);

        $update = Basic::where('basic_status',1)->where('basic_id',1)->update([
            'basic_company' => $request['basic_company'],
            'basic_title' => $request['basic_title'],
            'basic_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // dd($request->all());

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = time() . '_' . rand(10000,1000000) . '_' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/basics/' . $imageName);

            Basic::where('basic_id',1)->update([
                'basic_logo' => $imageName,
            ]);
        }

        if($request->hasFile('flogo')){
            $image = $request->file('flogo');
            $imageName = time() . '_' . rand(10000,1000000) . '_' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/basics/' . $imageName);

            Basic::where('basic_id',1)->update([
                'basic_flogo' => $imageName,
            ]);
        }

        if($request->hasFile('favicon')){
            $image = $request->file('favicon');
            $imageName = time() . '_' . rand(10000,1000000). '_' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/basics/' . $imageName);

            Basic::where('basic_id',1)->update([
                'basic_favicon' => $imageName,
            ]);
        }

        if($update){
            Session::flash('success','successfully insert.');
            return redirect('dashboard/basic');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/basic');
        }
    }

    public function socialmedia(){
        $social = SocialMedia::where('sm_status',1)->orderBy('sm_id','DESC')->firstOrFail();
        return view('admin.manage.socialmedia', compact('social'));
    }

    public function social_update(Request $request){
        $update = SocialMedia::where('sm_id',1)->where('sm_status',1)->update([
            'sm_facebook' => $request->sm_facebook,
            'sm_twitter' => $request->sm_twitter,
            'sm_linkedin' => $request->sm_linkedin,
            'sm_dribbble' => $request->sm_dribbble,
            'sm_youtube' => $request->sm_youtube,
            'sm_slack' => $request->sm_slack,
            'sm_instagram' => $request->sm_instagram,
            'sm_behance' => $request->sm_behance,
            'sm_google' => $request->sm_google,
            'sm_raddit' => $request->sm_raddit,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        if($update){
            Session::flash('success','successfully insert.');
            return redirect('dashboard/socialmedia');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/socialmedia');
        }

    }

    public function contact_info(){
        $contact = ContactInformation::where('cont_status',1)->orderBy('cont_id','DESC')->firstOrFail();
        return view('admin.manage.contact_info', compact('contact'));
    }

    public function contact_update(Request $request){

        $update = ContactInformation::where('cont_id',1)->where('cont_status',1)->update([
            'cont_phone1' => $request['cont_phone1'],
            'cont_phone2' => $request['cont_phone2'],
            'cont_phone3' => $request['cont_phone3'],
            'cont_phone4' => $request['cont_phone4'],
            'cont_email1' => $request['cont_email1'],
            'cont_email2' => $request['cont_email2'],
            'cont_email3' => $request['cont_email3'],
            'cont_email4' => $request['cont_email4'],
            'cont_add1' => $request['cont_add1'],
            'cont_add2' => $request['cont_add2'],
            'cont_add3' => $request['cont_add3'],
            'cont_add4' => $request['cont_add4'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){

            Session::flash('success','Successfully insert.');
            return redirect('dashboard/contact');
        }else{
            Session::flash('error','Opps!');
            return redirect('dashboard/contact');
        }
    }

}
