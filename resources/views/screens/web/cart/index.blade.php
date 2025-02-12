@extends('layouts.web.app')
@section('content')
    <section class="shop-banner-section">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <div class="shop-banner">
                        <div>
                            <h1 class="sh-head">Cart</h1>
                            <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Cart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cart-section sh-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12">
                    <div class="parent-table-area">
                        <table class="cart-table">
                            <tr>
                                <th class="">
                                </th>

                                <th class="">
                                    Items
                                </th>
                                <th class="">
                                    Price
                                </th>
                                <th class="qty-th">
                                    Qty.
                                </th>
                                <th class="">
                                    Sub Total
                                </th>
                            </tr>
                            <tr class="tr-hover">
                                <td class="pr-title dlt-td">
                                    <button class="delete-btn btn" type="button">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </td>
                                <td class="pr-title d-flex flex-column justify-content-center gap-2" colspan="2">
                                    <!-- Merged two cells -->
                                    <span>
                                        <img src="{{ asset('assets/web/images/laptop.png') }}" class="img-fluid cart-images"
                                            alt="">
                                    </span>
                                    <span>
                                        <p>Lorem Ipsum</p>
                                    </span>
                                </td>
                                <td class="pr-title"><span>$599.99</span></td>
                                <td class="pr-title">
                                    <div class="counter">
                                        <div class="pr-title counter counter-area-2">
                                            <button class="decrement btn dec-btn">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                            <input class="inp-single-inp" value="1" readonly />
                                            <button class="increment btn btn-inc">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="pr-title"><span>$599.99</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <!-- ye lgadena -->
                    <div class="total total-area">
                        <div class="sub-total">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="subttl-hd">Cart Total</h4>
                            </div>
                        </div>
                        <div class="sub-total">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="subttl-para">subtotal</h4>
                                <p class="subttl-para">$599.99</p>
                            </div>
                        </div>
                        <div class="sub-total">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="subttl-para">Shipping:</h4>
                                <p class="subttl-para">Free</p>
                            </div>
                        </div>
                        <div class="sub-total">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="subttl-para">Total:</h4>
                                <p class="subttl-para">$599.99</p>
                            </div>
                        </div>


                        <a href="{{ route('checkout') }}" class="chckout-btn"><span href="checkout-page.php"
                                class="white">PROCEED TO CHECKOUT</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let incBtns = document.querySelectorAll('.increment');
        let decBtns = document.querySelectorAll('.decrement');

        incBtns.forEach(increment => {
            increment.addEventListener('click', () => {
                let inputs = increment.closest('td').querySelector('input');
                inputs.value++;

            })
        })

        decBtns.forEach(decrement => {
            decrement.addEventListener('click', () => {
                let inputs = decrement.closest('td').querySelector('input');
                if (inputs.value > 1) {
                    inputs.value--;
                }
            })
        })
    </script>
@endsection
