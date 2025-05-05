<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AuthenticateController extends Controller
{
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function index()
    {
        return view('back.auth.login');
    }
    
    /**
    * Write code on Method
    *
    * @return response()
    */
 
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
        {
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->info('You have Successfully loggedin!');
            return redirect()->intended('/admin/dashboard');
        }else{
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->error('Oppes! You have entered invalid credentials.');
            return redirect("/admin/login");
        }
    }
 
    /**
    * Write code on Method
    *
    * @return response()
    */
 
    public function registration()
    {
        return view('back.auth.register');
    }

       
    /**
    * Write code on Method
    *
    * @return response()
    */

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::min(5)],
        ]);
        $auth_id = IdGenerator::generate(['table'=>'users', 'field'=>'auth_id', 'length'=>8, 'prefix'=>'EID']);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'auth_id' => $auth_id,
            'password' => Hash::make($request->password),
        ]);
        
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Great! You have Successfully loggedin!');

        return redirect("admin/dashboard");
    }
 
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function edit(Request $request): View
    {
        return view('back.pages.profile', [
            'user' => $request->user(),
        ]);
    }
    
    public function update(Request $request)
    {
        
        $data=$request->all();
        if(Auth::user()->avatar==NULL){
            if($request->hasFile('avatar')) {
                $manager = new ImageManager(new Driver());
                $name_gen = uniqid().'.'.$request->file('avatar')->getClientOriginalExtension();
                $img = $manager->read($request->file('avatar'));
                $img = $img->resize(300, 300);
                $img->save(base_path('public/images/teams/team'.$name_gen));
                $save_url = 'images/teams/team'.$name_gen;
                $data['avatar']=$save_url;
                // endif avatar ==========
            }
        }else{
            if($request->hasFile('avatar')) {
                unlink(Auth::user()->avatar);
                $manager = new ImageManager(new Driver());
                $name_gen = uniqid().'.'.$request->file('avatar')->getClientOriginalExtension();
                $img = $manager->read($request->file('avatar'));
                $img = $img->resize(300, 300);
                $img->save(base_path('public/images/teams/team'.$name_gen));
                $save_url = 'images/teams/team'.$name_gen;
                $data['Avatar']=$save_url;
                // endif avatar ==========
            }
        }
        $request->user()->fill($data);
        $request->user()->save();
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Profile updated successfully!');
        return back();
    }

    public function view(Request $request)
    {
        $user=User::where(['auth_id'=> $request->auth_id])->first();
        return view('back.pages.profile-view', [
            'user' => $user
        ]);
    }
}