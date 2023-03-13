<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\role_has_permission;
class RolesController extends Controller
{
    //
    public function roles_index()
    {
        // $role =role_has_permission::with('Role')->get();
        $role = Role::with('role_has_permission')->get();
        $permissions = Permission::all();
        return view('Admin.Roles.role',compact('role','permissions'));
    }
    public function createRole(Request $request)
    {
        $request->validate([
            'name' => "required|max:20|min:3"
        ]);
        $create_role = new Role();
        $create_role->name = $request->name;
        if($create_role->save())
        {
            Alert::success('Role Operation', 'Role Created Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('Role Operation', 'Roles Creation Failed');
        }
    }
    public function RemoveRole($id)
    {
        $remove = role::find($id);
        if($remove->delete())
        {  
            Alert::success('Role Operarion', 'Role Deleted Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Role Operarion', 'Operation Failed ');
        }
    }

    public function UpdateRole(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|max:20|min:3"
        ]);
        $Update_role = Role::find($request->id);
        $Update_role->name = $request->name;
        if($Update_role->update())
        {
            Alert::success('Role Operation', 'Role Update Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('Role Operation', 'Role Updation Failed');
        }
    }

    public function AssignPermissionToRole(Request $request)
    {  
        $validated = $request->validate([
            'name' => "required|max:20|min:3 "
        ]);
        $create_role = new Role();
        $create_role->name = $request->name;
        if($create_role->save())
        {   
            if($request->input('permissions') == "")
            {
                Alert::success('Role Operation', 'Role Created Successfully');
                return redirect()->back();  
            }
            else
            {
                foreach ($request->permissions as  $permission) {
                    $create_role->givePermissionTo($permission);
                }    
                Alert::success('Permission Operation', 'Permission Assigned  Successfully');
                return redirect()->back(); 
            }  
        }
        else
        {
            Alert::error('Permission Operation', 'Permission Assigned  Failed');
            return redirect()->back(); 
        }
    }
}
