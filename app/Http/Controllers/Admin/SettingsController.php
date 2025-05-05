<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingsController extends Controller
{
    public function index(){
        $getData = Settings::find(1);
        return view('back.pages.settings',compact('getData'));
    }
    public function update(Request $request){
        $data = Settings::find(1);
        $getData['Tags'] = $request->Tags;
        $getData['Title'] = $request->Title;
        $getData['Author'] = $request->Author;
        $getData['Tagline'] = $request->Tagline;
        $getData['Developer'] = $request->Developer;
        $getData['AuthorEmail'] = $request->AuthorEmail;
        $getData['Description'] = $request->Description;
        $getData['AuthorNumber'] = $request->AuthorNumber;
        $getData['DeveloperEmail'] = $request->DeveloperEmail;
        $getData['DeveloperNumber'] = $request->DeveloperNumber;
        
        // ================ Image ================ //
        if($request->hasFile('Favicon')) {
            if($data->Favicon==NULL){
                $managerFav = new ImageManager(new Driver());
                $name_genFav = uniqid().'.'.$request->file('Favicon')->getClientOriginalExtension();
                $imgFav = $managerFav->read($request->file('Favicon'));
                $imgFav = $imgFav->resize(300, 300);
                $imgFav->save(base_path('public/images/partials/favicon_'.$name_genFav));
                $Fav_url = 'images/partials/favicon_'.$name_genFav;
                $getData['Favicon']=$Fav_url;
            }else{
                unlink($data->Favicon);
                $managerFav = new ImageManager(new Driver());
                $name_genFav = uniqid().'.'.$request->file('Favicon')->getClientOriginalExtension();
                $imgFav = $managerFav->read($request->file('Favicon'));
                $imgFav = $imgFav->resize(300, 300);
                $imgFav->save(base_path('public/images/partials/favicon_'.$name_genFav));
                $Fav_url = 'images/partials/favicon_'.$name_genFav;
                $getData['Favicon']=$Fav_url;
            }
        }
        
        // ================ Favicon ================ //
        if($data->Logo==NULL){
            if($request->hasFile('Logo')) {
                $manager_logo = new ImageManager(new Driver());
                $logo_name_gen = uniqid().'.'.$request->file('Logo')->getClientOriginalExtension();
                $img_logo = $manager_logo->read($request->file('Logo'));
                $img_logo = $img_logo->resize(300, 90);
                $img_logo->save(base_path('public/images/partials/logo_'.$logo_name_gen));
                $logo_url = 'images/partials/logo_'.$logo_name_gen;
                $getData['Logo']=$logo_url;
            }
        }else{
            if($request->hasFile('Logo')) {
                unlink($data->Logo);
                $manager_logo = new ImageManager(new Driver());
                $logo_name_gen = uniqid().'.'.$request->file('Logo')->getClientOriginalExtension();
                $img_logo = $manager_logo->read($request->file('Logo'));
                $img_logo = $img_logo->resize(300, 90);
                $img_logo->save(base_path('public/images/partials/logo_'.$logo_name_gen));
                $logo_url = 'images/partials/logo_'.$logo_name_gen;
                $getData['Logo']=$logo_url;
            }
        }
        // ================ Logo ================ //
        if($data->DarkLogo==NULL){
            if($request->hasFile('DarkLogo')) {
                $manager_dark_logo = new ImageManager(new Driver());
                $dark_logo_name_gen = uniqid().'.'.$request->file('DarkLogo')->getClientOriginalExtension();
                $img_dark_logo = $manager_dark_logo->read($request->file('DarkLogo'));
                $img_dark_logo = $img_dark_logo->resize(300, 90);
                $img_dark_logo->save(base_path('public/images/partials/dark_logo_'.$dark_logo_name_gen));
                $dark_logo_url = 'images/partials/dark_logo_'.$dark_logo_name_gen;
                $getData['DarkLogo']=$dark_logo_url;
            }
        }else{
            if($request->hasFile('DarkLogo')) {
                unlink($data->DarkLogo);
                $manager_dark_logo = new ImageManager(new Driver());
                $dark_logo_name_gen = uniqid().'.'.$request->file('DarkLogo')->getClientOriginalExtension();
                $img_dark_logo = $manager_dark_logo->read($request->file('DarkLogo'));
                $img_dark_logo = $img_dark_logo->resize(300, 90);
                $img_dark_logo->save(base_path('public/images/partials/dark_logo_'.$dark_logo_name_gen));
                $dark_logo_url = 'images/partials/dark_logo_'.$dark_logo_name_gen;
                $getData['DarkLogo']=$dark_logo_url;
            }
        }
        // ================ Dark Logo ================ //
        Settings::find(1)->update($getData);
        flash()
        ->option('position', 'bottom-right')
        ->option('timeout', 2000)
        ->success('Successfully updated!');
        return back();
    }
}
