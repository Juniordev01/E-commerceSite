@extends('layouts.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Update User</h5>
        <div class="card-body">
            <form method="POST" action="{{ url('UpdateUser') }}">
                @csrf
                <input type="hidden" name="id" value="{{$edit_user->id}}">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class=" form-control @error('name') is-invalid @enderror"
                            name="name"  value="{{$edit_user->name}}"  autocomplete="name" placeholder="Name"
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{$edit_user->email}}" placeholder="Email Address"  
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
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password"   autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="Confirm Password"   autocomplete="new-password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Select Role') }}</label>

                    <div class="col-md-12">
                        <select class="form-control " name="role">
                            <option value="{{$name}}">{{$name}}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
