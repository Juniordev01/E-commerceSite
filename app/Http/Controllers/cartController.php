<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class cartController extends Controller
{
    //

    public function add_to_cart(Request $request)
    {
        if(Auth::check())
        {
            $cart_product = cart::where('product_id',$request->id)->first();
            if($cart_product)
            {
                $cart_product->quantity = $cart_product->quantity+$request->quantity;
                if($cart_product->update())
                {
                    return redirect()->back()->with('error_code', 5);
                }
            }
            $product= product::find($request->id);
            $add_to_cart = new cart();
            $add_to_cart->user_id = Auth::user()->id;
            $add_to_cart->product_id = $request->id;
            $add_to_cart->quantity = $request->quantity;
            $add_to_cart->name = $product->ProductName;
            $add_to_cart->price = $product->price;
            $add_to_cart->size = $request->size;
            $add_to_cart->productImage = $product->productImage;
            if($add_to_cart->save())
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->to('login_');
        }
    }

    public function checkout()
    {
        // $check = cart::with('cart')->get();
        // return $check;
        if(Auth::check())
        {
        $CartItems = cart::with('user')->where('user_id',Auth::user()->id)->get();;
        return view('frontend.checkoutPage',compact('CartItems'));
        }
        else
        {
            return redirect()->to('login_');
        }
    }

    // public function quantityIncrement(Request $request)
    // {
    //     $cart_product = cart::where('id',$request->id)->get();
    //     print_r($cart_product);
    //     die();
    //     if($cart_product)
    //     {
    //         $cart_product->quantity = $cart_product->quantity+$request->quantity;
    //         if($cart_product->update())
    //         {
    //             return redirect()->back();
    //         }
    //     }
    // }
}
