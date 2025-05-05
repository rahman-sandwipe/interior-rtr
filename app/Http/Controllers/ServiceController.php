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
    public function services(){
        return view('pages.frontend.service');
    }



    public function index()
    {
        $data['services'] = Service::all();        // Fetch all services from the database
        return view('pages.backend.service', $data);        // Return the view with the services data
    }

    public function store(Request $request)
    {
        // Create a new service
        $serviceID = IdGenerator::generate(['table' => 'services','field' => 'service_id','length' => 10,'prefix' => 'SVC-',]);
        $data = $request->all();
        $data['service_id'] = $serviceID;
        $data['user_id'] = Auth::id();
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