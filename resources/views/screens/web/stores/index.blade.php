@extends('layouts.web.app')

@php
    $tabContent = [
        ['btnText' => 'All Products', 'imgUrl' => 'assets/web/images/icon-1.png'],
        ['btnText' => 'Gadgets', 'imgUrl' => 'assets/web/images/tv-icon.png'],
        ['btnText' => "Clothing's", 'imgUrl' => 'assets/web/images/fashion.png'],
        ['btnText' => 'Appliances', 'imgUrl' => 'assets/web/images/portfolio.png'],
    ];

    // $stores = [
    //     [
    //         'img' => 'assets/web/images/store-1.jpg',
    //         'store_name' => 'Abc Store',
    //         'description' => 'Gadgets and tech accessories',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-2.jpg',
    //         'store_name' => 'XYZ Store',
    //         'description' => 'Luxury home decor and furnishings',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-3.jpg',
    //         'store_name' => 'Store 3',
    //         'description' => 'Latest in electronics and gadgets',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-4.jpg',
    //         'store_name' => 'Store 4',
    //         'description' => 'Trendy urban fashion',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-5.jpg',
    //         'store_name' => 'Store 5',
    //         'description' => 'Plant-based products and gardening tools',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-6.jpg',
    //         'store_name' => 'Store 6',
    //         'description' => 'Fashionable apparel and accessories',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-7.jpg',
    //         'store_name' => 'Store 7',
    //         'description' => 'Exclusive fashion collections',
    //     ],
    //     [
    //         'img' => 'assets/web/images/store-8.jpg',
    //         'store_name' => 'Store 8',
    //         'description' => 'Affordable electronics and gadgets',
    //     ],
    // ];

@endphp

@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Stores</h1>
                        <p class="sh-para">
                            <a href="{{ route('index') }}" class="text-decoration-none">Home</a>
                            / Stores
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <section class="cards-cate-sect sh-space">
            <div class="container-fluid my-5">
                <div class="row">
                    @forelse ($stores as $store)
                        @if ($store)
                            {{-- @dd($store) --}}
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-5">
                                <div class="store-card">
                                    <div class="card-image">
                                        <img src="{{ $store['store']->getFirstMediaUrl('avatar') }}"
                                            alt="{{ $store['store']->business_name }}" class="store-img">
                                    </div>
                                    <div class="store-details">
                                        <h5 class="store-title">{{ $store['store']->business_name }}</h5>
                                        <p class="store-description">
                                            {{ $store['store']?->categories()?->first()?->name ?: 'No Category' }}</p>
                                        <a href="{{ route('web.products.index', ['store' => $store['store']->slug]) }}"
                                            class="btn visit-btn">Visit Store</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-12 text-center">
                            <h2>No stores found.</h2>
                            <a href="{{ route('index') }}" class="btn back-btn btn-primary">Back to Home</a>
                        </div>
                    @endforelse
                </div>

        </section>
        <x-slide-blog />
        <x-our-blog />
    </main>
@endsection
