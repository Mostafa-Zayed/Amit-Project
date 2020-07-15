<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();
        return view('admin/permissions.index',compact('permissions',$permissions));
    }

    public function create(){
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'permission_show'   => 'required',
            'permission_add'    => 'required',
            'permission_update' => 'required',
            'permission_delete' => 'required',
            'permission_name'   => 'required'
        ]);
        $permission = new Permission;
        $permission->show = $request['permission_show'];
        $permission->add  = $request['permission_add'];
        $permission->update = $request['permission_update'];
        $permission->delete = $request['permission_delete'];
        $permission->name   = $request['permission_name'];
        $permission->save();
        return redirect('admin/permissions')->with('success','New Permission Is created Succffuly');
    }

    public function edit($id){
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit',compact('permission',$permission));
    }

    public function update(Request $request,$id){
        
        $this->validate($request,[
            'permission_show'   => 'required',
            'permission_add'    => 'required',
            'permission_update' => 'required',
            'permission_delete' => 'required',
            'permission_name'   => 'required'
        ]);
        $permission = Permission::findOrFail($id);
        $permission->show = $request['permission_show'];
        $permission->add  = $request['permission_add'];
        $permission->update = $request['permission_update'];
        $permission->delete = $request['permission_delete'];
        $permission->name   = $request['permission_name'];
        $permission->save();

        return redirect('admin/permissions')->with('success','Permissions Is Updated Succeffuly');
        
    }

    public function destroy($id){

        $permission = Permission::findOrFail($id);
        $permission->destroy($id);

        return redirect('admin/permissions')->with('success','Permission Is Deleted Successfully');
    }
}
