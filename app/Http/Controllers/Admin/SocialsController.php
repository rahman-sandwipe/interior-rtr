<?php

namespace App\Http\Controllers\Admin;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialsController extends Controller
{
    public function index(){
        $socials=Social::orderBy('id','ASC')->get();
        return view('back.pages.socials', compact('socials'));
    }
    public function insert(Request $request){
        $data = $request->all();
        $data['auth_id'] = Auth::user()->id;
        Social::create($data);
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Successfully Inserted!');
        return back();
    }
}
