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
        $all = Basic::where('basic_status',1)->orderBy('basic_id','DESC')->get();
        return view('admin.manage.basic', compact('all'));
    }

    public function socialmedia(){
        $all = SocialMedia::where('sm_status',1)->orderBy('sm_id','DESC')->get();
        return view('admin.manage.socialmedia', compact('all'));
    }

    public function contact_info(){
        $all = ContactInformation::where('cont_status',1)->orderBy('cont_id','DESC')->get();
        return view('admin.manage.contact_info', compact('all'));
    }
}
