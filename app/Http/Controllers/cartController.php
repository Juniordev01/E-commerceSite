<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Auth;
class cartController extends Controller
{
    //

    public function add_to_cart(Request $request)
    {
        if(Auth::check())
        {
        }
        else
        {
            return redirect()->to('login_');
        }
    }
}
