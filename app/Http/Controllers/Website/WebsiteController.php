<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    public function __construct(){

    }

    public function index(){
        return view('website.home');
    }

    public function about(){
        return view('website.about');
    }

    public function service(){
        return view('website.service');
    }

    public function team(){
        return view('website.team');
    }

    public function case(){
        return view('website.case');
    }

    public function blog(){
        return view('website.blog');
    }

    public function contact(){
        return view('website.contact');
    }

    public function newsletter(Request $request){
        $this->validate($request,[
            'ns_email' => ['required','string'],
        ],[
            'ns_email.required' => 'please enter email.',
        ]);
        $slug = uniqid();
        $insert = Newsletter::insertGetId([
            'ns_email' => $request['ns_email'],
            'ns_slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Successfully Subscribe.');
            return redirect()->back();
        }else{
            Session::flash('error','Subscribe error.');
            return redirect()->back();
        }
    }
}
