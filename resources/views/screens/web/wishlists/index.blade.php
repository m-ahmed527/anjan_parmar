@extends('layouts.web.app')
@section('content')
    <section class="shop-banner-section">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <div class="shop-banner">
                        <div>
                            <h1 class="sh-head">Wishlist</h1>
                            <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Wishlist
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sh-space">
        <div class="container-fluid">
            <div class="row">
                <table class="cart-table">
                    <tr>
                        <th class="">
                        </th>

                        <th class="">
                            Images
                        </th>
                        <th class="">
                            Items
                        </th>
                        <th class="">
                            Price
                        </th>

                        <th class="">
                            Action
                        </th>
                    </tr>
                    @forelse ($wishlists as $wishlist)
                        <tr class="tr-hover">
                            <td class="pr-title dlt-td">
                                <button class="delete-btn btn" type="button">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </td>
                            <td class="pr-title">
                                <span>
                                    <img src="{{ $wishlist?->getFirstMediaUrl('featured_image') }}"
                                        class="img-fluid cart-images" alt="{{ $wishlist?->name }}">
                                </span>

                            </td>
                            <td class="pr-title">
                                <span>
                                    <p>{{ $wishlist?->name }}</p>
                                </span>

                            </td>

                            <td class="pr-title"><span>${{ $wishlist?->price }}</span></td>

                            <td class="pr-title"><span><button href="{{ route('cart-page') }}"
                                        class="add-to-cart-btn text-decoration-none" id="add-to-cart">Add To
                                        Cart</button></span></td>
                        </tr>
                    @empty
                        <div class="col-12">
                            <div class="wishlist-block">
                                <p class="wishlist-area">Your Wishlist is currently empty.</p>
                            </div>
                            <a href="{{ route('web.products.index') }}" class="return-shop">Return To Shop</a>
                        </div>
                    @endforelse
                </table>
                <div class="col-12">
                    <a href="{{ route('web.products.index') }}" class="return-shop">Return To Shop</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    
@endpush
