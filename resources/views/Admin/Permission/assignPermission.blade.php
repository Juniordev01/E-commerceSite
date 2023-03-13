@extends('layouts.master')
@section('content')
<style>
    .assign_perm 
    {
        padding-right: 40px !important;
        padding-left: 40px;
        transition: all 1s;
    }
</style>
    <div class="card">
        <div class="card-header">
            <h4>Assign Permission to Role</h4>
        </div>
        <div class="card-body">
            <form action="{{url('UpdateRolePermission')}}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-12">
                        <input id="name" type="text" class=" form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $role->name }}" required autocomplete="name" placeholder="Name"
                            autofocus readonly>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">

                    @foreach ($permissions as $permission)
                        <div class="col-md-2 mt-4 d-flex justify-content-center">
                            <div class="pretty p-switch p-fill">
                                <input type="checkbox" class="" name="permissions[]"
                                    value="{{ $permission->name }}" />
                                <div class="state">
                                    <label class="">{{ $permission->name }}</label>
                                </div>
                            </div>

                            <span>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    @endforeach
                </div>
                
               
                <div class="row mt-4 d-flex justify-content-center ">
                    <button class="btn btn-outline-primary assign_perm">Assign</button>
                </div>
            </form>
        </div>
    </div>
@endsection
