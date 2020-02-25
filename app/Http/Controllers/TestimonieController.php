<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonie;
class TestimonieController extends Controller
{
    // Index Function
    public function index(){
        $testimonies = Testimonie::all();
        
        return view('admin.testimonies.index',compact('testimonies',$testimonies));
    }

    // Show Function
    public function show($id){
        $testimonie = Testimonie::findOrFail($id);
        return view('admin.testimonies.show',compact('testimonie',$testimonie));
    }

    // Create Function
    public function create(){

        return view('admin.testimonies.create');
    }

    // Store Function
    public function store(Request $request){

        $this->validate($request,[
            'user_id'=> 'required',
            'image_video' => 'required',
            'content'     => 'required'
        ]);
        $testimonie = new Testimonie;
        $testimonie->user_id = $request['user_id'];
        $testimonie->image_video = $request['image_video'];
        $testimonie->content = $request['content'];
        $testimonie->save();

        return redirect('admin/testimonies')->with('success','New Testimonie Is Created Successfuly');
        
    }

    // Edit Function
    public function edit($id){
        $testimonie = Testimonie::findOrFail($id);
        return view('admin/testimonies.edit',compact('testimonie',$testimonie));
    }

    // Update Function
    public function update(Request $request,$id){
        $testimonie = Testimonie::findOrFail($id);
        $this->validate($request,[
            'user_id' => 'required',
            'content' => 'required',
            'image_video' => 'required'
        ]);
        $testimonie->user_id = $request['user_id'];
        $testimonie->content = $request['content'];
        $testimonie->image_video = $request['image_video'];
        $testimonie->save();

        return redirect('admin/testimonies')->with('success','Testimonie Is Updated Successfuly');
    }

    // Destroy Function
    public function destroy($id){
        $testimonie = Testimonie::findOrFail($id);
        $testimonie->destroy($id);
        
        return redirect('admin/testimonies')->with('success','Testimonie Is Deleted Successfuly');
    }
}
