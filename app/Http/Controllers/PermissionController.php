<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function Permission_index()
    {
        $permissions = Permission::all();
        return view('Admin.Permission.permission',['permissions'=>$permissions]);
    }

    public function createPermission(Request $request)
    {     
        $validated = $request->validate([
            'name' => "required|max:20|min:3"
        ]);
        $create_Permission = new Permission();
        $create_Permission->name = $request->name;
        if($create_Permission->save())
        {
            Alert::success('Permission Operation', 'Permission Created Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('Permission Operation', 'Permission Creation Failed');
        }
    }
    public function UpdatePermission(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|max:20|min:3"
        ]);
        
        $Update_Permission = Permission::find($request->id);
        $Update_Permission->name = $request->name;
        if($Update_Permission->update())
        {
            Alert::success('Permission Operation', 'Permission Updated Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('Permission Operation', ' Updation Failed');
        }
    }

    public function delete_permission($id)
    {
        $delete_permission = Permission::find($id);
        if($delete_permission->delete())
        {
            Alert::success('Permission Operation', 'Permission Delete Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('Permission Operation', ' Operation Failed');
        }
    }  
    

}
