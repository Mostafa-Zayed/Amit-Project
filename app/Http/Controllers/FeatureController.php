<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
use Illuminate\Support\Facades\Session;
class FeatureController extends Controller
{
    // Index Function
    public function index(){
        $features = Feature::all();
        return view('admin/features/index',compact('features',$features));
        
    }

    // Create Function
    public function create(){

        return view('admin/features.create');
    }

    // Store Function
    public function store(Request $request){
    
        $this->validate($request,[
            'feature_title' => 'required',
            'feature_icon' => 'required',
            'content' => 'required'
        ]);
        
        $feature = new Feature([
            'title' => $request->get('feature_title'),
            'icon'  => $request->get('feature_icon'),
            'content' => $request->get('content')
        ]);
        $feature->save();
        Session::flash('success','Category Is Created Successfuly');
        return redirect('admin/features');
        
    }

    // Edit Function
    public function edit($id){
        $feature = Feature::findOrFail($id);
        return view('admin/features.edit',compact('feature',$feature));
    }

    // Update Function
    public function update(Request $request , $id){

    }

    // Show Function
    public function show($id){

        $feature = Feature::findOrFail($id);
        return view('admin/features.show',compact('feature',$feature));
    }

    // Destroy Function
    public function destroy($id){

        $feature = Feature::findOrFail($id)->delete();
        return redirect('admin/features')->with('success','Feature Deleted Successfuly');
    }
}
