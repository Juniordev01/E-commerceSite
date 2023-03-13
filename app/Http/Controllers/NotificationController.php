<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function mark_as_read($id)
    {
        if($id)
        {
            auth()->user()->notifications->where('id',$id)->markAsRead();
            return redirect()->back();
        }
    }
}
