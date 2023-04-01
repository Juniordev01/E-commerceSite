<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\cart;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Crypt;

class ClientHomeController extends Controller
{
    public function home()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->limit(8)->get();
        $wishlists = DB::table('wishlists')->get();
        // return $wishlist;
        // return $products->count();
        return view('frontend.index',compact('categories','products','wishlists'));
    }
    public function index_search(Request $request)
    {
        $query = $request->search;
        $products =product::where('ProductName','LIKE',"%$query%")->get();
        return view('frontend.index',compact('products'));
    }


}
