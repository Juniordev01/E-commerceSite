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
                        <h5 class="modal-title" id="exampleModalLabel">Coupon Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('addCoupon') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <span>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" name="amount" class="form-control">
                                <span>
                                    @error('Coupon_amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Coupon Date</label>
                                <input name="date" class="form-control" type="date">
                                <span>
                                    @error('date')
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
                        <form method="post" action="{{ url('updateCoupon') }}">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name"  id="name" class="form-control">
                                <span>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control">
                                <span>
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" id="date" class="form-control">
                                <span>
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-12 d-flex justify-content-between">
                <h3>Coupon</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Add Coupon</button>
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
                                    <th scope="col">Amount</th>
                                    <th scope="col">Valid Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($coupons as $coupon)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->amount }}</td>
                                        <td>{{ $coupon->valid_until }}</td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div  class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a style="color: #868B8E" class="dropdown-item" href="#edit" data-toggle="modal"
                                                        data-target="#edit" data-name="{{ $coupon->name }}" data-amount="{{ $coupon->amount }}"
                                                        data-date="{{ $coupon->valid_until }}"
                                                        data-id="{{ $coupon->id }}">Edit</a>
                                                    <a style="color: #868B8E" class="dropdown-item"
                                                        href="{{ url('remove_coupon', $coupon->id) }}">Delete</a>
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
                var button = $(event.relatedTarget)
                var name = button.data('name')
                alert(name);
                var amount = button.data('amount')
                var date = button.data('date')
                var cat_id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #amount').val(amount);
                modal.find('.modal-body #date').val(date);
                modal.find('.modal-body #id').val(cat_id);
            })
        </script>
    @endsection
