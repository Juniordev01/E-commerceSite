<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\wishlist;
use App\Models\sub_category;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class shopController extends Controller
{
    //
    public function shop_index()
    {
        return view('frontend.shop');
    }
    public function women_items()
    {
        // sub_categories
        // $products = DB::table('products')
        // ->join('categories','categories.id', '=','products.Category_Id')
        // ->join('sub_categories','products.subCatory_Id','=','sub_categories.id')
        // ->get();
        $products = DB::table('categories')
       ->join('products','categories.id','products.Category_Id')
       ->where('Category_name','Women')
       ->get();
        // $products = product::with('category')->with('sub_category')->get();
        return view('frontend.shop',compact('products'));
    }
    public function men_items()
    {
       $products = DB::table('categories')
       ->join('products','categories.id','products.Category_Id')
       ->where('Category_name','Men')
       ->get();
        // $products = category::with('product')->where('Category_name','Men')->get();
        // return $products;

        // $products = product::with('category')->with('sub_category')->get();
        return view('frontend.shop',compact('products'));
    }

    public function shop_items()
    {
        $products = DB::table('products')
        ->join('categories','categories.id', '=','products.Category_Id')
        ->join('sub_categories','products.subCatory_Id','=','sub_categories.id')
        ->get();

        // $products = product::with('category')->with('sub_category')->get();
        return view('frontend.shop',compact('products'));
    }

    public function product_details($id)
    {
        // $product = product::with('category')->find($id);
        $product = DB::table('products')
        ->where('id',$id)
        ->first();
        $relatedProducts  = DB::table('products')
        ->where('Category_Id',$product->Category_Id)
        ->whereNot('id',$product->id)
        ->limit(5)
        ->get();
        // return $relatedProducts ;
        return view('frontend.product-detail',compact('product','relatedProducts'));
    }
    public function QuickView($id)
    {
        $products = product::find($id);
        if($products)
        {
            return response()->json([
                "status" => 200,
                "Message" => "Product Fetched Successfully",
                "products" => $products,
            ]);
        }
        else
        {
            return response()->json([
                "status" => 404,
                "Message" => "Product Not Found"
            ]);
        }
    }

    public function allproducts()
    {
        $products = product::all();
        return $products;
        return response()->json([
            "product" => ($products),
        ]);
    }

    public function wishlist()
    {
        return view('frontend.wishList');
    }

    public function add_to_wishlist($id)
    {
        // return ($id);
        if(Auth::user())
        {
            $already_added = wishlist::where('product_id',$id)->first();
            if(empty($already_added))
            {
            $wishlist = new wishlist();
            $wishlist->product_id = $id;
            $wishlist->user_id = auth()->user()->id;
            if($wishlist->save())
            {
                Alert::success('WishList', 'Product added to wishlist');
                return redirect()->back();
            }
            }
            else
            {
                return ("failed");
                Alert::success('WishList', 'Product already added to wishlist');
                return redirect()->back();
            }
        }
        else
        {
            return view('Admin.login');
        }
    }
}

?>
