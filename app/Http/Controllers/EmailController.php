<?php

namespace App\Http\Controllers;

use App\Models\ContactMsg;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
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
