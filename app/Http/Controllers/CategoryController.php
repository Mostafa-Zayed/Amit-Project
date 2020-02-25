<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    // Index Function 
    public function index(Request $request){
      
        $categories = DB::table('categories');
        
        if($request->has('orderBy')){
            $sortorder = 'asc';
            if($request->has('sortOrder'))
                $sortorder = $request['sortOrder'];
                $categories = $categories->orderBy($request['orderBy'],$sortorder);
        }
        
        if($request->has('keywords')){
            $categories = $categories->where('name','like','%'.$request['keywords'].'%');
        }
        
        $categories = $categories->paginate(5);
        
        return view('admin.categories.index',compact('categories',$categories));
    }


    //   Create Function 
    public function create(){

        return view('admin.categories.create');

    }

    //  Store Function 
    public function store(Request $request){
        $this->validate($request,[
            'category_name' => 'required',
            'category_icon' => 'required'
        ]);

        $category = new Category([
            'name' => $request->get('category_name'),
            'icon' => $request->get('category_icon')
        ]);

        $category->save();
        Session::flash('success','Category Is Created Successfuly');
        return redirect('admin/categories');

    }

    //   Edit Function 
    public function edit($id){

        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category',$category));

    }


    //   Update Function
    public function update(Request $request,$id){
        
        $category= Category::findOrFail($id);
        $this->validate($request,[
            'category_name' => 'required',
            'category_icon' => 'required'
        ]);
        
        $category->name = $request['category_name'];
        $category->icon = $request['category_icon'];
        $category->save();
        return redirect('admin/categories')->with('success','Category Updated Successfuly');
        
    }


    // Destroy Function 
    public function destroy($id){

        $category = Category::findOrFail($id)->delete();
        return redirect('admin/categories')->with('success','Category Deleted Successfuly');
    }

}
