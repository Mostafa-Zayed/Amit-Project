<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;
class LocationController extends Controller
{
    //
    public function index(Request $request){

        $locations = DB::table('locations');
        if($request->has('orderBy')){
            $locations = $locations->orderBy($request['orderBy']);
        }
        $locations = $locations->paginate(5);
        return view('admin/locations.index',compact('locations',$locations));
    }
    
    public function create (){

        return view('admin/locations/create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'location_name' => 'required',
            'icon' => 'required'
        ]);
        $location =  new Location;
        $location->name = $request['location_name'];
        $location->icon = $request['icon'];
        $location->save();
        return redirect('admin/locations')->with('success','Job Location Is Created Succeffuly');
    }

    public function edit($id){
        $location = Location::findOrFail($id);
        return view('admin/locations.edit',compact('location',$location));
    }

    public function update(Request $request,$id){

        $location = Location::findOrFail($id);
        $this->validate($request,[
            'location_name' => 'required',
            'location_icon' => 'required'
        ]);

        $location->name = $request['location_name'];
        $location->icon = $request['location_icon'];
        $location->save();
        return redirect('admin/locations')->with('success','Job Location Is Created Succeffuly');
    }

    public function destroy($id){

        $location = location::findOrFail($id)->delete();
        return redirect('admin/locations')->with('success','Location Deleted Successfuly');
    }
}
