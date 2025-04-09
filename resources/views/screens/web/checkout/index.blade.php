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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid sh-space">
            <div class="row justify-content-center">
                <!-- Billing Information -->
                <div class="col-xl-8 col-xxl-8 col-12  px-4 mb-5">
                    <h4 class="sub-heading-shipping sub-heading-shipping-2 mb-4">Billing Information</h4>
                    <form action="{{ route('web.checkout.store') }}" method="POST" id="create-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label">First Name</label>
                                <input type="text" class="form-control py-2" id="fullName"
                                    placeholder="Enter your full name" name="billing_first_name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label">Last Name</label>
                                <input type="text" class="form-control py-2" id="fullName"
                                    placeholder="Enter your full name" name="billing_last_name">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control py-2" id="email"
                                    placeholder="Enter your email" name="billing_email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control py-2" id="phone"
                                    placeholder="Enter your phone number" name="billing_phone">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control py-2" id="billing_autocomplete"
                                    placeholder="Enter your address" name="billing_address" autocomplete="off">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control py-2" id="billing_city"
                                    placeholder="Enter your city" name="billing_city">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control py-2" id="billing_country"
                                    placeholder="Enter your country" name="billing_country">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control py-2" id="billing_state"
                                    placeholder="Enter your state" name="billing_state">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="zip" class="form-label">ZIP Code</label>
                                <input type="text" class="form-control py-2" id="billing_zip_code"
                                    placeholder="Enter your ZIP code" name="billing_zip_code">
                            </div>



                            <div class="col-12">
                                <div class="billing-details billing-details-2">
                                    <h2 class="column-sec-head mb-4">Shipping Address</h2>
                                    <p class="sub-text-main d-flex gap-2 align-items-center">
                                        <label for="check-inp" class="check-box-custom ">
                                            <input type="checkbox" id="check-inp" name="same_as_billing" hidden>
                                            <i class="fa-solid"></i>
                                        </label>
                                        Same As Billing Details
                                    </p>
                                </div>
                                <div id="field-area" class="shipping-field-area">
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            Address <sup><i class="fa-solid fa-star-of-life"
                                                    style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="shipping_address" class="form-control py-2"
                                            placeholder="Enter your street address" id="shipping_autocomplete" required>
                                    </div>

                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            City <sup><i class="fa-solid fa-star-of-life"
                                                    style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="shipping_city" id="shipping_city"
                                            class="form-control py-2" placeholder="Enter your City" required>
                                    </div>
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            Country <sup><i class="fa-solid fa-star-of-life"
                                                    style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="shipping_country" id="shipping_country"
                                            class="form-control py-2" placeholder="Enter your state" required>
                                    </div>
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            State <sup><i class="fa-solid fa-star-of-life"
                                                    style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="shipping_state" id="shipping_state"
                                            class="form-control py-2" placeholder="Enter your state" required>
                                    </div>
                                    <div class="input-group mt-5">
                                        <span class="inp-labels-checkout">
                                            Zip Code <sup><i class="fa-solid fa-star-of-life"
                                                    style="font-size: 0.5rem;color: #FF0000;"></i></sup>
                                        </span>
                                        <input type="text" name="shipping_zip_code" id="shipping_zip_code"
                                            class="form-control py-2" placeholder="Enter your Zip Code" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="col-xl-4 col-xxl-4  col-12  mb-5">
                    <h4 class="sub-heading-shipping sub-heading-shipping-2 mb-4">Order Summary
                        ({{ session('cart')['total_items'] }})</h4>
                    <div class="order-summary">
                        @forelse (session('cart')['items'] as $item)
                            <div class="order-item">
                                <span class="order-bold">{{ $item['name'] }} ({{ $item['variant_name'] }})</span>
                                <span>${{ $item['item_total'] }}</span>
                            </div>
                        @empty
                        @endforelse

                        <div class="order-item">
                            <span class="order-bold">Shipping</span>
                            <span>Free</span>
                        </div>
                        <div class="total">
                            Total: ${{ session('cart')['sub_total'] ?? 0.0 }}
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
                                    <input type="radio" name="payment" id="cashmethod" checked value="cash"
                                        class="radio-btns">
                                </div>
                                <div>
                                    <p class="main-radio-text">Cash</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="payment-radio-check-wrap" style="margin-bottom: 20px;">
                        <label for="stripe" class="payment-radio-check form-radio mb-0"
                            style="border: none !important;">
                            <div class="d-flex gap-3 align-items-center">
                                <div>
                                    <input type="radio" name="payment" id="stripe" value="credit"
                                        class="radio-btns">
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
                    <button class="btn btn-primary w-100 mt-4 place-btn" id="create-btn">Place Order</button>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    @include('includes.autocomplete-address.shipping-billing-adress-scripts')

    @include('includes.admin.scripts.create-script', ['redirectUrl' => route('index')])
    <script>
        var phoneInput = document.getElementById('phone');

        // on input change
        phoneInput.addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);

            e.target.value = !x[3] ? '+1 ' + x[2] : '+1 (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '');
        });
    </script>
@endpush
{{--    // $(document).ready(function() {
        //     let same_as_billing = $('input[name="same_as_billing"]:checked');
        //     console.log(same_as_billing);
        //     if (!same_as_billing.length) {
        //         $('#field-area').html(`{!! view('screens.web.checkout.shipping-field')->render() !!}`);
        //     } else {
        //         $('#field-area').empty();
        //     }
        // }); --}}
