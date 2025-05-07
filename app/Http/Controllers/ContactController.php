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

    /**
     * Store contact message
     * 
     * @param Request $request
     * @return void
     */
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

    /** 
     * Display contact page
     * 
     * @return void
     * 
     */
    public function contactPage(){
        return view('backend.pages.contacts');
    }

    /**
     * Display contact page
     * 
     * @return void
     * 
     */
    public function contactList() {
        try{
            $data['contacts'] = ContactMsg::latest()->get();
            return response()->json($data); 
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display contact page
     * 
     * @return void
     * 
     */
    public function contactDetails(ContactMsg $contactMsg) {
        try {
            return response()->json($contactMsg->toArray()); 
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }    
}
