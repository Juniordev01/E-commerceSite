@extends('layouts.master')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('StorePermission') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Permission Name</label>
                            <input type="text" name="name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
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

    {{-- Edit Modal --}}
    <div class="modal fade" id="editpermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('UpdatePermission') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label>Permission Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
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
    <div class="row my-2">
        <div class="col-lg-12 d-flex justify-content-between">
            <h3>Permission</h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Create Permission</button>
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
                                <th scope="col">Id</th>
                                <th scope="col">Role</th>
                                <th scope="col">Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr class="text-center">
                                    <td>
                                        {{ $permission->id }}
                                    </td>
                                    <td>
                                        {{ $permission->name }}
                                    </td>
                                    <td>
                                        {{ $permission->guard_name }}
                                    </td>
                                    <td>
                                        <div class="">
                                            <span class="mr-2">{{ $permission->created_at }}</span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="#edit" data-toggle="modal"
                                                    data-target="#editpermission" data-permission_name="{{ $permission->name }}"
                                                    data-id="{{ $permission->id }}">
                                                    Edit
                                                </a>
                                                {{-- <a class="dropdown-item"
                                                    href="{{ url('edit_product', $role->id) }}">Edit</a> --}}
                                                <a class="dropdown-item"
                                                    href="{{ url('delete_permission', $permission->id) }}">Delete</a>
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
        $('#editpermission').on('show.bs.modal', function(event) {
            // alert("moedl opend");
            var button = $(event.relatedTarget)
            var permission_name = button.data('permission_name')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #name').val(permission_name);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection