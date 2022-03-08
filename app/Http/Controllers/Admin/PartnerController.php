<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $all = Partner::where('partner_status',1)->orderBy('Partner_id','DESC')->get();
      return view('admin.partner.all', compact('all'));
    }

    public function add()
    {
        return view('admin.partner.add');
    }

    public function edit($partner_id)
    {
        $data = Partner::where('partner_status',1)->where('partner_id',$partner_id)->firstOrFail();
        return view('admin.partner.edit', compact('data'));
    }

    public function view($partner_id)
    {
        $data = Partner::where('partner_status',1)->where('partner_id',$partner_id)->firstOrFail();
        return view('admin.partner.view', compact('data'));
    }

    public function insert(Request $request)
    {
        $this->validate($request,[
            'partner_title' => ['required', 'string', 'max:100'],
            'partner_url' => ['required', 'string', 'max:50'],
        ],[
            'partner_title.required' => 'Please enter partner title.',
            'partner_url.required' => 'Please enter partner url.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'Partner' .'-'. uniqid();

        $insert = Partner::insertGetId([
            'partner_title' => $request['partner_title'],
            'partner_url' => $request['partner_url'],
            'partner_order' => $request['partner_order'],
            'partner_creator' => $creator,
            'partner_slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/partners/'.$imageName);

            Partner::where('partner_id',$insert)->update([
                'partner_logo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert partner information.');
            return redirect('dashboard/partner/add');
        }else{
            Session::flash('error','Opps!  Failed insert.');
            return redirect('dashboard/partner/add');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'partner_title' => ['required', 'string', 'max:100'],
            'partner_url' => ['required', 'string', 'max:50'],
        ],[
            'partner_title.required' => 'Please enter partner title.',
            'partner_url.required' => 'Please enter partner url.',
        ]);

        $partner_id = $request['partner_id'];
        $editor = Auth::user()->id;

        $update = Partner::where('partner_id',$partner_id)->update([
            'partner_title' => $request['partner_title'],
            'partner_url' => $request['partner_url'],
            'partner_order' => $request['partner_order'],
            'partner_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $partner_id . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/partners/'.$imageName);

            Partner::where('partner_id',$partner_id)->update([
                'partner_logo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','Successfully Update.');
            return redirect('dashboard/partner');
        }else{
            Session::flash('error','Opps! Failed Update.');
            return redirect('dashboard/partner/edit');
        }
    }

    public function softdelete()
    {
        $partner_id = $_POST['modal_id'];
        $softdelete = Partner::where('partner_status',1)->where('partner_id',$partner_id)->update([
            'partner_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully delete.');
            return redirect('dashboard/partner');
        }else{
            Session::flash('error','Opps! Failed delete.');
            return redirect('dashboard/partner');
        }
    }

    public function restore()
    {

    }

    public function delete()
    {

    }
}
