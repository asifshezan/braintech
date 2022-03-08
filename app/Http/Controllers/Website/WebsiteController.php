<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
