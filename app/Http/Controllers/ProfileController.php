<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //
    public function Profile()
    {
        $Profile =profile::with('user')->where('user_id',auth::user()->id)->first();
        if(!$Profile)
        {
            $updateProfile = new profile();
            $updateProfile->user_id = Auth::user()->id;
            $updateProfile->save();
            $Profile =profile::with('user')->where('user_id',auth::user()->id)->first();
            return view('Admin.Profile',compact('Profile'));
        }
        return view('Admin.Profile',compact('Profile'));
    }

    public function UpdateProfile(Request $request)
    {
        if($request->input('id'))
        {
            $updateProfile = profile::find($request->input('id'));
            $updateProfile->Full_name = $request->name; 
            $updateProfile->Phone_no = $request->number; 
            $updateProfile->Address = $request->address; 
            $updateProfile->city = $request->country; 
            $updateProfile->Language = $request->language; 
            $updateProfile->Github = $request->github; 
            $updateProfile->Twitter = $request->twitter; 
            $updateProfile->user_id = Auth::user()->id;
            if($request->hasfile("image"))
            {
                $file=$request->file('image');
                $filename=$file->getClientOriginalName();
                $extension=$file->getClientOriginalExtension();
                if($extension == "png"||$extension == "jpg"||$extension == "jpeg"||$extension == "svg"||$extension == "webp")
                {
                    $file->move('public/uploads/profile',$filename);
                    $updateProfile->Image = $filename; 
                }
            }
            if($updateProfile->update())
            {
                Alert::success('Profile', 'User Profile Updated Successfully');
                return redirect()->back();
            }
            else
            {
                Alert::error('Profile', 'User Profile not Updated');
                return redirect()->back();
            }       

        }
        else
        {
            $request->validate([
                'name' => 'required|max:255|regex:/^[a-z A-Z]+$/',
                // 'number' => 'required|max:12',
                // 'address' => 'required',
                // 'country' => 'required',
                // 'language' => 'required',
                // 'github' => 'required',
                // 'twitter' => 'required',
                // 'image' => 'required',
    
            ]);
            $updateProfile = new profile();
            $updateProfile->Full_name = $request->name; 
            $updateProfile->Phone_no = $request->number; 
            $updateProfile->Address = $request->address; 
            $updateProfile->city = $request->country; 
            $updateProfile->Language = $request->language; 
            $updateProfile->Github = $request->github; 
            $updateProfile->Twitter = $request->twitter; 
            $updateProfile->user_id = Auth::user()->id;
            if($request->hasfile("image"))
            {
                $file=$request->file('image');
                $filename=$file->getClientOriginalName();
                $extension=$file->getClientOriginalExtension();
                if($extension == "png"||$extension == "jpg"||$extension == "jpeg"||$extension == "svg"||$extension == "webp")
                {
                    $file->move('public/uploads/profile',$filename);
                    $updateProfile->Image = $filename; 
                }
            }
            if($updateProfile->save())
            {
                Alert::success('Profile', 'User Profile Updated Successfully');
                return redirect()->back();
            }
            else
            {
                Alert::error('Profile', 'User Profile not Updated');
            }       
        }
        }
       
}
