@extends('layouts.master')
@section('content')
    <style>
        .fa-solid {
            /* margin-top: 4px; */
            padding: 3px;
        }

        #btn_delete {
            padding: 5px 15px 5px 15px;
            color: #ff9017;
            font-family: 'Helvetica Neue',
        }

        .delete {
            color: #ff9017;
        }

        #edit_icon {
            color: #969696;
        }

        #btn_edit {
            padding: 5px 15px 5px 15px;
        }

        .a-pen {
            color: grey;
        }

        /* #btn_delete
                            {
                                border-radius: 3px;
                                width: 130px;
                                height: 30px;
                                border: 1px !important;
                                border-color: grey !important;
                                color: #ff9017;
                                text:bold;
                                background-color: white;

                            }
                            #btn_edit
                            {
                                border-radius: 3px;
                                width: 130px;
                                height: 30px;
                            } */
    </style>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('storeBrands') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" class="form-control">
                            <span>
                                @error('brand_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Brand Description</label>
                            <textarea name="Brand_description" class="form-control"></textarea>
                            <span>
                                @error('Brand_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Brand Image</label>
                            <input type="file" name="Brand_Image" class="form-control">
                            <span>
                                @error('Brand_Image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <h3>Products</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Create Products</button>
            </div>
        </div>
        <div class="row mt-3  ">
            @foreach ($products as $products)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                            <img src='{{ 'public/uploads/' . $products->productImage }}' calss="text-center" height="150px"
                                width="150px" />
                        </div>

                        <div class="d-flex justify-content-center">
                            <span>{{ Str::limit($products->ProductName, 20) }}</span>

                        </div>
                        <div class="d-flex justify-content-center">
                            <span>{{ $products->Currencytype }} {{ $products->price }}</span>
                        </div>

                        <div class="card-footer">
                            <div class=" d-flex justify-content-center">
                                <button id="btn_edit" type="button" value="{{ $products->id }}"
                                    class="card-link d-flex btn-outline border rounded edit_btn"><i {{-- class="fa-sharp fa-solid fa-pen " id="edit_icon"></i><a href="{{url('editProduct',$products->id)}}" class="text-decoration-none text-dark ">Edit</a></button> --}}
                                        class="fa-sharp fa-solid fa-pen  " id="edit_icon"></i>Edit</button>

                                <button id="btn_delete" class="card-link d-flex btn-outline border rounded"><i
                                        class="fa-sharp fa-solid fa-trash"></i> <a
                                        href="{{ url('deleteProduct', $products->id) }}"
                                        class="delete text-decoration-none">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="">
                <!--  Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" style="width:1250px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('insertproduct') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="product_name" class="form-control">
                                            <span>
                                                @error('product_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Description</label>
                                            <textarea name="description" class="form-control"></textarea>
                                            <span>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="">Amount</label>
                                                <input type="number" name="amount" class="form-control"
                                                    placeholder="Amount">
                                                <span>
                                                    @error('amount')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for=""> Type</label>
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
                                            <div class="col-lg-6 col-md-6">
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
                                                            <option value="{{ $brand->id }}">{{ $brand->brandName }}
                                                            </option>
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

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Category</label>
                                                <select class="form-control " name="category">
                                                    <option value="">Select</option>
                                                    @foreach ($categoryList as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->Category_name }}</option>
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
                                                        <option value="{{ $subcategory->id }}">
                                                            {{ $subcategory->subCategoryName }}
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
                                            <label>Select Image</label>
                                            <input type="file" class="form-control" name="images[]" multiple>
                                            {{-- <div class="wrapper">
                                    <div class="sections">
                                      <section class="active">  
                                        <div class="images" name="images">
                                          <div class="pic" name="images">
                                            <i class="fa-solid fa-cloud-arrow-up" ></i>
                                           <div>
                                            <span>upload</span>
                                           </div>
                                          </div>
                                        </div>
                                      </section>
                                    </div>
                                  </div> --}}
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_btn', function() {
            var id = $(this).val();
            // alert(id);
            $('#editModal').modal('show');
        });
    });
</script>
@endsection
