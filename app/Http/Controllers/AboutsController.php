<?php

namespace App\Http\Controllers;

use App\Models\Abouts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutsController extends Controller
{
    public function index() {
        if(!Abouts::where('id', 1)->exists()) {
            Abouts::create([
                'title' => 'About Us',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, repellat.',
                'mission' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, repellat.',
                'vision' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, repellat.',
                'video' => 'https://www.youtube.com/watch?v=example',
                'image' => 'images/partials/default.webp',
            ]);
        }
        $data['abouts'] = Abouts::find(1);
        return view('backend.pages.abouts', $data);
    }

    public function update(Request $request) {
        $getData['title'] = $request->title;
        $getData['description'] = $request->description;
        $getData['mission'] = $request->mission;
        $getData['vision'] = $request->vision;
        $getData['video'] = $request->video;
        // ================ Image ================ //
        if($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image = $image->resize(1200, 750);
            $image->save(base_path('public/images/partials/abouts'.$name_gen));
            $save_url = 'images/partials/abouts'.$name_gen;
            $getData['image']=$save_url;
        }
        // if($request->hasFile('video')){
        //     $file = $request->file('video');
        //     $file->move('videos',$file->getClientOriginalName());
        //     $file_name = $file->getClientOriginalName();
        //     $getData['video']=$file_name;
        // }
        Abouts::find(1)->update($getData);
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Successfully updated!');
        return back();
    }
}
