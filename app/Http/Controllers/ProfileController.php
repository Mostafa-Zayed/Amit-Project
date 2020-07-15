<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
class ProfileController extends Controller
{
    //
    public function index(){

        $profiles = Profile::select('id','user_id','permission_id','status');
        $profiles = $profiles->paginate(2);
        return view('admin/profiles.index',compact('profiles',$profiles));
    }

    public function profile(Request $request){
        $user_id = (int)$request['user_id'];
        
        $profile = Profile::where('user_id','=',$user_id)->first();

        if(isset($profile) && !empty($profile)){
            dd($request->all());
            $profile->user_id = (int)$request['user_id'];
            $profile->first_name = $request['first_name'];
            $profile->last_name = $request['last_name'];
            $profile->first_name = $request['first_name'];
            $profile->first_name = $request['first_name'];
            $profile->first_name = $request['first_name'];
            $profile->first_name = $request['first_name'];
            $profile->first_name = $request['first_name'];
            $profile->first_name = $request['first_name'];
        }else{
            dd('no');
        }
    }

}
