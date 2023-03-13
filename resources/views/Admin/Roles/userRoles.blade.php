@extends('layouts.master')
@section('content')
    <style>
        .container {
            margin-top: -35px;
        }

        /* . {
                                background-color: #cff6dd;
                                color: #1fa750;
                                color: #cfa00c;
                                color: #40bfc1;
                                color: #40bfc1;
                            } */
        #assign span {
            margin-top: 15px !important;
        }
    </style>
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog mw-100 w-50" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Role Permission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-6 my-2">
                            {{-- @foreach ($permissions as $permission)
                                    <div class="g-3 d-block">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" class="" name="permissions[]"
                                                value="{{ $permission->name }}" />
                                            <div class="state">
                                                <label class="">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            {{-- <form action="{{ url('Add-Permission-to-Role') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                @foreach ($permissions as $permission)
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" class="" name="permissions[]"
                                            value="{{ $permission->name }}" />
                                        <div class="state">
                                            <label class="">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Role</button>
                        </div>
                        </form> --}}
                    </div>

                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-12 d-flex justify-content-between">
                <h3>Roles</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Create Role</button>
            </div>
        </div>
    </div>
    <div class="row g-4">
        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">

                            {{-- <h6 class="fw-normal">Total 4 users</h6> --}}

                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                {{-- <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-sm pull-up" aria-label="Vinnie Mostowy"
                                    data-bs-original-title="Vinnie Mostowy">
                                    <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar">
                                </li> --}}
                                {{-- <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Julee Rossignol" data-bs-original-title="Julee Rossignol">
                            <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kaith D'souza" data-bs-original-title="Kaith D'souza">
                            <img class="rounded-circle" src="../../assets/img/avatars/15.png" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="John Doe" data-bs-original-title="John Doe">
                            <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar">
                            </li> --}}
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h4 class="mb-1">{{ $role->name }}</h4>
                                <a href="{{url('AssignPermission',$role->id)}}" class="role-edit-modal">
                                    <small class="text-decoration-none" data-toggle="modal" data-target="#exampleModal">
                                        Edit Role
                                    </small>
                                </a>
                            </div>
                            <div class="">
                                <form action="{{ url('AssignRole') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user_id }}" id="">
                                    <input type="hidden" name="role_name" value="{{ $role->name }}" id="">
                                    <button type="submit" class="  btn btn-outline" id="assign"><span>Assign
                                            Role</span></button>
                                    {{-- <div class="pretty p-switch p-fill">
                                        <input type="checkbox" class="" name="role[]"
                                            value="{{ $role->name }}" />
                                        <div class="state">
                                            <label class="">Assign</label>
                                        </div>
                                    </div> --}} 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
