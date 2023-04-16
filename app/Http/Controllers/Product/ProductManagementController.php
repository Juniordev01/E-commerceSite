<?php

namespace App\Http\Controllers\Product;
use App\Models\category;
use App\Models\product;
use App\Models\brand;
use App\Models\sub_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Notifications\createProductontify;
class ProductManagementController extends Controller
{

    public function addProduct()
    {
        $subcategoryList = sub_category::all();
        $categoryList = category::all();
        $brands = brand::all();
        return view('admin.insertItem',compact('categoryList','subcategoryList','brands'));
    }

    public function products()
    {
        $subcategoryList = sub_category::all();
        $categoryList = category::all();
        $brands = brand::all();
        $products = product::all();

        return view('Admin.products',compact('categoryList','subcategoryList','brands','products'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products,ProductName|max:255|regex:/^[a-zA-Z0-9\s\-]+$/',
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'category' => 'required',
            'subCategory' => 'required',
            'stock' => 'required',
            'size' => "required",
            "brands" =>"required",
            "images" =>"required",
            // "extra_images" =>"required"
        ]);

        $store = new product();
        $store->ProductName = $request->product_name;
        $store->ProductDescription = $request->description;
        $store->price = $request->amount;
        $store->Currencytype = $request->type;
        $store->stock = $request->stock;
        $store->Category_Id = $request->category;
        $store->subCatory_Id = $request->subCategory;
        $store->size = $request['size'];
        $store->brand_id  = $request->brands;
        $file=$request->file('images');
        $filename=$file->getClientOriginalName();
        $file->move('public/uploads/',$filename);
        $store->productImage= $filename;
        if($request->hasfile('extra_images'))
        {
            $file_name =  [];
                foreach ($request->file('extra_images') as $file) {
                    $filename= $file->getClientOriginalName();
                    $file->move('public/uploads',$filename);
                    $file_name[] =  $filename;
                }
                $images = json_encode($file_name);
                $store->productImage1 = $images;

                if($store->save())
                {
                    Alert::success('Product', 'Product Created Successfully');
                    return redirect()->back();
                }
                else
                {
                    return("failed");;
                    Alert::error('Category', 'Category did not addedd');
                }
        }
        if($store->save())
        {
            // return ("sadsdf");
            auth()->user()->notify(new createProductontify($store));
            Alert::success('Product', 'Product Created Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Product', 'Product did not addedd');
        }
}
    public function showproduct()
    {
        $allproducts = product::all();
        $products = product::all();

        $subcategoryList = sub_category::all();
        $categoryList = category::all();
        $brands = brand::all();
        return view('Admin.displayProduct', compact('products','subcategoryList','categoryList','brands'));
    }

    public function deleteProduct(Request $req,$id)
    {
        $del_product = product::find($id);

        if($del_product->delete())
        {
            Alert::success('Product Delete', 'Product Deleted Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Product Delete', 'Operation Failed ');
        }
    }
    public function edit_product($id)
    {
        $editProduct = product::where('id',$id)->with('brand')->with('category')->with('sub_category')->first();
        return $editProduct;
        $subcategoryList = sub_category::all();
        $categoryList = category::all();
        $brands = brand::all();
        return view('Admin.editProduct',compact('categoryList','subcategoryList','brands','editProduct'));
    }


    public function UpdateProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:255|regex:/^[a-z A-Z 1-9]+$/',
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'category' => 'required',
            'subCategory' => 'required',
            'stock' => 'required',
            'size' => "required",
            "brands" =>"required",
        ]);
        $updateProduct = product::find($request->id);
        $updateProduct->ProductName = $request->product_name;
        $updateProduct->ProductDescription = $request->description;
        $updateProduct->price = $request->amount;
        $updateProduct->Currencytype = $request->type;
        $updateProduct->stock = $request->stock;
        $updateProduct->Category_Id = $request->category;
        $updateProduct->subCatory_Id = $request->subCategory;
        $updateProduct->size = $request['size'];
        $updateProduct->brand_id  = $request->brands;
        if($request->hasfile('images'))
        {
            $file=$request->file('images');
            $filename=$file->getClientOriginalName();
            $file->move('public/uploads/',$filename);
            $updateProduct->productImage= $filename;
            if($updateProduct->save())
            {
                Alert::success('Product', 'Product Updated Successfully');
                return redirect()->back();
            }
            else
            {
                Alert::error('Product', 'Product did not addedd');
            }
        }
        if($request->hasfile('extra_images'))
        {
            $file_name =  [];
            foreach ($request->file('extra_images') as $file) {
                $filename= $file->getClientOriginalName();
                $file->move('public/uploads',$filename);
                $file_name[] =  $filename;
            }
            $images = json_encode($file_name);
            $store->productImage1 = $images;
            if($updateProduct->save())
            {
                Alert::success('Product', 'Product Updated Successfully');
                return redirect()->back();
            }
            else
            {
                Alert::error('Product', 'Product did not addedd');
            }
        }
        if($updateProduct->save())
        {
            Alert::success('Product', 'Product Updated Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Product', 'Product did not addedd');
        }

    }

    public function remove_product($id)
    {
        $delete_Product = product::find($id);
        if($delete_Product->delete())
        {
            Alert::success('Product', 'Product Deleted Successfully');
            return redirect()->back();
        }
        else
        {
            Alert::error('Product', 'Product did not deleted');
        }
    }

    public function Deactivate_product($id)
    {
        $updateStatus = product::find($id);
        $updateStatus->isActive = "Disabled";
        if( $updateStatus->save())
        {
            Alert::success('Product', 'Product Deactivated Successfully');
            return redirect()->back();
        }
    }

    public function Activate_product($id)
    {
        $updateStatus = product::find($id);
        $updateStatus->isActive = "Active";
        if( $updateStatus->save())
        {
            Alert::success('Product', 'Product Activated Successfully');
            return redirect()->back();
        }

    }
}
