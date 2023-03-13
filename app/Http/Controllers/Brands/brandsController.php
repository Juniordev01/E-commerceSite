<?php

namespace App\Http\Controllers\Brands;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;
class brandsController extends Controller
{
    //
    public function brand()
    {
        $brands = brand::all();
        return view('Admin.brands')->with('brands',$brands);
    }

    public function storeBrands(Request $request)
    {
       
        $request->validate([
            'brand_name' => 'required|unique:sub_categories,subCategoryName|max:255|regex:/^[a-z A-Z]+$/',
            'Brand_description' => 'required',
            'Brand_Image' => 'required',
        ]);
        
        $store_brand = new brand();
        $store_brand->brandName	 = $request->brand_name	;
        $store_brand->description = $request->Brand_description;
 
        if($request->hasfile('Brand_Image'))
        {
            $file=$request->file('Brand_Image');
            // $extension=$file->getClientOriginalExtension();
            $filename= $file->getClientOriginalName();
            // $filename = time().'.'.$extension;
            $file->move('public/uploads',$filename);
            $store_brand->Brand_Image = $filename;   
        }
        
        if($store_brand->save())
        {  
            Alert::success('Brands', 'Brands Added Successfully');
            $brands = brand::all();

            return redirect()->back()->with('brand',$brands);
        }
        else
        {
            Alert::error('Brands', 'Brands did not addedd');
        }
    }
}
