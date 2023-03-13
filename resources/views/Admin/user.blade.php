@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-lg-12 col-md-8 col-sm-6">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog mw-100 w-75" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="{{ route('register_user') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text"
                                            class=" form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" placeholder="Name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Email Address" required
                                            autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Confirm Password" required
                                            autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Select Role') }}</label>

                                    <div class="col-md-12">
                                        <select class="form-control " name="role">
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>

                                        <span>
                                            @error('role')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-lg-12 d-flex justify-content-between">
                    <h3>User</h3>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Create
                        User</button>
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
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="text-center">
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                <div class="">
                                                    <span class="mr-2">{{ $user->created_at }}</span>
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
                                                        <a class="dropdown-item" href="{{url('edit_user',$user->id)}}">
                                                            Edit
                                                        </a>
                                                        {{-- <a class="dropdown-item"
                                                    href="{{ url('edit_product', $role->id) }}">Edit</a> --}}
                                                        <a class="dropdown-item"
                                                            href="{{ url('delete_user', $user->id) }}">Delete</a>
                                                        <a class="dropdown-item"
                                                            href="{{ url('user_Roles', $user->id) }}">Roles</a>
                                                        <a class="dropdown-item"
                                                            href="{{ url('user_Permission', $user->id) }}">Permission</a>
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

