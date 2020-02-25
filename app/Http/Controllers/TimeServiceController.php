<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Timeservice;
use Illuminate\Support\Facades\Session;
class TimeServiceController extends Controller
{
    // Index Function
    public function index(){
        $servicestime = DB::table('timeservices')->take(3)->paginate(5);
        return view('admin/servicestime.index',compact('servicestime',$servicestime));
    }

    // Create Function
    public function create(){

        return view('admin/servicestime.create');
    }

    // Store Function
    public function store(Request $request){

        $this->validate($request,[
            'service_name' => 'required',
            
        ]);

        $servicetime = new Timeservice([
            'service_time' => $request->get('service_name')
        ]);

        $servicetime->save();
        Session::flash('success','Service Time Is Created Successfuly');
        return redirect('admin/servicestime');
    }

    // Edit Function
    public function edit($id){

        $servicetime = Timeservice::findOrFail($id);
        return view('admin/servicestime.edit',compact('servicetime',$servicetime));

    }

    // Update Function
    public function update(Request $request,$id){

        $servicetime = Timeservice::findOrFail($id);
        $this->validate($request,[
            'service_time' => 'required'
        ]);

        $servicetime->service_time = $request['service_time'];

        $servicetime->save();
        return redirect('admin/servicestime')->with('success','Service Time Is  Updated Successfuly');
    }

    // Destroy Function
    public function destroy($id){

        $servicetime = Timeservice::findOrFail($id)->delete();
        return redirect('admin/servicestime')->with('success','Service Time Is Deleted Successfuly');
    }

    
}
