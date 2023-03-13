@extends('layouts.master')
@section('content')
    <style>
        .container {
            margin-top: -35px;
        }

        . {
            background-color: #cff6dd;
            color: #1fa750;
            color: #cfa00c;
            color: #40bfc1;
            color: #40bfc1;
        }
    </style>
    <!-- Modal -->
    <div class="col-lg-12 col-md-8 col-sm-6">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('AssignPermission') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Role Name</label>
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
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="{{ url('UpdateRole') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label>Role Name</label>
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
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-12 d-flex justify-content-between">
                <h3>Roles</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Create Role</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
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
                                @foreach ($role as $role)
                                    <tr class="text-center">
                                        <td>
                                            {{ $role->id }}
                                        </td>
                                        <td>
                                            {{ $role->name }}
                                        </td>
                                        <td>
                                            {{ $role->guard_name }}
                                        </td>
                                        <td>
                                            <div class="">
                                                <span class="mr-2">{{ $role->created_at }}</span>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#edit" data-toggle="modal"
                                                        data-target="#editRole" data-role_name="{{ $role->name }}"
                                                        data-id="{{ $role->id }}" >
                                                        <i class="far fa-edit"></i> Edit
                                                    </a>
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ url('edit_product', $role->id) }}">Edit</a> --}}
                                                        <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item has-icon text-danger"
                                                        href="{{ url('delete_role', $role->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
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
    </div>
@endsection
@section('script')
    <script>
        $('#editRole').on('show.bs.modal', function(event) {
            // alert("moedl opend");
            var button = $(event.relatedTarget)
            var role_name = button.data('role_name')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #name').val(role_name);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection
