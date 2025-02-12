@extends('layouts.web.app')

@php
    $tabContent = [
        ['btnText' => 'All Products', 'imgUrl' => 'assets/web/images/icon-1.png'],
        ['btnText' => 'Gadgets', 'imgUrl' => 'assets/web/images/tv-icon.png'],
        ['btnText' => "Clothing's", 'imgUrl' => 'assets/web/images/fashion.png'],
        ['btnText' => 'Appliances', 'imgUrl' => 'assets/web/images/portfolio.png'],
    ];
@endphp

@section('content')
    <main>
        {{-- @dd(auth()->user()) --}}
        <section class="banner mx-4">
            <div class="container-fluid px-5 content-area">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <span class="bnner-btn">Welcome To The Seal Offer</span>
                            <h2 class="main-bnner-heading mt-5">
                                The New Year <br />
                                <span class="collection-text">Collection</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-offers-cards />

        <x-products-sliders />

        <section class="products-details mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-header-area">
                            <span class="exc-products">Exclusive Products</span>
                            <div class="header-products my-5">
                                <h1 class="main-sec-heading">our Premium products</h1>
                                <div class="tabs-area">
                                    @foreach ($tabContent as $index => $content)
                                        <x-customButton :dataValue="$content['btnText']" active="{{ $index === 0 ? 'tab-active' : '' }}">
                                            <span class="icon-tab">
                                                <img src="{{ asset($content['imgUrl']) }}" alt="">
                                            </span>
                                            <span>{{ $content['btnText'] }}</span>
                                        </x-customButton>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sliders">
                        @foreach ($products as $productItem)
                            <div class="product-card">
                                <div class="products-img">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="top-img">{{ $productItem['category'] }}</p>
                                        <button class="btn heart-save-btn p-0">
                                            <i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>
                                        </button>
                                    </div>
                                    <img src="{{ asset('assets/web/images' . $productItem['img']) }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="product-content">
                                    {{-- @if ($productItem['onSale'])
                                        <span class="category sale-color">
                                            {{ $productItem['onSale'] }}
                                        </span>
                                    @else
                                        <span class="category">
                                            {{ $productItem['cardBadge'] }}
                                        </span>
                                    @endif --}}
                                    <h2 class="card-main-heading mb-4">{{ $productItem['description'] }}</h2>
                                    <div class="rating-stars mb-4">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($productItem['id'] > $i)
                                                <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="Gold Star">
                                            @else
                                                <img src="{{ asset('assets/web/images/silver-star.png') }}"
                                                    alt="Silver Star">
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="bottom-price-area mb-3">
                                        <p class="price-products">${{ $productItem['price'] }}
                                            -
                                            ${{ $productItem['finalPrice'] }}
                                        </p>

                                    </div>
                                    <div class="btn-products-now">
                                        <button class="bid-btn offer-btn">Make an Offer</button>
                                        <a href="{{ route('products.show', ['id' => $productItem['id']]) }}"
                                            class="bid-btn bid-btn-2 text-decoration-none">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sales-slider">
                        <div class="sale-card">
                            <label for="sales-1" class="sale-label">
                                <span>Exclusive Clothings Discounts</span>
                                <input type="radio" disabled class="sale-input" id="sales-1" name="sales" checked>
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-2" class="sale-label">
                                <span>Clearance Sales Upto 50% Off</span>
                                <input type="radio" disabled class="sale-input" id="sales-2" name="sales">
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-3" class="sale-label">
                                <span>Top Tech Deals Up to 25% Off</span>
                                <input type="radio" disabled class="sale-input" id="sales-3" name="sales">
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-4" class="sale-label">
                                <span>Best Deals of the Week $10 Cashback</span>
                                <input type="radio" disabled class="sale-input" id="sales-4" name="sales">
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-4" class="sale-label">
                                <span>Best Deals of the Week $10 Cashback</span>
                                <input type="radio" disabled class="sale-input" id="sales-4" name="sales">
                            </label>
                        </div>
                    </div>

                    <div class="sliders">
                        @foreach ($products as $productItem)
                            <div class="product-card">
                                <div class="products-img">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="top-img">{{ $productItem['category'] }}</p>
                                        <button class="btn heart-save-btn p-0">
                                            <i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>
                                        </button>
                                    </div>
                                    <img src="{{ asset('assets/web/images' . $productItem['img']) }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="product-content">
                                    {{-- @if ($productItem['onSale'])
                                        <span class="category sale-color">
                                            {{ $productItem['onSale'] }}
                                        </span>
                                    @else
                                        <span class="category">
                                            {{ $productItem['cardBadge'] }}
                                        </span>
                                    @endif --}}
                                    <h2 class="card-main-heading my-4">{{ $productItem['description'] }}</h2>
                                    <div class="rating-stars mb-4">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($productItem['id'] > $i)
                                                <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="Gold Star">
                                            @else
                                                <img src="{{ asset('assets/web/images/silver-star.png') }}"
                                                    alt="Silver Star">
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="bottom-price-area mb-3">
                                        <p class="price-products">${{ $productItem['price'] }}
                                            -
                                            ${{ $productItem['finalPrice'] }}
                                        </p>
                                    </div>
                                    <div class="btn-products-now">
                                        <button class="bid-btn offer-btn">Make an Offer</button>
                                        <a href="{{ route('products.show', ['id' => $productItem['id']]) }}"
                                            class="bid-btn bid-btn-2 text-decoration-none">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>


        </section>


        <section class="products-details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-header-area">
                            <span class="exc-products">Trending Products</span>
                            <div class="header-products my-5">
                                <h1 class="main-sec-heading">Top Rated products</h1>
                                <div class="tabs-area">
                                    @foreach ($tabContent as $index => $content)
                                        <x-customButton :dataValue="$content['btnText']" active="{{ $index === 0 ? 'tab-active' : '' }}">
                                            <span class="icon-tab">
                                                <img src="{{ asset($content['imgUrl']) }}" alt="">
                                            </span>
                                            <span>{{ $content['btnText'] }}</span>
                                        </x-customButton>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sliders">
                        @foreach ($products as $productItem)
                            <div class="product-card">
                                <div class="products-img">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="top-img">{{ $productItem['category'] }}</p>
                                        <button class="btn heart-save-btn p-0">
                                            <i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>
                                        </button>
                                    </div>
                                    <img src="{{ asset('assets/web/images' . $productItem['img']) }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="product-content">
                                    {{-- @if ($productItem['onSale'])
                                        <span class="category sale-color">
                                            {{ $productItem['onSale'] }}
                                        </span>
                                    @else
                                        <span class="category">
                                            {{ $productItem['cardBadge'] }}
                                        </span>
                                    @endif --}}
                                    <h2 class="card-main-heading mb-4">{{ $productItem['description'] }}</h2>
                                    <div class="rating-stars mb-3">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($productItem['id'] > $i)
                                                <img src="{{ asset('assets/web/images/gold-star.png') }}"
                                                    alt="Gold Star">
                                            @else
                                                <img src="{{ asset('assets/web/images/silver-star.png') }}"
                                                    alt="Silver Star">
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="bottom-price-area">
                                        <p class="price-products">${{ $productItem['price'] }}
                                            {{-- ${{ $productItem['finalPrice'] }} --}}
                                        </p>
                                        <a href="{{ route('products.show', ['id' => $productItem['id']]) }}"
                                            class="bid-btn text-decoration-none">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sales-slider">
                        <div class="sale-card">
                            <label for="sales-1" class="sale-label">
                                <span>Exclusive Clothings Discounts</span>
                                <input type="radio" disabled class="sale-input" id="sales-1" name="sales" checked>
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-2" class="sale-label">
                                <span>Clearance Sales Upto 50% Off</span>
                                <input type="radio" disabled class="sale-input" id="sales-2" name="sales">
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-3" class="sale-label">
                                <span>Top Tech Deals Up to 25% Off</span>
                                <input type="radio" disabled class="sale-input" id="sales-3" name="sales">
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-4" class="sale-label">
                                <span>Best Deals of the Week $10 Cashback</span>
                                <input type="radio" disabled class="sale-input" id="sales-4" name="sales">
                            </label>
                        </div>
                        <div class="sale-card">
                            <label for="sales-4" class="sale-label">
                                <span>Best Deals of the Week $10 Cashback</span>
                                <input type="radio" disabled class="sale-input" id="sales-4" name="sales">
                            </label>
                        </div>
                    </div>

                    <div class="sliders">
                        @foreach ($products as $productItem)
                            <div class="product-card">
                                <div class="products-img">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="top-img">{{ $productItem['category'] }}</p>
                                        <button class="btn heart-save-btn p-0">
                                            <i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>
                                        </button>
                                    </div>
                                    <img src="{{ asset('assets/web/images' . $productItem['img']) }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="product-content">
                                    {{-- @if ($productItem['onSale'])
                                        <span class="category sale-color">
                                            {{ $productItem['onSale'] }}
                                        </span>
                                    @else
                                        <span class="category">
                                            {{ $productItem['cardBadge'] }}
                                        </span>
                                    @endif --}}
                                    <h2 class="card-main-heading mb-4">{{ $productItem['description'] }}</h2>
                                    <div class="rating-stars mb-3">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($productItem['id'] > $i)
                                                <img src="{{ asset('assets/web/images/gold-star.png') }}"
                                                    alt="Gold Star">
                                            @else
                                                <img src="{{ asset('assets/web/images/silver-star.png') }}"
                                                    alt="Silver Star">
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="bottom-price-area">
                                        <p class="price-products">${{ $productItem['price'] }}
                                            {{-- ${{ $productItem['finalPrice'] }} --}}
                                        </p>
                                        <a href="{{ route('products.show', ['id' => $productItem['id']]) }}"
                                            class="bid-btn text-decoration-none">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>


        </section>


        <section>
            <div class="container-fluid px-3">
                <div class="sales-timer">
                    <h2 class="bg-heading">Black Friday Sale</h2>
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-6 col-xxl-5  col-12">
                            <div class="main-heading-timer">
                                <h3 class="main-sec-heading time-offer">Time-Limited Offer</h3>
                                <p class="para mt-3">Sed felis eget velit aliquet sagittis id consectetur purus. Orci
                                    sagittis eu <br> volutpat
                                    malesuada nunc vel risus odio facilisis mauris sit amet massa.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7  col-12">
                            <div class="countdown">
                                <div class="time-box">
                                    <span id="days" class="number">0</span>
                                    <span class="label">Days</span>
                                </div>
                                <div class="separator">
                                    <span class="separate-block"></span>
                                    <span class="separate-block"></span>
                                </div>
                                <div class="time-box">
                                    <span id="hours" class="number">0</span>
                                    <span class="label">Hrs</span>
                                </div>
                                <div class="separator">
                                    <span class="separate-block"></span>
                                    <span class="separate-block"></span>
                                </div>
                                <div class="time-box">
                                    <span id="minutes" class="number">0</span>
                                    <span class="label">Mins</span>
                                </div>
                                <div class="separator">
                                    <span class="separate-block"></span>
                                    <span class="separate-block"></span>
                                </div>
                                <div class="time-box">
                                    <span id="seconds" class="number">0</span>
                                    <span class="label">Secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section>
            <div class="container-fluid px-3">
                <div class="slider-wrapper-area store-sec">
                    <div class="multi-system">
                        <div class="multi-area">
                            {{-- <img class="multi-img" src="{{ asset('assets/web/images/multi-img.png') }}" alt="">
                            <img class="multi-img2" src="{{ asset('assets/web/images/shop-section-img.webp') }}"
                                alt=""> --}}
                            {{-- <h2 class="multi-heading-1">Head phones</h2>
                            <h2 class="multi-heading-2">Noise cancelation</h2> --}}
                            <div class="multi-content  multi-content-areas">
                                <span class="exc-products">Top - Deals</span>
                                <h3 class="sys-hd">A Glimpse Inside  </h3>
                                <h3 class="sys-hd-2">Checkout Experience
                                </h3>
                                <p class="para">Ullamcorper sit amet risus nullam eget felis eget nunc. Sed lectus <br />
                                    vestibulum mattis ullamcorper velit sed ullamcorper morbi.</p>
                                <a href="{{ route('categories-store') }}" class="anchor-btn">View All Stores</a>
                            </div>
                        </div>
                        <div class="multi-area multi-area-2">
                            {{-- <img class="multi-img" src="{{ asset('assets/web/images/multi-img.png') }}" alt="">
                            <img class="multi-img2" src="{{ asset('assets/web/images/multi-img2.png') }}"
                                alt="">
                            <h2 class="multi-heading-1">Head phones</h2>
                            <h2 class="multi-heading-2">Noise cancelation</h2> --}}
                            <div class="multi-content  multi-content-areas">
                                <span class="exc-products">Premium - Choice</span>
                                <h3 class="sys-hd">Step Into Our Store </h3>
                                <h3 class="sys-hd-2">Seasonal Specials</h3>
                                <p class="para">Ullamcorper sit amet risus nullam eget felis eget nunc. Sed lectus <br />
                                    vestibulum mattis ullamcorper velit sed ullamcorper morbi.</p>
                                <a href="{{ route('categories-store') }}" class="anchor-btn">View All Stores</a>
                            </div>
                        </div>

                    </div>
                    <div class="slider-btns">
                        <button class="prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>
                        <button class="next-arrow"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>


                <div class="row row-gap-4">
                    <div class="col-lg-6  col-12">
                        <div class="product-sales-deel-area">
                            <h3 class="multi-heading-2  text-center top-0">Home</h3>
                            <h3 class="multi-heading-2 smart">Smart Bags</h3>
                            <div class="multi-content text-center multi-main-heading">
                                <h3 class="sys-hd">Upto 40% Off <br>
                                    Limited time deal grab today!</h3>
                                <p class="para">Lobortis scelerisque fermentum dui faucibus in. Dui nunc mattis enim
                                    ut tellus elementum. Neque <br> gravida in fermentum et. At urna condimentum mattis
                                    pellentesque id.</p>
                                <a href="#" class="anchor-btn">View Collections</a>
                            </div>
                            <img class="img-fluid img-pr" src="{{ asset('assets/web/images/img-pr.png') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 second-column-area">
                        <div class="mb-4">
                            <img class="img-fluid " src="{{ asset('assets/web/images/img-banner.png') }}"
                                alt="">
                        </div>
                        <div class="tip-area">
                            <h2 class="multi-heading-2 tip-bg">#6938</h2>
                            <span class="exc-products">TIP OF THE DAY</span>
                            <h3 class="sys-hd tip-hd">Keep your electronics safe: For long-
                                lasting performance, use surge
                                protectors and keep your software
                                updated.</h3>
                            <div class="pf-area">
                                <div>
                                    <img src="{{ asset('assets/web/images/pf-img.png') }}" alt="">
                                </div>
                                <div>
                                    <h4 class="pf-hd">Emilio Morse</h4>
                                    <p class="pf-para">Ceo of polonos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featured-products">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="text-center">
                                <span class="exc-products">Shop Accessories</span>
                                <h2 class="main-sec-heading mt-4">
                                    Featured Products
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('products.show', ['id' => 1]) }}" class="text-decoration-none">
                                <div class="feature-product-card">
                                    <div class="feature-product-img-area">
                                        <img class="img-fluid feature-product-img"
                                            src="{{ asset('assets/web/images/feature1.png') }}" alt="">
                                    </div>
                                    <div class="feature-product-details">
                                        <span class="category">
                                            Sale
                                        </span>
                                        <h3 class="card-main-heading">Black Hoodie’s</h3>
                                        <div class="rating-stars">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                        </div>
                                        <p class="price-products">$30.00 – $42.00</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('products.show', ['id' => 2]) }}" class="text-decoration-none">
                                <div class="feature-product-card">
                                    <div class="feature-product-img-area">
                                        <img class="img-fluid feature-product-img"
                                            src="{{ asset('assets/web/images/feature1.png') }}" alt="">
                                    </div>
                                    <div class="feature-product-details">
                                        <span class="category">
                                            Sale
                                        </span>
                                        <h3 class="card-main-heading">Black Hoodie’s</h3>
                                        <div class="rating-stars">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                        </div>
                                        <p class="price-products">$30.00 – $42.00</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('products.show', ['id' => 3]) }}" class="text-decoration-none">
                                <div class="feature-product-card">
                                    <div class="feature-product-img-area">
                                        <img class="img-fluid feature-product-img"
                                            src="{{ asset('assets/web/images/feature1.png') }}" alt="">
                                    </div>
                                    <div class="feature-product-details">
                                        <span class="category">
                                            Sale
                                        </span>
                                        <h3 class="card-main-heading">Black Hoodie’s</h3>
                                        <div class="rating-stars">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                        </div>
                                        <p class="price-products">$30.00 – $42.00</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('products.show', ['id' => 4]) }}" class="text-decoration-none">
                                <div class="feature-product-card">
                                    <div class="feature-product-img-area">
                                        <img class="img-fluid feature-product-img"
                                            src="{{ asset('assets/web/images/feature1.png') }}" alt="">
                                    </div>
                                    <div class="feature-product-details">
                                        <span class="category">
                                            Sale
                                        </span>
                                        <h3 class="card-main-heading">Black Hoodie’s</h3>
                                        <div class="rating-stars">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                        </div>
                                        <p class="price-products">$30.00 – $42.00</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('products.show', ['id' => 5]) }}" class="text-decoration-none">
                                <div class="feature-product-card">
                                    <div class="feature-product-img-area">
                                        <img class="img-fluid feature-product-img"
                                            src="{{ asset('assets/web/images/feature1.png') }}" alt="">
                                    </div>
                                    <div class="feature-product-details">
                                        <span class="category">
                                            Sale
                                        </span>
                                        <h3 class="card-main-heading">Black Hoodie’s</h3>
                                        <div class="rating-stars">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                        </div>
                                        <p class="price-products">$30.00 – $42.00</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a href="{{ route('products.show', ['id' => 6]) }}" class="text-decoration-none">
                                <div class="feature-product-card">
                                    <div class="feature-product-img-area">
                                        <img class="img-fluid feature-product-img"
                                            src="{{ asset('assets/web/images/feature1.png') }}" alt="">
                                    </div>
                                    <div class="feature-product-details">
                                        <span class="category">
                                            Sale
                                        </span>
                                        <h3 class="card-main-heading">Black Hoodie’s</h3>
                                        <div class="rating-stars">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                            <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="">
                                        </div>
                                        <p class="price-products">$30.00 – $42.00</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="super-sale-area">
                            <div class="super-sale-area-img">
                                <img src="{{ asset('assets/web/images/super.png') }}" alt="">
                                <p>On All Electronic Products, don’t miss this ! Use code :</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="blog-section mx-3">
            <div class="container-fluid p-0">
                <div class="row align-items-center  mb-5">
                    <div class="col-lg-5 col-12 d-flex justify-content-center">
                        <div class="blog-hd-area" style="border-left: none">
                            <span class="exc-products">OUR BLOGS</span>
                            <h1 class="main-sec-heading mt-5">Latest News</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                        <div class="blog-hd-area">
                            <p class="para gray">Arcu vitae elementum curabitur vitae nunc sed. Non arcu
                                risus
                                quis <br>
                                varius. Elit eget gravida cum sociis magnis dis.</p>
                            <a href="{{ route('blogs') }}" class="link-btn">View All Blogs</a>
                        </div>
                    </div>
                </div>
                <hr class="blog-hr">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                        <div class="blog-card">
                            <div class="blog-img-area">
                                <img class="img-fluid blog-img" src="{{ asset('assets/web/images/blog1.png') }}"
                                    alt="">
                                <span class="img-banner">June 1, 2024</span>
                            </div>
                            <div class="blog-text-area">
                                <h3 class="card-main-heading">The Best Clothing's To Buy As A Modeling</h3>
                                <p class="para gray">At tellus at urna condimentum. Ut enim blandit volutpat maecenas
                                    volutpat
                                    blandit. Posuere urna nec tincidunt praesent....</p>
                                <a href="{{ route('best-camera') }}" class="link-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                        <div class="blog-card">
                            <div class="blog-img-area">
                                <img class="img-fluid blog-img" src="{{ asset('assets/web/images/blog2.png') }}"
                                    alt="">
                                <span class="img-banner">June 1, 2024</span>
                            </div>
                            <div class="blog-text-area">
                                <h3 class="card-main-heading">The Best Clothing's To Buy As A Modeling</h3>
                                <p class="para gray">At tellus at urna condimentum. Ut enim blandit volutpat maecenas
                                    volutpat
                                    blandit. Posuere urna nec tincidunt praesent....</p>
                                <a href="{{ route('best-camera') }}" class="link-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                        <div class="blog-card">
                            <div class="blog-img-area">
                                <img class="img-fluid blog-img" src="{{ asset('assets/web/images/blog3.png') }}"
                                    alt="">
                                <span class="img-banner">June 1, 2024</span>
                            </div>
                            <div class="blog-text-area">
                                <h3 class="card-main-heading">The Best Clothing's To Buy As A Modeling</h3>
                                <p class="para gray">At tellus at urna condimentum. Ut enim blandit volutpat maecenas
                                    volutpat
                                    blandit. Posuere urna nec tincidunt praesent....</p>
                                <a href="{{ route('best-camera') }}" class="link-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="gallery-section ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <span class="exc-products">VIEW Our Galllery</span>
                            <h1 class="main-sec-heading mt-3">Our Gallery</h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets/web/images/gallery1.png') }}" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets/web/images/gallery2.png') }}" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets/web/images/gallery4.png') }}" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets/web/images/gallery5.png') }}" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img src="{{ asset('assets/web/images/gallery6.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <x-offer-modal />
    </main>


    <script>
        function countdownTimer() {
            const targetDate = new Date("2025-12-31T23:59:59").getTime();

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const difference = targetDate - now;

                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                document.getElementById("days").textContent = days;
                document.getElementById("hours").textContent = hours;
                document.getElementById("minutes").textContent = minutes;
                document.getElementById("seconds").textContent = seconds;

                if (difference < 0) {
                    clearInterval(interval);
                    document.querySelector(".countdown").innerHTML = "Countdown Ended!";
                }
            }, 1000);
        }

        countdownTimer();
    </script>
    <script>

    </script>
@endsection
