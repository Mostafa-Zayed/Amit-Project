<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use Illuminate\Support\Facades\DB;
class TypeController extends Controller
{
    //Index Function
    public function index(Request $request){

        $types = DB::table('types');
        if($request->has('orderBy')){
            $types = $types->orderBy($request['orderBy']);
        }
        $types = $types->paginate(5);
        return view('admin/jobtypes.index',compact('types',$types));
    }
    
    // Create Function
    public function create(){

        return view('admin/jobtypes.create');
    }

    // Store Function
    public function store(Request $request){
        $this->validate($request,[
            'jobtype_name' => 'required',
            'icon' => 'required'
        ]);
        $jobtype =  new Type;
        $jobtype->name = $request['jobtype_name'];
        $jobtype->icon = $request['icon'];
        $jobtype->save();
        return redirect('admin/jobtypes')->with('success','Job Type Is Created Succeffuly');
    }

    // Edit Function
    public function edit($id){

        $jobtypes = Type::findOrFail($id);
        return view('admin.jobtypes.edit',compact('jobtypes',$jobtypes));
        
    }

    // Update Function
    public function update(Request $request, $id){
        
        $type = Type::findOrFail($id);
        $this->validate($request,[
            'jobtype_name' => 'required',
            'new_icon' => 'required'
        ]);
        
        $type->name = $request['jobtype_name'];
        $type->icon = $request['new_icon'];
        echo $type->type;
        $type->save();
        return redirect('admin/jobtypes')->with('success','The Jobt Type Is Updated Succeffuly');
    }

    // Destroy Function
    public function destroy($id){
        $jobtype = Type::findorFail($id);
        $jobtype->destroy($id);
        return redirect('admin/jobtypes')->with('success','Job Type Is Deleted Succeffuly');
        
    }
}
