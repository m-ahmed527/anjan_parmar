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
    {{-- @dd($cart) --}}
    <section class="cart-section sh-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12">
                    <div class="parent-table-area">
                        @if (!empty($cart['items']))
                            <table class="cart-table">
                                <tr>
                                    <th class="">
                                    </th>
                                    <th class="">
                                        Image
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
                                @forelse ($cart['items']  as $key => $item)
                                    <tr class="tr-hover">
                                        <td class="pr-title dlt-td">
                                            <button class="delete-btn btn" type="button"
                                                data-cart_id="{{ $key }}">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </td>
                                        <td class="pr-title d-flex flex-column justify-content-center gap-2">
                                            <!-- Merged two cells -->
                                            <span>
                                                <img src="{{ $item['image'] }}" class="img-fluid cart-images"
                                                    alt="">
                                            </span>

                                        </td>
                                        <td class="pr-title">
                                            <span>
                                                <p>{{ ucfirst($item['name']) }}</p>
                                            </span>
                                            <span>
                                                <p>{{ ($item['variant_name']) ??'' }}</p>
                                            </span>
                                        </td>
                                        <td class="pr-title"><span>${{ $item['price'] }}</span></td>
                                        <td class="pr-title">
                                            <div class="counter">
                                                <div class="pr-title counter counter-area-2">
                                                    <button class="decrement btn dec-btn quantity-btn"
                                                        data-cart_id="{{ $key }}">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    <input class="inp-single-inp" name="qty"
                                                        value="{{ $item['item_quantity'] }}" readonly />
                                                    <button class="increment btn btn-inc quantity-btn"
                                                        data-cart_id="{{ $key }}">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pr-title"><span
                                                class="item-subtotal">${{ $item['item_sub_total'] }}</span></td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>
                        @else
                            <div class="col-12 text-center">
                                <div class="wishlist-block">
                                    <p class="wishlist-area">Your Cart is currently empty.</p>
                                </div>
                                <a href="{{ route('web.products.index') }}" class="return-shop">Return To Shop</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <!-- ye lgadena -->
                    <div class="total total-area">
                        <div class="sub-total">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="subttl-hd cart-items-count">Cart Total ({{ $cart['total_items'] ?? 0 }})</h4>
                            </div>
                        </div>
                        <div class="sub-total">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="subttl-para">Subtotal</h4>
                                <p class="subttl-para cart-subtotal">${{ $cart['sub_total'] ?? 0 }}</p>
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
                                <p class="subttl-para cart-total">${{ $cart['total'] ?? 0 }}</p>
                            </div>
                        </div>


                        <a href="{{ route('web.checkout.index') }}" class="chckout-btn"><span href="checkout-page.php"
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
@push('scripts')
    @include('includes.web.cart.delete-scripts');
    <script>
        $(document).ready(function(e) {
            $(document).on('click', '.quantity-btn', function(e) {
                e.preventDefault(); // Prevent default link behavior
                var row = $(this).closest("tr");
                var quantityInput = row.find('input[name="qty"]');
                var quantity = row.find('input[name="qty"]').val();
                var cartId = $(this).data('cart_id');
                var cartSubTotal = $('.cart-subtotal');
                var cartTotal = $('.cart-total');
                var itemSubTotal = row.find('.item-subtotal');
                console.log(quantity);

                $.ajax({
                    url: "{{ route('web.cart.update') }}",
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        quantity: quantity,
                        cart_id: cartId
                    },
                    success: function(response) {
                        console.log('success :', response);
                        cartSubTotal.text("$" + response.cart.sub_total);
                        cartTotal.text("$" + response.cart.total);
                        itemSubTotal.text("$" + response.item.item_sub_total);
                        quantityInput.val(response.item.item_quantity);
                    },
                    error: function(error) {
                        console.log('Error:', error);

                        Swal.fire({
                            icon: 'warning',
                            title: 'Sorrry.!',
                            text: error.responseJSON.message,
                        });
                    }
                });
            });
        })
    </script>
@endpush
