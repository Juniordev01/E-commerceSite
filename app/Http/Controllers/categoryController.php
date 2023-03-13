<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\sub_category;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class categoryController extends Controller
{
    //

    public function maincategory()
    {
        $categoryList = category::all();
        return view('Admin.category',['categoryList'=>$categoryList]);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'Category_name' => 'required|unique:categories|max:255|regex:/^[a-zA-Z]+$/',
            'description' => 'required',
        ]);
        $store = new category();
        $store->Category_name = $request->Category_name	;
        $store->Category_description = $request->description;
        if($store->save())
        {
            
            Alert::success('Category', 'Category Added Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Category', 'Category did not addedd');
        }
    }

    public function subCategory()
    {
        $subcategoryList = sub_category::with('category')->get();
        $categoryList = category::all();
        return view('Admin.subCategory',compact('categoryList','subcategoryList'));
    }

    public function StoresubCategory(Request $request)
    {
        
        $request->validate([
            'subCategory_name' => 'required|unique:sub_categories,subCategoryName|max:255|regex:/^[a-z A-Z]+$/',
            'description' => 'required',
            'parentCategory' => 'required',
        ]);
        
        $store = new sub_category();
        $store->subCategoryName	 = $request->subCategory_name	;
        $store->subCategoryDescription = $request->description;
        $store->category_id = $request->parentCategory;
        if($store->save())
        {  
            Alert::success('Category', 'Category Added Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Category', 'Category did not addedd');
        }
    }
    public function UpdatesubCategory(Request $request)
    {
        $updateChildCategory = sub_category::find($request->id);
        $updateChildCategory->subCategoryName =   $request->subCategory_name;
        $updateChildCategory->subCategoryDescription = $request->description;
        $updateChildCategory->category_id = $request->parentCategory;
        if($updateChildCategory->update())
        {
            Alert::success('Sub category Operation', 'Sub Category Updated Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('Sub Category Operation', 'Sub Category Updation Failed');
        }
    }

    public function Destroy($id)
    {
        $destroy = category::find($id);
        if($destroy->delete())
        {
            Alert::success('category Operation', 'Category Deleted Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('category Operation', 'Category Deletion Failed');
        }
    }

    public function DestroySubCategory($id)
    {
        $destroy = sub_category::find($id);
        if($destroy->delete())
        {
            Alert::success('category Operation', 'Category Deleted Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('category Operation', 'Category Deletion Failed');
        }
    }

    public function updateCategory(Request $request)
    {  
        $UpdateCategory = category::find($request->id);
        $UpdateCategory->Category_name = $request->Category_name;
        $UpdateCategory->Category_description = $request->description;
        if($UpdateCategory->update())
        {
            Alert::success('category Operation', 'Category Updated Successfully');
            return redirect()->back();  
        }
        else
        {
            Alert::error('category Operation', 'Category Updation Failed');
        }
    }
}
