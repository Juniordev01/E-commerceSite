<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
   use  HasRoles;
    public function index_user()
    {
        $users = user::all();
        $roles = Role::all();
        return view('Admin.user',compact('users','roles'));
    }
    public function Role_index(Request $request,$id)
    { 
        $roles = Role::all();
        $user_id = $request->id;
        $permissions = permission::all();
        return view('Admin.Roles.userRoles',compact('roles','permissions','user_id'));
    }
    public function AssignRole(Request $request)
    {
        $user = user::find($request->user_id);
        $edit_user = User::with('roles')->where('id',$request->user_id)->first();
        // return $edit_user->roles;
        if($edit_user->roles)
        {
            Alert::error('Role Operation', 'Cannot Assign More then 1 role');
            return redirect()->back(); 
        }
        else
        {
            if($user->hasRole($request->role_name))
            {
                Alert::error('Role Operation', 'Role Already Assigned ');
                return redirect()->back(); 
            }
            else
            {
                $user->AssignRole($request->role_name);
                Alert::danger('Role Operation', 'Role Assigned ');
                return redirect()->back(); 
            }
        }
       
    }
    public function register(Request $request)
    {
        // return $request->input();
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->AssignRole($request->role);
        Mail::to("talha424588@gmail.com")->send(new Welcome());
        Alert::success('User Operation', 'User Created Successfully');
        return redirect()->back(); 
    }
    public function delete_user($id)
    {
        $del_user = User::find($id);
        if($del_user->delete())
        {
            Alert::success('User Operation', 'User Deleted Successfully');
            return redirect()->back(); 
        }
        else
        {
            Alert::error('User Operation', 'Failed');
            return redirect()->back(); 
        } 
    }

    public function edit_user($id)
    {
        $edit_user = User::with('roles')->where('id',$id)->first();
        // return $edit_user->roles;
        foreach ($edit_user->roles as $role) {
            $name = $role->name; 
        }
        $name;
        $roles = Role::all();
        return view('Admin.editUser',compact('edit_user','roles','name'));
    } 

    public function Update(Request $request)
    {
        $update_user = User::find($request->id);
        $update_user->name = $request->name;
        $update_user->email = $request->email;
        if ($request->password) {
            if($request->password = $request->password_confirmation)
            {
                $update_user->password = Hash::make($request->password);
                if($update_user->update())
                {
                    Alert::success('User Operation', 'User Updated Successfully');
                    return redirect()->back();  
                }
            }
            else
            {
                Alert::error('Update User', 'Password and Confirm Password are not same');
                return redirect()->back();  
            }
        }
        else
        {
            if($update_user->update())
                {
                    Alert::success('User Operation', 'User Updated Successfully');
                    return redirect()->back();  
                }
        }       
    }
    public function AssignPermissionTorole($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('Admin.Permission.assignPermission',compact('role','permissions'));
    }

    public function UpdateRolePermission(Request $request)
    {
        $role = Role::where('name',$request->name)->first();
        foreach ($request->permissions as $permission) {
            if(!$role->hasPermissionTo($permission))
            {
                $role->givePermissionTo($permission);
            }
        }
        Alert::success('Role Operation', 'Permission Assigned Successfully');
        return redirect()->back();  
    }
}


