<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonie;
class TestimonieController extends Controller
{
    //
    public function index(){
        $testimonies = Testimonie::all();
        
        return view('admin.testimonies.index',compact('testimonies',$testimonies));
    }

    public function show($id){
        $testimonie = Testimonie::findOrFail($id);
        return view('admin.testimonies.show',compact('testimonie',$testimonie));
    }
    public function create(){

        return view('admin.testimonies.create');
    }

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

    public function edit($id){
        $testimonie = Testimonie::findOrFail($id);
        return view('admin/testimonies.edit',compact('testimonie',$testimonie));
    }

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

    public function destroy($id){
        $testimonie = Testimonie::findOrFail($id);
        $testimonie->destroy($id);
        
        return redirect('admin/testimonies')->with('success','Testimonie Is Deleted Successfuly');
    }
}
