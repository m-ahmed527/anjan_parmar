@extends('layouts.web.app')

@php
    $tabContent = [
        ['btnText' => 'All Products', 'imgUrl' => 'assets/web/images/icon-1.png'],
        ['btnText' => 'Gadgets', 'imgUrl' => 'assets/web/images/tv-icon.png'],
        ['btnText' => "Clothing's", 'imgUrl' => 'assets/web/images/fashion.png'],
        ['btnText' => 'Appliances', 'imgUrl' => 'assets/web/images/portfolio.png'],
    ];

    // $categories = [
    //     ['img' => 'assets/web/images/laptop.png', 'text' => 'Laptops'],
    //     ['img' => 'assets/web/images/smart-watch-img.png', 'text' => 'Smart Watches'],
    //     ['img' => 'assets/web/images/purse.png', 'text' => 'Branded Bags'],
    //     ['img' => 'assets/web/images/choclate-spread.png', 'text' => 'Chocolate Spread'],
    //     ['img' => 'assets/web/images/head-set-img.png', 'text' => 'Headsets'],
    //     ['img' => 'assets/web/images/smart-phone-img.png', 'text' => 'Smart Phones'],
    //     ['img' => 'assets/web/images/gaming-console.png', 'text' => 'Gaming Setups'],
    //     ['img' => 'assets/web/images/branded-hoodies.png', 'text' => 'Branded Hoodies'],
    //     ['img' => 'assets/web/images/air-shoes.png', 'text' => 'Air Shoes '],
    //     ['img' => 'assets/web/images/drone-3.png', 'text' => 'Drone Cameras'],
    // ];
    $categories = App\Models\Category::all();
@endphp

@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Categories</h1>
                        <p class="sh-para">
                            <a href="{{ route('index') }}" class="text-decoration-none">Home</a>
                            / Categories
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <section class="cards-cate-sect">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-12">
                        <div class="filter-category">

                        </div>
                        <div class="col-12">
                            <div class="class-row">
                                @foreach ($categories as $index => $categoryItem)
                                    <a href="{{ route('web.products.index', ['category' => $categoryItem->slug]) }}"
                                        class="text-decoration-none">
                                        <div class="cat-card-wrper">
                                            <div class="card-categories back-category-{{ $index + 1 }}">
                                                <img src="{{ $categoryItem->getFirstMediaUrl('category') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <p class="cat-text">{{ $categoryItem->name }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="btn-area-category">
                                <button class="mx-auto view-more-btn">
                                    View More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <x-slide-blog />
        <x-our-blog />
    </main>
@endsection
