@extends('layouts.master')
@section('content')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        .container {
            margin-top: -30px;
        }
    </style>
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sub Category Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('addsubCategory') }}">
                            @csrf
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" name="subCategory_name" class="form-control">
                                <span>
                                    @error('subCategory_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Sub Category Description</label>
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
                                    @foreach ($categoryList as $category)
                                        <option value="{{ $category->id }}">{{ $category->Category_name }}</option>
                                    @endforeach
                                </select>
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
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sub Category Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('UpdatesubCategory') }}">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" name="subCategory_name" id="subCategory_name" class="form-control">
                                <span>
                                    @error('subCategory_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Sub Category Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <span>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="form-control select2" name="parentCategory" id="parentCategory">
                                    <option value="">Choose Category</option>
                                    @foreach ($categoryList as $category)
                                        <option value="{{ $category->id }}">{{ $category->Category_name }}</option>
                                    @endforeach
                                </select>
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
                <h3>Category</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Sub Category</button>
            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="section-title mt-0">Sub Category List</h6>
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
                                @foreach ($subcategoryList as $subcategory)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $subcategory->subCategoryName }}</td>
                                        <td>{{ $subcategory->subCategoryDescription }}</td>
                                        <td>{{ $subcategory->category->Category_name }}</td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v" style="color: #868B8E"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <a class="dropdown-item" href="#edit" data-toggle="modal"
                                                        data-target="#edit" data-title="{{ $subcategory->subCategoryName }}"
                                                        data-description="{{ $subcategory->subCategoryDescription }}"
                                                        data-id="{{ $subcategory->id }}" data-category="{{$category->id}}" data-toggle="modal"
                                                        data-target="#edit">Edit</a>

                                                    <a class="dropdown-item"
                                                        href="{{ url('remove_subcategory',$subcategory->id) }}">Delete</a>
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
    @endsection
    @section('script')
        <script>
            $('#edit').on('show.bs.modal', function(event) {
                alert("moedl opend");
                var button = $(event.relatedTarget)
                var title = button.data('title')
                var description = button.data('description')
                var category = button.data('category')
                var cat_id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #subCategory_name').val(title);
                modal.find('.modal-body #description').val(description);
                modal.find('.modal-body #parentCategory').val(category);
                modal.find('.modal-body #id').val(cat_id);
            })
        </script>
        <script>
            <script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
        </script>
    @endsection
