<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingController extends Controller
{
    // Index Function
    public function index(){
        
        $settings = Setting::all();
        
        return view('admin/settings/index',compact('settings',$settings));
    }

    // Update Function
    public function update(Request $request,$id){

        $settings = Setting::findOrFail($id);
        $this->validate($request,[
            'title' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'address' => 'required',
            'logo' => 'required',
            'link_facebook' => 'required',
            'link_twitter' => 'required',
            'link_instagram' => 'required',
            'link_viemo' => 'required',
            'header_bg' => 'required',
            'about' => 'required',
        ]);
        
        $settings->title = $request['title'];
        $settings->phone = $request['phone'];
        $settings->email = $request['email'];
        $settings->address = $request['address'];
        $settings->location = $request['location'];
        $settings->logo_icon = $request['logo'];
        $settings->link_facebook = $request['link_facebook'];
        $settings->link_twitter = $request['link_twitter'];
        $settings->link_instagram = $request['link_instagram'];
        $settings->link_vimeo = $request['link_viemo'];
        $settings->more_info = $request['about'];
        $settings->title = $request['title'];
        
        $settings->save();
        
        return view('admin/dashboard');
    }

    
}
