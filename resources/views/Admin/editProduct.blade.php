@extends('layouts.master')
@section('content')
    <div class="col-12  d-flex justify-content-center">
        <div class="card col-8">
            <div class="card-header">
                <h4>Create Products</h4>
            </div>
            <form method="POST" action="{{ url('Update_Product') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$editProduct->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" value="{{$editProduct->ProductName}}" name="product_name" class="form-control">
                        <span>
                            @error('product_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea name="description"  class="form-control">{{$editProduct->ProductDescription}}</textarea>
                        <span>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Amount</label>
                            <input type="number" name="amount" value="{{$editProduct->price}}" class="form-control" placeholder="Amount">
                            <span>
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Amount Type</label>
                            <select class="form-control" name="type">
                                <option value="{{$editProduct->Currencytype}}">{{$editProduct->Currencytype}}</option>
                                <option value="PKR ">PKR</option>
                                <option value=" INR">INR</option>
                                <option value=" USD">USD</option>
                            </select>
                            <span>
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Stock </label>
                            <select class="form-control" name="stock">
                                <option value="{{$editProduct->stock}}">{{$editProduct->stock}}</option>
                                <option>100</option>
                                <option>200</option>
                                <option>300</option>
                            </select>
                            <span>
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="">Brands </label>
                                <select class="form-control " name="brands">
                                    <option value="{{$editProduct->brand_id}}">{{$editProduct->brand->brandName}}</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brandName }}</option>
                                    @endforeach
                                </select>
                                <span>
                                    @error('brands')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="">Size </label>
                                <select class="form-control " name="size">
                                    <option value="{{$editProduct->size}}">{{$editProduct->size}}</option>
                                    <option>XL</option>
                                    <option>X</option>
                                    <option>M</option>
                                    <option>L</option>
                                </select>
                                <span>
                                    @error('size')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 ">
                        <div class="col-lg-6">
                            <label>Category</label>
                            <select class="form-control " name="category">
                                <option value="{{$editProduct->Category_Id }}">{{$editProduct->category->Category_name}}</option>
                                @foreach ($categoryList as $category)
                                    <option value="{{ $category->id }}">{{ $category->Category_name }}</option>
                                @endforeach
                            </select>
                            <span>
                                @error('category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>

                        </div>
                        <div class="col-lg-6">
                            <label>Sub Category</label>
                            <select class="form-control " name="subCategory">
                                <option value="{{$editProduct->subCatory_Id}}">{{$editProduct->sub_category->subCategoryName}}</option>
                                @foreach ($subcategoryList as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->subCategoryName }}
                                    </option>
                                @endforeach
                            </select>
                            <span>
                                @error('subCategory')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label>Thumbnail Image</label>
                        <input type="file" value="{{$editProduct->productImage}}" class="form-control border" name="images">
                        <span>
                            @error('images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Extra Image</label>
                        <input type="file" value="{{$editProduct->productImage1}}" class="form-control border" name="extra_images[]" multiple>
                        <span>
                            @error('extra_images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Update</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
