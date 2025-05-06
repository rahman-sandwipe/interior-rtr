<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMsg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ContactController extends Controller
{
    public function contacts(){
        return view('frontend.pages.contacts');
    }

    public function contactStore(Request $request){
        $contact_id = IdGenerator::generate(['table' => 'contact_mails', 'field' => 'contact_id', 'length' => 10, 'prefix' => 'SID']);
        ContactMsg::create([
            'contact_id' => $contact_id,
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'subject' => $request['subject'],
            'message' => $request['message']
        ]);

        Mail::to('interior.rtr@gmail.com')
        ->cc($request['email'])
        ->send(new ContactMail(
            $request['name'],
            $request['email'],
            $request['subject'],
            $request['message'],
            $request['phone'], // Adding the missing argument
            $contact_id
        ));

        flash()
        ->option('position', 'bottom-center')
        ->option('timeout', 2000)
        ->success('Message Sent Successfully');
        return back();
    }
}
