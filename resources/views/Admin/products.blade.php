@extends('layouts.master')
@section('content')
    <style>
        .container {
            margin-top: -30px;
        }

        .block2-name {
            font-family: 'Montserrat-Regular';
            font-weight: 400;
        }

        .block2-name:hover {
            color: #555555;
        }
    </style>
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" product="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog mw-100 w-50" product="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Products form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('insertproduct') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" id="product"
                                    class="form-control product border">
                                <span>
                                    @error('product_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="description" class="form-control"></textarea>
                                <span>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Amount</label>
                                    <input type="number" name="amount" class="form-control amount border"
                                        placeholder="Amount">
                                    <span>
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Amount Type</label>
                                    <select class="form-control" name="type">
                                        <option value="">Amount Type</option>
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
                                        <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                        <select class="form-control" name="size">
                                            <option value="">Select</option>
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
                                        <option value="">Select</option>
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
                                        <option value="">Select</option>
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
                                <input type="file" class="form-control border" name="images">
                                <span>
                                    @error('images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-3">
                                <label>Extra Image</label>
                                <input type="file" class="form-control border" name="extra_images[]" multiple>
                                <span>
                                    @error('extra_images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Edit Modal --}}
        <div class="modal fade" id="editProduct" tabindex="-1" product="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog mw-100 w-50" product="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('insertproduct') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" id="id">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" id="product_name"
                                    class="form-control product border">
                                <span>
                                    @error('product_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <span>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Amount</label>
                                    <input type="number" name="amount" id="amount"
                                        class="form-control amount border" placeholder="Amount">
                                    <span>
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Amount Type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">Amount Type</option>
                                        <option value="PKR">PKR</option>
                                        <option value="INR">INR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                    <span>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Stock </label>
                                    <select class="form-control" name="stock" id="stock">
                                        <option value="">Select</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
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
                                        <select class="form-control " name="brands" id="brands">
                                            <option value="">Select</option>
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
                                        <select class="form-control" name="size" id="size">
                                            <option value="">Select</option>
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
                                    <select class="form-control " name="category" id="category">
                                        <option value="">Select</option>
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
                                    <select class="form-control " name="subCategory" id="subCategory">
                                        <option value="">Select</option>
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
                                <input type="file" class="form-control border" name="images" id="thumbnail">
                                <span>
                                    @error('images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-3">
                                <label>Extra Image</label>
                                <input type="file" class="form-control border" name="extra_images[]"
                                    id="extra_images" multiple>
                                <span>
                                    @error('extra_images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-12 d-flex justify-content-between">
                <h3>Products</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Products</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h6 class="section-title">Category List</h6> --}}
                        <table class="table table-hover">
                            <thead class="">
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr class="text-center">
                                        <td scope="row">
                                            <label class="checkbox-wrap checkbox-primary">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img src="{{ 'public/uploads/' . $product->productImage }}"
                                                        alt="">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">{{ $product->ProductName }}</span>
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            @if ($product->isActive == 'Active')
                                                <span class="badge badge-dot mr-4" style="color:#1fa750;">
                                                    <i class="bg-success"></i> {{ $product->isActive }}
                                                </span>
                                            @else
                                                <span class="badge badge-dot mr-4" style="color: #cfa00c">
                                                    <i class="bg-warning"></i> {{ $product->isActive }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">{{ $product->created_at }}</span>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v" style="color: #868B8E"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    {{-- <a class="dropdown-item" href="#edit" data-toggle="modal"
                                                        data-target="#editProduct"
                                                        data-product_name="{{ $product->ProductName }}"
                                                        data-description="{{ $product->ProductDescription }}"
                                                        data-id="{{ $product->id }}"
                                                        data-amount={{ $product->price }}
                                                        data-type = {{$product->Currencytype}}
                                                        data-stock = {{$product->stock}}
                                                        data-brands = {{$product->brand_id}}
                                                        data-size = {{$product->size}}
                                                        data-category = {{$product->Category_Id}}
                                                        data-subcategory  = {{$product->subCatory_Id}}
                                                        data-extra_images = {{$product->productImage1}}
                                                        data-thumbnail ={{$product->productImage}}
                                                        >
                                                        Edit
                                                    </a> --}}
                                                    <a class="dropdown-item"
                                                        href="{{ url('edit_product', $product->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ url('remove_product', $product->id) }}">Delete</a>
                                                    @if ($product->isActive == 'Active')
                                                        <a class="dropdown-item"
                                                            href="{{ url('Deactivate_product', $product->id) }}">Deactivate</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ url('Activate_product', $product->id) }}">Activate</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#editProduct').on('show.bs.modal', function(event) {
            // alert("moedl opend");
            var button = $(event.relatedTarget)
            var name = button.data('product_name')
            var description = button.data('description')
            var amount = button.data('amount')
            var type = button.data('type')
            var cat_id = button.data('id')
            var stock = button.data('stock')
            var brands = button.data('brands')
            var size = button.data('size')
            var category = button.data('category')
            var sub_category = button.data('subcategory')
            var thumbnail = button.data('thumbnail')
            // alert(thumbnail);
            var modal = $(this)
            modal.find('.modal-body #product_name').val(name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #amount').val(amount);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #stock').val(stock);
            modal.find('.modal-body #brands').val(brands);
            modal.find('.modal-body #size').val(size);
            modal.find('.modal-body #category').val(category);
            modal.find('.modal-body #subCategory').val(sub_category);
            modal.find('.modal-body #thumbnail').val(thumbnail);
            modal.find('.modal-body #id').val(cat_id);
        })
    </script>
@endsection
