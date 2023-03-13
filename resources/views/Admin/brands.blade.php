@extends('layouts.master')
@section('content')
<style>
    .brand_name
    {
        padding-top: 100px;
    }
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
                <h3>Brands</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Create Brand</button>
            </div>
        </div>
        <div class="row mt-3  ">
            @foreach ($brands as $brand)
                <div class="col-lg-3">
                    <div class="card align-center">
                        <div class="card-body">
                            <img src='{{ 'public/uploads/' . $brand['Brand_Image'] }}' width="100px" height="80px;"/>
                            <div>
                                <span class="brand_name">{{ $brand->brandName }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
