<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
use Illuminate\Support\Facades\Session;
class FeatureController extends Controller
{
    //
    public function index(){
        $features = Feature::all();
        return view('admin/features/index',compact('features',$features));
        
    }

    public function create(){

        return view('admin/features.create');
    }

    public function store(Request $request){
        //dd($request->all());
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

    public function edit($id){
        $feature = Feature::findOrFail($id);
        return view('admin/features.edit',compact('feature',$feature));
    }

    public function update(Request $request , $id){

    }

    public function show($id){

        $feature = Feature::findOrFail($id);
        return view('admin/features.show',compact('feature',$feature));
    }

    public function destroy($id){

        $feature = Feature::findOrFail($id)->delete();
        return redirect('admin/features')->with('success','Feature Deleted Successfuly');
    }
}
