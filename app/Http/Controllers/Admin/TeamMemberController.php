<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = TeamMember::where('team_status',1)->orderBy('team_id','DESC')->get();
        return view('admin.teammember.all', compact('all'));
    }

    public function add(){
        return view('admin.teammember.add');
    }

    public function edit($slug){
        $data = TeamMember::where('team_status',1)->where('team_slug',$slug)->firstOrFail();
        return view('admin.teammember.edit', compact('data'));
    }


    public function view($slug){
        $data = TeamMember::where('team_status',1)->where('team_slug',$slug)->firstOrFail();
        return view('admin.teammember.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'team_name' => ['required', 'string', 'max:100'],
            'team_designation' => ['required', 'string', 'max:100'],
        ],[
            'team_name.required' => 'Please enter TeamMember name.',
            'team_designation.required' => 'Please enter team designation name.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'Team'.'.'. uniqid();

        $insert = TeamMember::insertGetId([
            'team_name' => $request['team_name'],
            'team_designation' => $request['team_designation'],
            'team_facebook' => $request['team_facebook'],
            'team_twitter' => $request['team_twitter'],
            'team_linkedin' => $request['team_linkedin'],
            'team_instragram' => $request['team_instragram'],
            'team_remarks' => $request['team_remarks'],
            'team_order' => $request['team_order'],
            'team_creator' => $creator,
            'team_slug' => $slug,
            'team_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/teammembers/'.$imageName);

            TeamMember::where('team_id',$insert)->update([
                'team_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert team member information.');
            return redirect('dashboard/teammember/add');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/teammember/add');
        }
    }


    public function update(Request $request, $slug){
        // dd($request->all());
        $this->validate($request,[
            'team_name' => ['required', 'string', 'max:100'],
            'team_designation' => ['required', 'string', 'max:100'],
        ],[
            'team_name.required' => 'Please enter TeamMember name.',
            'team_designation.required' => 'Please enter team designation name.',
        ]);

        $team_id = $request['team_id'];
        $editor = Auth::user()->id;
        $update = TeamMember::where('team_id',$team_id)->where('team_slug', $slug)->update([
            'team_name' => $request['team_name'],
            'team_designation' => $request['team_designation'],
            'team_facebook' => $request['team_facebook'],
            'team_twitter' => $request['team_twitter'],
            'team_linkedin' => $request['team_linkedin'],
            'team_instragram' => $request['team_instragram'],
            'team_remarks' => $request['team_remarks'],
            'team_order' => $request['team_order'],
            'team_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $team_id . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/teammembers/'.$imageName);

            TeamMember::where('team_id',$team_id)->update([
                'team_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        }

        if($update){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/teammember');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $team_id = $_POST['modal_id'];
        $softdelete = TeamMember::where('team_status',1)->where('team_id',$team_id)->update([
            'team_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/teammember');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/teammember');
        }

    }

    public function restore(){

    }

    public function delete(){

    }
}
