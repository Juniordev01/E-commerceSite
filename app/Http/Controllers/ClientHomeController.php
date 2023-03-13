<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use Illuminate\Support\Facades\Crypt;

class ClientHomeController extends Controller
{
    public function home()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
        // return $products->count();
        return view('frontend.index',compact('categories','products'));
    }
    public function index_search(Request $request)
    {
        $query = $request->search;
        // $encryptParamerter = Crypt::encrypt($query);
        // return $encryptParamerter;
        $products =product::where('ProductName','LIKE',"%$query%")->get();
        // return $result;
        return view('frontend.index',compact('products'));
    }
    public function add_to_wishList(Request $request,$id)
    {
        return("asdasda");
        return $id;
    }

}
