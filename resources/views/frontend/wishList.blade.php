@extends('layouts.frontend.client-master')
@section('content')
<style>
    .main
    {
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
    <form class="bg0 my-4 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-5">Cart</th>
                                    <th class="column-5">Remove</th>
                                </tr>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{ asset('Frontend/images/item-cart-01.jpg') }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">Fresh Strawberries</td>
                                    <td class="column-3">$ 36.00</td>
                                    <td class="column-5"><a href=""><i style="font-size: 25px;" class="zmdi zmdi-shopping-cart"></i></a></td>
                                    <td class="column-5"><a href=""><i style="font-size: 25px;" class="zmdi zmdi-close"></i></a></td>
                                </tr>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">


                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 ">
                                Clear Wishlist
                            </div>
                        </div>
                    </div>
                </div>

                {{--  --}}
            </div>
        </div>
    </form>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
@endsection
