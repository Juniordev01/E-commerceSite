{{-- @extends('layouts.AdminLayouts')
@section('content')
<head>    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h6> Sub Category Form</h6>
                    </div>
                    <form method="post" action="{{ url('addsubCategory') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="subCategory_name" class="form-control">
                                <span>
                                    @error('Category_name')
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
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="form-control select2" name="parentCategory">
                                    <option value="">Choose Category</option>
                                    @foreach ($subcategoryList as $list)
                                        <option value="{{$list->id}}">{{$list->subCategoryName}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="section-title mt-0">Category List</h6>
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($subcategoryList as $subcategory)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $subcategory->subCategoryName }}</td>
                                        <td>{{ $subcategory->subCategoryDescription }}</td>
                                        <td>{{ $subcategory->category_id }}</td>
                                        <td class="d-flex ">
                                          <a href=""><i class="material-icons mt-4" style="color: #03A9F4">&#xE417;</i></a>
                                            <a href=""><i class="material-icons mt-4" style="color: #FFC107">&#xE254;</i></a>
                                            <a href=""><i class="material-icons mt-4" style="color: #E34724">&#xE872;</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
 --}}
