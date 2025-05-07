<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMsg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmailController extends Controller
{
    /** 
     * Display contact page
     * 
     * @return void
     * 
     */
    public function emailPage(){
        return view('backend.pages.emailPage');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailList()
    {
        try{
            $data['emails'] = ContactMsg::latest()->get();
            return response()->json($data); 
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function emailSend(Request $request) {
        $email_id = IdGenerator::generate([
            'table' => 'contact_mails',
            'field' => 'email_id',
            'length' => 10,
            'prefix' => 'EID'
        ]);
        
        ContactMsg::create([
            'email_id' => $email_id,
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
            $email_id
        ));

        flash()
        ->option('position', 'top-center')
        ->option('timeout', 2000)
        ->success('Message Sent Successfully');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emailDetails(ContactMsg $contactMsg) {
        try {
            return response()->json($contactMsg->toArray());
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    /**
     * Replay the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emailReply(ContactMsg $contactMsg) {
        try {
            $contactMsg->update(['status' => 'replied']);
            return response()->json(['success' => 'Email replied successfully']);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emailDelete(ContactMsg $contactMsg) {
        try {
            $contactMsg->delete();
            return response()->json(['success' => 'Email deleted successfully']);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
