<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
    * Write code on Method
    *
    * @return response()
    */
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('backend.pages.dashboard');
        }
        return redirect("admin/login");
    }
    
    public function users()
    {
        $users=User::orderBy('id','DESC')->get();
        return view('back.pages.users',compact('users'));
    }
 
    /**
    * Write code on Method 
    *
    * @return response()
    */
 
    public function logout() {
        Session::flush();
        Auth::logout();
        
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->info('You have successfully logged out!');
        return Redirect('admin/login');
    }
}
