<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bannerPage() : View {
        return view('backend.pages.bannerPage');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bannerList() {
        $data['banners'] = Banner::latest()->get();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bannerDetails(Banner $banner) {
        try {
            return response()->json($banner->toArray());
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        $bd_id = IdGenerator::generate(['table'=>'banners', 'field'=>'bannerID', 'length'=>8, 'prefix'=>'BID']);
        $data = $request->all();
        $data['bannerID']=$bd_id;
        // ================ Image ================ //
        if($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = $bd_id.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image = $image->resize(1920, 1080);
            $image->save(base_path('public/images/banners/banner'.$name_gen));
            $save_url = 'images/banners/banner'.$name_gen;
            $data['image']=$save_url;
        }
        Banner::create($data);
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Successfully inserted!');
        return back();
    }
    
    public function edit($id)
    {
        $banner=Banner::where('id',$id)->first();
        return response()->json([
            'status'=>200,
            'banner'=>$banner
        ]);
    }

    public function update(Request $request, $id) {
        // ================ Image ================ //
        if($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image = $image->resize(1920, 1080);
            $image->save(base_path('public/images/banners/banner'.$name_gen));
            $save_url = 'images/banners/banner'.$name_gen;
            $data['image']=$save_url;
        }
        Banner::find($id)->update($data);
        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Successfully updated!');
        return back();
    }
}
