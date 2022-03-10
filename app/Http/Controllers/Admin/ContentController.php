<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Content::where('content_status',1)->where('content_id','DESC')->get();
        return view('admin.content.all', Compact('all'));
    }

    public function add(){

    }

    public function edit(){

    }

    public function view(){

    }

    public function insert(){

    }

    public function update(){

    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }
}
