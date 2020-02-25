<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
class OurTeamController extends Controller
{
    //
    public function index(){
        $ourteam = Team::all();
        return view('admin/ourteam/index')->with('ourteam',$ourteam);
    }

   public function store(Request $request){
       //dd($request->all());
       $team = new Team([
           'profile_id' =>$request->get('profile_id')
       ]);

       $team->save();
       return redirect('admin/ourteam');
   }

   public function destroy($id){
    $team = Team::findOrFail($id)->delete();
    return redirect('admin/ourteam');
   }
}
