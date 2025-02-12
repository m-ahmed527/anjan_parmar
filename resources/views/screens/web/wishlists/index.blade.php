@extends('layouts.web.app')
@section('content')
    <section class="shop-banner-section">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <div class="shop-banner">
                        <div>
                            <h1 class="sh-head">Wishlist</h1>
                            <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Wishlist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sh-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="wishlist-block">
                        <p class="wishlist-area">Your Wishlist is currently empty.</p>
                    </div>
                    <a href="{{route('products')}}" class="return-shop">Return To Shop</a>
                </div>
            </div>
        </div>
    </section>
@endsection
