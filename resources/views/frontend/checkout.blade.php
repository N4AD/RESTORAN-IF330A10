@extends('layouts.frontend')
@section('title', 'Checkout')

@section('breadcrumb')
    <div class="col-xl-9 col-lg-10 col-md-8">
        <h1>CheckOut</h1>
        <p>Cooking delicious and tasty food since</p>
    </div>
@endsection
@section('content')
<form action="{{ route('order', auth()->user()->id) }}" method="POST">
    @csrf
    <div class="pattern_2">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="box_booking_2 style_2">
                        <div class="head">
                            <div class="title">
                                <h3>Personal Details</h3>
                            </div>
                        </div>
                        <div class="main">
                            <div class="form-group">
                                <label>First and Last Name</label>
                                <input class="form-control" name="name" placeholder="First and Last Name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Full Address</label>
                                <input class="form-control" name="address" placeholder="Full Address">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input class="form-control" name="postal_code" placeholder="0123">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box_booking_2 style_2">
                        <div class="head">
                            <div class="title">
                                <h3>Payment Method</h3>
                            </div>
                        </div>
                        <div class="main">
                            <div class="payment_select">
                                <label class="container_radio">Credit Card
                                    <input type="radio" value="3" checked name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                                <i class="icon_creditcard"></i>
                            </div>
                            <div class="form-group">
                                <label>Name on card</label>
                                <input type="text" class="form-control" id="name_card_order" name="name_card_order"
                                    placeholder="First and last name">
                            </div>
                            <div class="form-group">
                                <label>Card number</label>
                                <input type="text" id="card_number" name="number" class="form-control"
                                    placeholder="Card number">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Expiration date</label>
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <div class="form-group">
                                                <input type="text" id="expire_month" name="exp_month"
                                                    class="form-control" placeholder="mm">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group">
                                                <input type="text" id="expire_year" name="exp_year"
                                                    class="form-control" placeholder="yyyy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Security code</label>
                                        <div class="row">
                                            <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <input type="text" id="ccv" name="cvc" class="form-control"
                                                        placeholder="CCV">
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <img src="img/icon_ccv.gif" width="50" height="29"
                                                    alt="ccv"><small>Last
                                                    3 digits</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment_select" id="paypal">
                                <label class="container_radio">Pay with Paypal
                                    <input type="radio" value="2" name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="payment_select">
                                <label class="container_radio">Pay with Cash
                                    <input type="radio" value="1" name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                                <i class="icon_wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4" id="sidebar_fixed">
                    <div class="box_booking">
                        <div class="head">
                            <h3>Order Summary</h3>
                        </div>
                        <div class="main">
                            <ul class="clearfix">
                                @foreach ($carts as $cart)
                                <input type="hidden" name="menu_id[]" value="{{ $cart->menu_id }}">
                                <input type="hidden" name="quantity[]"  value="{{ $cart->quantity }}">
                                <input type="hidden" name="price[]"  value="{{ $cart->menu->price }}">
                                <li>{{ $cart->quantity }}x {{ $cart->menu->title }}<span>${{ $cart->menu->price * $cart->quantity }}</span></li>
                                @endforeach
                            </ul>

                            <ul class="clearfix">
                                <li>Subtotal<span>${{ $subtotal }}</span></li>
                                <li>Delivery fee<span>${{ $general ? $general->delivery_fee:'' }}</span></li>
                                <li class="total">Total<span>${{ $general ? ($general->delivery_fee + $subtotal):$subtotal }}</span></li>
                                <input type="hidden" name="total" value="{{ $general ? ($general->delivery_fee + $subtotal):$subtotal }}">
                            </ul>
                            <button type="submit" class="btn_1 full-width mb_5">Order Now</button>
                            <div class="text-center"><small>Or Call Us at <strong>{{ $general ? $general->primary_phone:'' }}</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/frontend/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/shop_order_func.js') }}"></script>
@endsection
