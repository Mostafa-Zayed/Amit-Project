<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
    //
    public function index(){

        $pages = Page::all();
        return view('admin/pages.index',compact('pages',$pages));
    }

    public function create(){
        return view('admin.pages.create');
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'page_name' => 'required'
        ]);

        $page = new Page;
        $page->name = $request['page_name'];
        $page->save();

        return redirect('admin/pages')->with('success','Page Is  Created Succefully');
    }

    public function edit($id){
        $page = Page::findOrFail($id);
        return view('admin.pages.edit',compact('page',$page));
    }

    public function update(Request $request,$id){
        $page = Page::findOrFail($id);
        $page->name = $request['page_name'];
        $page->save();

        return redirect('admin/pages')->with('success','Page Is Updated Succefully');
    }
    public function destroy($id){

        $page = Page::findOrFail($id)->delete();
        return redirect('admin/pages')->with('success','Page Deleted Successfuly');
    }
}
