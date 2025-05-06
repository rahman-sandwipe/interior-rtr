<?php

namespace App\Http\Controllers;

use App\Models\Abouts;
use App\Models\Banner;
use App\Models\Service;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $data['sliders'] = Banner::where('status', 'visible')->latest()->get();
        $data['abouts'] = Abouts::latest()->first();
        $data['services'] = Service::latest()->get();
        $data['teams'] = User::where('role', 'admin')->latest()->get();
        
        return view('frontend.pages.home', $data);
    }


    

    public function abouts(){
        return view('frontend.pages.abouts');
    }

    public function caseStudies(){
        return view('frontend.pages.case-studies');
    }

    public function blogs(){
        return view('frontend.pages.blogs');
    }
}
