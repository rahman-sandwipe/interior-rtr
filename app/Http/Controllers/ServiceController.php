<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ServiceController extends Controller
{
    public function servicesPages(){
        return view('frontend.pages.servicePage');
    }
    public function serviceDetails(Service $service){
        return view('frontend.pages.serviceSinglePage', compact('service'));
    }
    /** ======================== && ======================== **/


    /** ======================== && ======================== **/
    public function servicePage(){
        return view('backend.pages.servicePage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getServices(){
        $data['services'] = Service::all()->toArray();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getServiceDetails(Service $service){
        return response()->json($service->toArray());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function serviceInsert(Request $request)
    {
        $serviceID = IdGenerator::generate(['table' => 'services','field' => 'service_id','length' => 10,'prefix' => 'SID',]);
        $data = $request->all();
        $data['service_id'] = $serviceID;
        $data['user_id'] = Auth::user()->id;
        // Get the authenticated user's ID
        // ================ Image ================ //
         if($request->hasFile('img')) {
            $manager = new ImageManager(new Driver());
            $name_gen = uniqid().'.'.$request->file('img')->getClientOriginalExtension();
            $img = $manager->read($request->file('img'));
            $img = $img->resize(1920, 1080);
            $img->save(base_path('public/images/services/service_'.$name_gen));
            $save_url = 'images/services/service_'.$name_gen;
            $data['img']=$save_url;
        }else{
            $request->merge(['img' => 'default.png']);
        }
        
        Service::create($data); // Create the service in the database
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Successfully inserted!');
        return back(); // Redirect back to the previous page
    }
}