@extends('layouts.web.app')

@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner"
                    @if (request()->has('store')) style="background-image: url('{{ $store->getFirstMediaUrl('avatar') }}');" @endif>
                    <div>
                        @if (request()->has('store'))
                            <h1 class="sh-head">{{ $store->business_name }} Store</h1>
                            <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a>
                                / <a href="{{ route('web.stores.index') }}" class="text-decoration-none">Stores</a>
                                /{{ $store->business_name }}
                            </p>
                        @else
                            <h1 class="sh-head">Products</h1>
                            <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> /
                                Products
                        @endif
                        </p>
                    </div>
                </div>
            </div>

        </div>
        {{-- @dd(request()->has('store')) --}}

        <div class="container-fluid my-5 sh-space">
            <div class="row g-4">
                <div class="col-xl-4 col-12 px-5 side-bar-area">
                    <div class="close-area-sidebar">
                        <button class="btn-close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="content-sidebar">
                        <div class="filter-product-1 mb-4">
                            <div class="filter-header-1">
                                <h2 class="filter-heading">Categories</h2>
                            </div>
                            <div class="radio-list">
                                @forelse ($categories as $key=> $category)
                                    <label for="radio_{{ $key }}">
                                        <input id="radio_{{ $key }}" name="category" type="radio"
                                            value="{{ $category->slug }}">
                                        <span>{{ $category->name }}</span>
                                    </label>
                                @empty
                                    No categories found!
                                @endforelse
                            </div>
                        </div>
                        @php
                            $minPrice = \App\Models\Product::min('price') ?? 0; // Agar null ho to 0
                            $maxPrice = \App\Models\Product::max('price') ?? 100; // Agar null ho to default 100
                            // dd($minPrice, $maxPrice);
                        @endphp
                        <div class="filter-product-1 mb-4">
                            <div class="filter-header-1">
                                <h2 class="filter-heading">Prices</h2>
                            </div>
                            <div class="range-area">
                                <div class="slider-container">
                                    <input type="range" min="{{ $minPrice }}" max="{{ $maxPrice }}"
                                        value="{{ $minPrice }}" id="minRange" class="slider min-slider">
                                    <input type="range" min="{{ $minPrice }}" max="{{ $maxPrice }}"
                                        value="{{ $maxPrice }}" id="maxRange" class="slider max-slider">
                                </div>
                                <div class="range-values">
                                    <div class="style-amount">
                                        $<span id="minValue">{{ $minPrice }}</span>
                                    </div>
                                    <div class="style-amount">
                                        $<span id="maxValue">{{ $maxPrice }}</span>
                                    </div>
                                </div>
                                {{-- <button class="filter-button" id="applyFilter">Filter</button> --}}
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="range-area position-relative p-0 flex-row">
                                <img src="{{ asset('assets/web/images/sale-img.png') }}" class="img-fluid sale-img-product"
                                    alt="">
                                <a href="#" class="anchor-sale-product">View Collection</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-12 px-4">
                    <div class="row custom-gx-space">
                        <div class="col-12">
                            <div class="right-col-row">
                                <div>
                                    <button class="btn-open-sidebar mb-2"><i class="fa-solid fa-arrow-right"></i></button>
                                    <h5 class="mb-3 showing-res" id="showing-results-container">
                                        {{-- Ye AJAX se update hoga --}}
                                    </h5>
                                </div>
                                <div class="button-pr-group mb-3">
                                    <button class="btns-filter-open grid-active">
                                        <img src="{{ asset('assets/web/images/window-icon.png') }}" class="img-fluid"
                                            alt="">
                                    </button>
                                    <button class="btns-filter-open">
                                        <img src="{{ asset('assets/web/images/tab.png') }}" class="img-fluid"
                                            alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="product-container">
                            @include('screens.web.products.list')
                        </div>

                    </div>
                </div>
            </div>


        </div>
        </div>



        <x-slide-blog />
        <x-our-blog />
    </main>


    <script>
        const btnsArea = document.querySelectorAll(".btns-filter-open");
        const column = document.querySelectorAll(".column-grid-change");
        const methodGrid = (grid) => {
            console.log(grid === "grid-half");
            column.forEach(element => {
                const productCards = element.querySelector(".product-card");
                const productImgArea = productCards.querySelector(".products-img");
                const productContent = productCards.querySelector(".product-content");
                const productBtnArea = productContent.querySelector(".bottom-price-area");
                if (grid === "grid-half") {
                    if (screen.width <= 991) {
                        element.classList.add("col-md-6");

                    } else {
                        element.classList.replace("col-xxl-6", "col-xxl-4");
                    }
                    productCards.classList.remove('grid-flex');
                    productImgArea.classList.remove("product-img-grid");
                    productContent.classList.remove("product-content-grid-area");
                    productBtnArea.classList.remove("btn-grid-change")
                } else {
                    if (screen.width <= 991) {
                        element.classList.remove("col-md-6");
                        element.classList.remove("col-sm-6");
                    } else {
                        element.classList.replace("col-xxl-4", "col-xxl-6");
                    }
                    productCards.classList.add('grid-flex');
                    productImgArea.classList.add("product-img-grid");
                    productContent.classList.add("product-content-grid-area");
                    productBtnArea.classList.add("btn-grid-change");
                    element.classList.remove("mb-4")
                }
            });
        }
        btnsArea[0].addEventListener('click', () => {
            methodGrid('grid-half');
            btnsArea[0].classList.add("grid-active");
            btnsArea[1].classList.remove("grid-active")
        })

        btnsArea[1].addEventListener('click', () => {
            methodGrid('grid-full');
            btnsArea[1].classList.add("grid-active");
            btnsArea[0].classList.remove("grid-active")
        })
    </script>
    <script>
        const btn = document.querySelectorAll(".pag-btn");

        const method = (element, btns) => {
            element.addEventListener("click", () => {
                btns.forEach(button => button.classList.remove("pagination-active"))
                element.classList.add("pagination-active");
            })
        }
        btn.forEach(element => {
            method(element, btn)
        });
    </script>
@endsection
@push('scripts')
    @include('includes.web.products.products-list-script')
    @include('includes.web.products.products-filter-script')
@endpush
