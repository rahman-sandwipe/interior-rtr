<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMsg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ContactController extends Controller
{
    /**
     * Display contact page
     * 
     * @return void
     * 
     */
    public function contacts(){
        return view('frontend.pages.contacts');
    }
}
