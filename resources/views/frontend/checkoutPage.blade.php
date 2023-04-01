@extends('layouts.frontend.client-master')
@section('content')
    <style>
        .main {
            margin-top: 70px;
        }
    </style>
    <!-- breadcrumb -->
    <div class="container main ">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>

    <!-- Shoping Cart -->
    <div class="bg0 p-t-35 p-b-85 m-4">
        <div class="container-xxl m-4">
            <div class="row ">
                <div class="col-lg-7 mx-3  m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head text-center">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                <?php $total = 0; ?>
                                @foreach ($CartItems as $CartItem)
                                    <tr class="table_row text-center">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{ '/public/uploads/' . $CartItem->productImage }}"
                                                    alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">{{ $CartItem->name }}</td>
                                        <td class="column-3">{{ $CartItem->price }}</td>
                                        {{-- <td class="column-3">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    id="quanity" name="num-product1" value="{{ $CartItem->quantity }}">

                                                <div
                                                    class="btn-num-product-up cl8 hov-btn3 quantity_increase trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td> --}}

                                        <td class="column-4">
                                            {{ $CartItem->quantity }}
                                        </td>
                                        <td class="column-5">{{ $CartItem->quantity * $CartItem->price }}</td>
                                    </tr>
                                    @php
                                        $total = $total + $CartItem->price * $CartItem->quantity;
                                    @endphp
                                @endforeach
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Coupon Code">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            {{-- <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mx-3  m-b-50">
                    <article class="card">
                        <div class="card-body p-5">
                            <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                <li class="nav-item">
                                    <span class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                        <i class="fa fa-credit-card"></i> Credit Card</span>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-tab-card">
                                    @foreach (['danger', 'success'] as $status)
                                        @if (Session::has($status))
                                            <p class="alert alert-{{ $status }}">{{ Session::get($status) }}</p>
                                        @endif
                                    @endforeach
                                    <form role="form" method="POST" id="paymentForm" action="{{ url('/stripePayout') }}">
                                        @csrf
                                        <input type="hidden" name="totalAmount"  value="{{ $total }}">
                                        <div class="form-group">
                                            <label for="username">Full name (on the card)</label>
                                            <input type="text" class="form-control" name="fullName"
                                                placeholder="Full Name">
                                                <span>
                                                    @error('fullName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cardNumber">Card number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cardNumber"
                                                    placeholder="Card Number">
                                                    <span>
                                                        @error('cardNumber')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </span>
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-muted">
                                                        <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                                        <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                                        <i class="fab fa-cc-mastercard fa-lg"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label><span class="hidden-xs">Expiration</span> </label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="month">
                                                            <option value="">MM</option>
                                                            @foreach (range(1, 12) as $month)
                                                                <option value="{{ $month }}">{{ $month }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span>
                                                            @error('month')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </span>
                                                        <select class="form-control" name="year">
                                                            <option value="">YYYY</option>
                                                            @foreach (range(date('Y'), date('Y') + 10) as $year)
                                                                <option value="{{ $year }}">{{ $year }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span>
                                                            @error('year')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label data-toggle="tooltip" title=""
                                                        data-original-title="3 digits code on back side of the card">CVV <i
                                                            class="fa fa-question-circle"></i></label>
                                                    <input type="number" class="form-control" placeholder="CVV"
                                                        name="cvv">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="subscribe btn btn-primary btn-block" type="submit"> Confirm
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
@endsection
{{-- @section('script')
    <script>
        $(document).ready(function() {
            $(".quantity_increase").click(function() {
                var quanity = $('#quanity').val();
                var id = $('.id').val();
                alert(id);
                $.ajax({
                    type: "get",
                    url: "checkout_product_quantity_increase",
                    data: {
                        id: id,
                        quanity: quanity,
                    },
                    success: function(response) {
                        console.log("success");
                    }
                });
            });
        });
    </script>
@endsection --}}
