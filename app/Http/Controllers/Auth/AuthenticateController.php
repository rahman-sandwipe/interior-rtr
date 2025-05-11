<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AuthenticateController extends Controller
{
    /**
     * Display a Register form.
     */
    public function registerPage()
    {
        return view('backend.pages.auth.register');
    }

    /**
     * Creating a new User.
     */
    public function registerFrom(Request $request)
    {
        try{
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users',
                'password'  => 'required|string|min:5|confirmed',
                'password_confirmation' => 'required|string|min:5|same:password',
            ]);
                
            $userId = IdGenerator::generate(['table' => 'users', 'field' => 'user_id', 'length' => 10, 'prefix' => 'USER-']);
            
            // Create a avatar for the user
            Avatar::create($request->full_name)->save(public_path('/images/avatars/avatar_'.$userId.'.png')); // quality = 100
            $avatar = 'images/avatars/avatar_'.$userId.'.png';
            
            $user = User::create([
                'user_id' => $userId,
                'full_name' => $request->full_name,
                'visibility' => 'public',
                'email'    => $request->email,
                'avatar'   => $avatar,
                'role'     => 'user',
                'password' => Hash::make($request->password),
            ]);
            
            // Create a user profile

            UserInfo::create([
                'user_id' => $user->id,
            ]);
            Auth::login($user, $request->has('remember'));
        
            // Flash message for successful registration
            flash()
                ->option('position', 'bottom-right')
                ->option('timeout', 2000)
                ->success('You have successfully registered!');
            // Redirect to the intended page or dashboard
            return redirect()->route('dashboard');
        }catch(\Exception $e){
            flash()
                ->option('position', 'bottom-right')
                ->option('timeout', 2000)
                ->error($e->getMessage());
            return back();
        }
    }

    /**
     * Authenticate a user
     */
    public function loginPage()
    {
        return view('backend.pages.auth.login');
    }

    /**
     * Login the user.
     */
    public function loginFrom(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user is already logged in
        if (Auth::check()) {
            // Flash message for already logged in
            flash()
                ->option('position', 'bottom-right')
                ->option('timeout', 2000)
                ->info('You are already logged in!');
            return redirect()->intended('/dashboard');
        }else{
            $remember = $request->has('remember') ? true : false;
            
            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
    
                // Flash message for successful login
                flash()
                    ->option('position', 'bottom-right')
                    ->option('timeout', 2000)
                    ->success('You have successfully logged in!');
                return redirect()->intended('/dashboard');
            }
        }

        // Handle failed login attempt
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided password is incorrect.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        // Regenerate the CSRF token
        $request->session()->regenerateToken();
        // Flash message for successful logout
        flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->info('You have successfully logged out!');
        // Redirect to the login page or any other page
        return redirect('/login');
    }


    public function forgotPasswordPage()
    {
        return view('backend.pages.auth.forgot-password');
    }
}
