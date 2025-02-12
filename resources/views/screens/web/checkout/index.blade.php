@extends('layouts.web.app')
@section('content')
    <main>
        <section class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Checkout</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Checkout
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid sh-space">
            <div class="row justify-content-center">
                <!-- Billing Information -->
                <div class="col-xl-8 col-xxl-8 col-12  px-4 mb-5">
                    <h4 class="sub-heading-shipping sub-heading-shipping-2 mb-4">Billing Information</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label">First Name</label>
                                <input type="text" class="form-control py-2" id="fullName"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label">Last Name</label>
                                <input type="text" class="form-control py-2" id="fullName"
                                    placeholder="Enter your full name">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control py-2" id="email" placeholder="Enter your email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Street Address</label>
                                <input type="text" class="form-control py-2" id="address" placeholder="Enter your street address">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control py-2" id="city" placeholder="Enter your city">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control py-2" id="state" placeholder="Enter your state">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip" class="form-label">ZIP Code</label>
                                <input type="number" class="form-control py-2" id="zip" placeholder="Enter your ZIP code">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control py-2" id="phone"
                                    placeholder="Enter your phone number">
                            </div>
                            <div class="col-12">
                                <div class="billing-details billing-details-2">
                                    <h2 class="column-sec-head mb-4">Billing Details</h2>
                                    <p class="sub-text-main d-flex gap-2 align-items-center">
                                        <label for="check-inp" class="check-box-custom ">
                                            <input type="checkbox" id="check-inp" hidden>
                                            <i class="fa-solid"></i>
                                        </label>
                                        Same As Shipping Address
                                    </p>
                                </div>
                                <div id="field-area">
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            Street Address <sup><i class="fa-solid fa-star-of-life" style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="" class="form-control py-2" placeholder="Enter your street address" required>
                                    </div>
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            Zip Code <sup><i class="fa-solid fa-star-of-life" style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="" class="form-control py-2" placeholder="Enter your Zip Code" required>
                                    </div>
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            City <sup><i class="fa-solid fa-star-of-life" style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="" class="form-control py-2" placeholder="Enter your City" required>
                                    </div>
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            State <sup><i class="fa-solid fa-star-of-life" style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="" class="form-control py-2" placeholder="Enter your state" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="col-xl-4 col-xxl-4  col-12  mb-5">
                    <h4 class="sub-heading-shipping sub-heading-shipping-2 mb-4">Order Summary</h4>
                    <div class="order-summary">
                        <div class="order-item">
                            <span class="order-bold">Product 1</span>
                            <span>$49.99</span>
                        </div>
                        <div class="order-item">
                            <span class="order-bold">Product 2</span>
                            <span>$29.99</span>
                        </div>
                        <div class="order-item">
                            <span class="order-bold">Shipping</span>
                            <span>$5.00</span>
                        </div>
                        <div class="total">
                            Total: $84.98
                        </div>
                    </div>
                    <div class="sub-total mb-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <h4 class="subttl-hd">Payment Method</h4>
                        </div>
                    </div>

                    <div class="payment-radio-check-wrap" style="margin-bottom: 20px;border:1px solid #4f7eff">
                        <label for="cashmethod" class="payment-radio-check mb-0">
                            <div class="d-flex gap-3 align-items-center">
                                <div>
                                    <input type="radio" name="payment" id="cashmethod" checked value="cash" class="radio-btns">
                                </div>
                                <div>
                                    <p class="main-radio-text">Cash</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="payment-radio-check-wrap" style="margin-bottom: 20px;">
                        <label for="stripe" class="payment-radio-check form-radio mb-0" style="border: none !important;">
                            <div class="d-flex gap-3 align-items-center">
                                <div>
                                    <input type="radio" name="payment" id="stripe" value="credit" class="radio-btns">
                                </div>
                                <div>
                                    <p class="main-radio-text">Credit Card (Stripe)</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('assets/web/images/paym.png') }}" alt="">
                            </div>
                        </label>
                        <div class="user-title" id="credit">
                            <div class="d-flex">
                                <input type="number" placeholder="Card Number" class="inside-inp" />
                                <input type="number" placeholder="MM/YY" class="inside-inp" />
                                <input type="number" placeholder="CVC" class="inside-inp" />
                            </div>
                        </div>
                    </div>
                    <div class="payment-radio-check-wrap" style="margin-bottom: 20px;">
                        <label for="paypal-box" class="payment-radio-check form-radio mb-0"
                            style="border: none !important;">
                            <div class="d-flex gap-3 align-items-center">
                                <div>
                                    <input type="radio" name="payment" id="paypal-box" value="paypal"
                                        class="radio-btns">
                                </div>
                                <div>
                                    <p class="main-radio-text">Paypal</p>
                                </div>
                            </div>

                        </label>
                        <div class="user-title" id="paypal">
                            <div class="d-flex">
                                <input type="number" placeholder="Paypal" class="inside-inp" />
                                <input type="number" placeholder="MM/YY" class="inside-inp" />
                                <input type="number" placeholder="CVC" class="inside-inp" />
                            </div>
                        </div>

                    </div>
                    <div>
                        <label for="agree" class="agree-checkbox">
                            <input type="checkbox" id="agree" class="mt-2">
                            <span>I have read and agreed to the terms & conditions <sup><i class="fa-solid fa-star-of-life"
                                        style="font-size: 0.5rem;color: #FF0000;"></i></sup></span>
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 mt-4 place-btn">Place Order</button>
                </div>
            </div>
        </div>
    </main>
@endsection
