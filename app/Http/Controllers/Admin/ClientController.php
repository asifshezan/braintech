<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Client::where('client_status',1)->orderBy('client_id','DESC')->get();
        return view('admin.client.all', compact('all'));
    }

    public function add(){
        return view('admin.client.add');
    }

    public function edit($client_id){
        $data = Client::where('client_status',1)->where('client_id',$client_id)->firstOrFail();
        return view('admin.client.edit', compact('data'));
    }

    public function view($client_id){
        $data = Client::where('client_status',1)->where('client_id',$client_id)->firstOrFail();
        return view('admin.client.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'client_title' => ['required', 'string', 'max:100'],
            'client_url' => ['required', 'string', 'max:100'],
        ],[
            'client_title.required' => 'Please enter client title.',
            'client_url.required' => 'Please enter client url.'
        ]);

        $creator = Auth::user()->id;
        $slug = 'C' . '-' . uniqid();

        $insert = Client::insertGetId([
            'client_title' => $request['client_title'],
            'client_url' => $request['client_url'],
            'client_order' => $request['client_order'],
            'client_remarks' => $request['client_remarks'],
            'client_feature' => 1,
            'client_publish' => 1,
            'client_creator' => $creator,
            'client_slug' => $slug,
            'client_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $imageName = $insert.time().'_'.rand(1000,2000).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/clients/' . $imageName);

            Client::where('client_id', $insert)->update([
                'client_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert client information.');
            return redirect('dashboard/client/add');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/client/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'client_title' => ['required', 'string', 'max:100'],
            'client_url' => ['required', 'string', 'max:100'],
        ],[
            'client_title.required' => 'Please enter client title.',
            'client_url.required' => 'Please enter client url.'
        ]);

        $client_id = $request['client_id'];
        $editor = Auth::user()->id;

        $update = Client::where('client_id',$client_id)->update([
            'client_title' => $request['client_title'],
            'client_url' => $request['client_url'],
            'client_order' => $request['client_order'],
            'client_remarks' => $request['client_remarks'],
            'client_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $client_id . time() . '-' . rand(100,200) . '-' . $image->getClientOriginalExtension();
            Image::make('$image')->resize(200,200)->save('uploads/clients/' . $imageName);

            Client::where('client_id',$client_id)->update([
                'client_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'Client Updated successfully');
            return redirect('dashboard/client');
        } else {
            Session::flash('error', 'Client Update Failed!');
            return redirect('dashboard/client/edit');
        }

    }

    public function softdelete(){
        $client_id = $_POST['modal_id'];
        $softdelete = Client::where('client_status',1)->where('client_id',$client_id)->update([
            'client_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/client');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/client');
        }
    }

    public function restore(){

    }

    public function delete(){

    }

}
