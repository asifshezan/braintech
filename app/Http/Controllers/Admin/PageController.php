<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Page::where('page_status',1)->where('page_id','DESC')->get();
        return view('admin.page.all', Compact('all'));
    }

    public function add(){

    }

    public function edit(){

    }

    public function view(){
        // return view('admin.page.all');
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
