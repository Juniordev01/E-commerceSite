<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class couponController extends Controller
{
    //
    public function couponIndex()
    {
        $coupons = coupon::all();
        return view('Admin.coupon',compact('coupons'));
    }

    public function createCoupon(Request $request)
    {

        $request->validate( [
            'name' => ['required', 'max:255','unique:cupons'],
            'amount' => ['required'],
            'date' => ['required'],

        ]);

        $coupon = new coupon();
        $coupon->name =  $request->name;
        $coupon->amount =  $request->amount;
        $coupon->valid_until = $request->date;
        if($coupon->save())
        {
            Alert::success('Coupon Operation', 'Coupon Created Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Coupon Operation', 'Coupon creation  failed');
            return redirect()->back();
        }
    }

    public function updateCoupon(Request $request)
    {
        $coupon = coupon::find($request->input('id'));
        $coupon->name = $request->name;
        $coupon->amount = $request->amount;
        $coupon->valid_until = $request->date;
        if($coupon->save())
        {
            Alert::success('Coupon Operation', 'Coupon Updated Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Coupon Operation', 'Coupon Updation Failed');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $coupon = coupon::find($id);
        if($coupon->delete())
        {
            Alert::success('Coupon Operation', 'Coupon Deleted Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Coupon Operation', 'Coupon Deletion Failed');
            return redirect()->back();
        }
    }
    public function discount(Request $request)
    {
        $coupon = coupon::where('name',$request->coupon)->first();
        session::put('coupon', $coupon->amount);
        return redirect()->back();
    }
}
