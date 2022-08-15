@extends('layouts.app_frontend')
@section('content')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><a href="cart.html">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cart-main-area ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product">id</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shoppings as $key => $item)
                                    @php
                                        $total = $item->qty * $item->price;
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="{{ pare_url_file($item->options->avatar) }}"alt="cart-image">
                                            </a>
                                        </td>
                                        <td class="product-subtotal">
                                            {{ $item->id }}
                                        </td>
                                        <td class="product-name"><a href="#">{{ $item->name }}</a></td>
                                        <td class="product-price">
                                            <span class="amount">{{ $item->price }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <input type="number" min="1" value="{{ $item->qty }}">
                                        </td>
                                        <td class="product-subtotal">
                                            {{ $total }}
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('shopping.delete', $key) }}"><i class="fa fa-times"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="checkbox-form mb-sm-40">
                                <h3>Billing Details</h3>
                                <form action="{{ route('shopping.pay') }}  " method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-form-list mb-30">
                                                <label>Full Name <span class="required">*</span></label>
                                                <input type="text" name="name"
                                                    @if (Auth::check()) value="{{ Auth::user()->name }}"
                                                @else
                                                    value="" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list mb-30">
                                                <label>Address <span class="required">*</span></label>
                                                <input type="text" name="address"
                                                    @if (Auth::check()) value="{{ Auth::user()->address }}"
                                                    @else
                                                        value="" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="email" name="email" placeholder="tinhnt@gmail.com"
                                                    value="{{ get_data_user('web', 'email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" name="phone"
                                                    @if (Auth::check()) value="{{ Auth::user()->phone }}"
                                                    @else
                                                        value="" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="different-address">
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Order Notes</label>
                                                <textarea id="checkout-mess" name="note" cols="30" rows="10"
                                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wc-proceed-to-checkout">
                                        @if (!Auth::check())
                                            <!-- New Customer Start -->
                                            <div class="col-md-6">
                                                <a class="customer-btn" href="{{ route('login') }}">
                                                    Please Login To Continute
                                                </a>
                                            </div>
                                        @else
                                            <button class="btn btn-primary">Thanh Toán</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Cart Totals</h2>
                                <br>
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">$215.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">{{ Cart::subtotal(0) }}</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
