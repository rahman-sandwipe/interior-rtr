<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ForgotPasswordController extends Controller
{
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function showForgetPasswordForm(): View
    {
        return view('back.auth.forgetPassword');
    }
  
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function submitForgetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
  
        $token = Str::random(64);
  
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
  
        Mail::send('emails.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->info('We have e-mailed your password reset link!');
        return redirect(route('login'));
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function showResetPasswordForm($token): View
    { 
        return view('back.auth.forgetPasswordLink', ['token' => $token]);
    }
  
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function submitResetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
  
        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                        'email' => $request->email, 
                        'token' => $request->token
                    ])
                    ->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
  
        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);
 
        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
  
        return redirect('/admin/login')->with('message', 'Your password has been changed!');
    }
}