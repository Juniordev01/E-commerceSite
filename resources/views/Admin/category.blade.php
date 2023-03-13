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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('addcategory') }}">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="Category_name" class="form-control">
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
                        <h5 class="modal-title" id="exampleModalLabel">Category form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('updateCategory') }}">
                            @csrf
                            <input type="hidden" name="id" id="id" >
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="Category_name" id="Category_name" class="form-control">
                                <span>
                                    @error('Category_name')
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Add Category</button>
            </div>
        </div>
        <div class="row minus d-flex justify-content-center">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h6 class="section-title">Category List</h6> --}}
                        <table class="table table-hover">
                            <thead class="">
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categoryList as $category)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->Category_name }}</td>
                                        <td>{{ $category->Category_description }}</td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#edit" data-toggle="modal"
                                                        data-target="#edit" data-mytitle="{{$category->Category_name}}" data-description="{{$category->Category_description}}" data-id="{{$category->id}}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ url('remove_category', $category->id) }}">Delete</a>
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
                var title = button.data('mytitle')
                var description = button.data('description')
                var cat_id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #Category_name').val(title);
                modal.find('.modal-body #description').val(description);
                modal.find('.modal-body #id').val(cat_id);
            })
        </script>
    @endsection
