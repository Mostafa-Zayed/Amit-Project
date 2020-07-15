<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Team;
//use Illuminate\Support\Facdes;
use App\Profile;
class UserController extends Controller
{
    
    public function index(Request $request){

        $users = DB::table('users');
        if($request->has('orderBy')){

            $sortorder = 'asc';

            if($request->has('sortOrder')){
                $sortorder = $request['sortOrder'];
                $users = $users->orderBy($request['orderBy'],$sortorder);
            }
        }
       
        if($request->has('keywords') && !empty($request['keywords'])){
            $users = $users->where('name','like','%'.$request['keywords'].'%');
        }
        $users = $users->paginate(5);
        
        return view('admin/users.index',compact('users',$users));

    }


    public function create(){
        return view('admin/users/create');
    }


    public function show($id){

        $user = user::findOrFail($id);
        if(isset($user->profile) && !empty($user->profile)){
            $hasprofile = 1;
        }else{
            $hasprofile = 0;
        }
        //dd($hasprofile);
        $team_id = 0;
        if($hasprofile === 1){
            
            $profile_id = $user->profile->id;
            $team = Team::where('profile_id','=',$profile_id)->first();

            if(!empty($team)){
                $team_id = $team->id;
            }else{
                $team_id = 0;
            }
        }

        
        
        //$team_id = 0;
        //dd($user->profile);
        //dd($team_id);
        //dd($hasprofile);

        
        
        return view('admin/users.show',compact('user','team_id','hasprofile',$user->profile,$team_id,$hasprofile));
    }

    public function edit($id){

        $user = User::findOrFail($id);
        return view('admin/users.edit',compact('user',$user));
    }


    public function store(Request $request){
        
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
  
        if($request['password'] === $request['confirm_password']){

            $user = new User([
                'name' => $request->get('name'),
               'email' => $request->get('email'),
                'password' => Hash::make($request['password']),
                'type' => $request->get('type')
            ]);
            $user->save();
            Session::flash('success','User Is Created Successfuly');
                    return redirect('admin/users');
            
        }else{

            Session::flash('Faild','User Is Not Created Successfuly');
            return redirect('admin/users');
        }



}

public function destroy($id){

    $user = User::findOrFail($id)->delete();
    return redirect('admin/users')->with('success','User Is Deleted Successfuly');
}


}