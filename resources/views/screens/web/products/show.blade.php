@extends('layouts.web.app')
@php
    $productCard = [
        [
            'category' => 'Skin Care',
            'productImg' => 'assets/web/images/lotion.png',
            'cardBadge' => 'Sale',
            'descripText' => 'Whitening Lotion',
            'initialPrice' => 129.3,
            'finalPrice' => 129.7,
            'onSale' => false,
            'rating' => 5,
        ],
        [
            'category' => 'Serum/Cream Product',
            'productImg' => 'assets/web/images/acid.png',
            'cardBadge' => 'Trending',
            'descripText' => 'Glycolic Acid',
            'initialPrice' => 129.3,
            'finalPrice' => 129.7,
            'onSale' => false,
            'rating' => 3,
        ],
        [
            'category' => 'Skin Care',
            'productImg' => 'assets/web/images/lotion.png',
            'cardBadge' => 'Trending',
            'descripText' => 'Whitening Lotion',
            'initialPrice' => 129.3,
            'finalPrice' => 129.7,

            'onSale' => false,
            'rating' => 3,
        ],
        [
            'category' => 'Serum/Cream Product',
            'productImg' => 'assets/web/images/acid.png',
            'cardBadge' => 'Trending',
            'descripText' => 'Glycolic Acid',
            'initialPrice' => 129.3,
            'finalPrice' => 129.7,

            'onSale' => false,
            'rating' => 3,
        ],
    ];
@endphp
@section('content')
    <style>
        .product-description {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <main class="" style="background: #fcf8ee75;">

        <section class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Products</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / <a
                                href="{{ route('products') }}" class="text-decoration-none">Products</a>
                            / {{ $product->name }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="sh-space padd-small">
            <div class="container-fluid px-4">
                <div class="row row-gap-3">
                    <div class="col-xl-2 col-12 p-0">
                        <div class="side-images-wrap">
                            @forelse ($product->getMediaCollectionUrl('multiple_images') as $image)
                                <div class="side-image" style="border:2px solid #4f7eff">
                                    <img src="{{ $image }}" alt="Product Image" class="gallery-img-item">
                                </div>
                            @empty
                                No Image Found
                            @endforelse
                            {{-- <div class="side-image">
                                <img src="{{ asset('assets/web/images/laptop-2.png') }}" alt="Product Image"
                                    class="gallery-img-item">
                            </div>
                            <div class="side-image">
                                <img src="{{ asset('assets/web/images/laptop.png') }}" alt="Product Image"
                                    class="gallery-img-item">
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12">
                        <div class="product-page">
                            <div class="product-images">
                                <img src="{{ $product->getFirstMediaUrl('featured_image') }}" alt="Product Image"
                                    class="img-change">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12">
                        <div class="product-details">
                            <h1 class="product-title mb-3">{{ $product->name }}</h1>
                            <p class="product-description">{!! $product->description !!}</p>
                            <p class="product-price">${{ $product->price }} - ${{ $product->price }}</p>
                            {{-- @if ($product['category'] === 'Portable Laptops')
                                <p class="product-price">Color</p>
                                <div class="radios-opt">
                                    <input type="radio" name="color" id="option1">
                                    <label for="option1"></label>
                                    <input type="radio" name="color" id="option2">
                                    <label for="option2"></label>
                                    <input type="radio" name="color" id="option3">
                                    <label for="option3"></label>
                                    <input type="radio" name="color" id="option4">
                                    <label for="option4"></label>
                                    <input type="radio" name="color" id="option5">
                                    <label for="option5"></label>
                                </div>
                                <p class="product-price">Storage</p>
                                <div class="storage-btn-area">
                                    <input type="radio" id="storage-64gb" name="storage" value="64GB">
                                    <label for="storage-64gb">64GB</label>

                                    <input type="radio" id="storage-128gb" name="storage" value="128GB">
                                    <label for="storage-128gb">128GB</label>

                                    <input type="radio" id="storage-256gb" name="storage" value="256GB">
                                    <label for="storage-256gb">256GB</label>

                                    <input type="radio" id="storage-512gb" name="storage" value="512GB">
                                    <label for="storage-512gb">512GB</label>
                                </div>
                            @endIf --}}
                            {{-- @foreach ($attributeKeys as $attribute)
                                <p class="product-price">{{ ucfirst($attribute) }}</p>
                                <div class="attribute-btn-area storage-btn-area">
                                    @php
                                        $values = collect($variants)
                                            ->pluck("attributes.$attribute")
                                            ->unique()
                                            ->filter();
                                    @endphp
                                    @foreach ($values as $value)
                                        <input type="radio" id="{{ $attribute }}-{{ $value }}"
                                            name="{{ $attribute }}" value="{{ $value }}">
                                        <label
                                            for="{{ $attribute }}-{{ $value }}">{{ ucfirst($value) }}</label>
                                    @endforeach
                                </div>
                            @endforeach --}}
                            {{-- @dd($product->variants()) --}}
                            @foreach ($product->variants->groupBy('attributeValues.attribute') as $attribute => $values)
                                @dd($values->unique('value'))
                                <label>{{ $attribute }}</label>
                                <select name="attribute_values[]">
                                    @foreach ($values->unique('value') as $value)
                                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                                    @endforeach
                                </select>
                            @endforeach
                            <p>Selected Price: <span id="priceDisplay"></span></p>
                            <div class="buttons-group">
                                <div class="quantity-selection counter-area">
                                    <button class="btn  decrement">-</button>
                                    <input type="text" readonly value="1" class="qtyValue">
                                    <button class="btn  increment">+</button>
                                </div>
                                <a href="{{ route('cart-page') }}" class="add-to-cart-btn text-decoration-none">Add To
                                    Cart</a>
                            </div>
                            <div class="add-to-cart d-flex flex-column justify-content-center  gap-3 mt-3">
                                <button class="add-cart-btn offer-btn">Make an offer</button>
                                <a href="{{ route('checkout') }}" class="add-cart-btn buy-outline">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="informative-section-product">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-xl-8 col-12">
                            <div class="content-box-products">
                                <div class="content-header-products">
                                    <button class="product-tab-btn active" data-value="description">Description</button>
                                    <button class="product-tab-btn" data-value="additional-information">Additional
                                        Information
                                    </button>
                                </div>
                                <div class="text-sec-pro">
                                    <div id="description">
                                        <p class="des-text-area">{{ $product->long_description }}
                                    </div>
                                    <div id="additional-information" style="display: none">
                                        <p class="des-text-area">hy,Cras aliquam ultricies ante, eu sollicitudin nulla
                                            mattis
                                            et.
                                            Proin
                                            non
                                            sapien commodo,
                                            maximus libero eu, dictum massa. Interdum et malesuada fames ac ante ipsum
                                            primis in
                                            faucibus. Mauris posuere sem a tellus posuere, non aliquet lacus faucibus.
                                            Aliquam
                                            sodales
                                            vestibulum sollicitudin. Proin ullamcorper gravida mi, sit amet pharetra justo
                                            rhoncus
                                            vitae. Suspendisse volutpat tempor massa id efficitur. Ut fermentum rhoncus
                                            hendrerit.
                                            Vestibulum maximus tempus turpis, vel aliquet odio euismod at. Sed sed justo non
                                            mauris
                                            cursus varius in a leo. Proin iaculi placerat placerat.icitudin. Proin
                                            ullamcorper
                                            gravida
                                            mi, sit amet pharetra justo rhoncus vitae.</p>
                                    </div>
                                    {{-- <div class="images-area-warn mt-5">
                                        <div class="box-warn-icon">
                                            <img src="{{ asset('assets/web/images/usb-icon.png') }}" alt="">
                                            <p>Compatible</p>
                                        </div>
                                        <div class="box-warn-icon"><img
                                                src="{{ asset('assets/web/images/ai-icon.png') }}" alt="">
                                            <p>Voice AI</p>
                                        </div>
                                        <div class="box-warn-icon"><img
                                                src="{{ asset('assets/web/images/connection.png') }}" alt="">
                                            <p>Connection</p>
                                        </div>
                                        <div class="box-warn-icon"><img
                                                src="{{ asset('assets/web/images/battery.png') }}" alt="">
                                            <p>Battery</p>
                                        </div>
                                        <div class="box-warn-icon">
                                            <img src="{{ asset('assets/web/images/face-id.png') }}" alt="">
                                            <p>Face ID</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4  col-12 col-remove">
                            <img src="{{ asset('assets/web/images/mobile-phone-img.png') }}"
                                class="img-fluid mobile-side-img" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="featured-products">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="text-center">
                                <span class="exc-products">Top Rated</span>
                                <h2 class="main-sec-heading my-4">
                                    Related&nbsp;Products
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- @forelse ($relatedProducts as $index => $relatedProduct)
                            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="product-card sh-prod-card">
                                    <div class="products-img sh-prod">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <p class="top-img">{{ $relatedProduct->category->name }}</p>
                                            <button class="btn heart-save-btn p-0">
                                                <i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>
                                            </button>
                                        </div>
                                        <img src="{{ $relatedProduct->getFirstMediaUrl('featured_image') }}"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="product-content">
                                        <h2 class="card-main-heading mb-4">{{ $relatedProduct->name }}</h2>
                                        <div class="rating-stars">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($relatedProduct['id'] > $i)
                                                    <img src="{{ asset('assets/web/images/gold-star.png') }}"
                                                        alt="Gold Star">
                                                @else
                                                    <img src="{{ asset('assets/web/images/silver-star.png') }}"
                                                        alt="Silver Star">
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="bottom-price-area mb-3">
                                            <p class="price-products">${{ $relatedProduct->price }}
                                            </p>

                                            <a href="{{ route('product.show', $relatedProduct->slug) }}"
                                                class="bid-btn text-decoration-none">Buy
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="col-12">
                                <h2 class="text-center">No Related Products Found</h2>
                            </div>
                        @endforelse --}}


                    </div>
                </div>
            </section>
        </div>
        <x-slide-blog />
        <x-offer-modal />
    </main>
    <script>
        let incBtns2 = document.querySelector('.increment');
        let decBtns2 = document.querySelector('.decrement');

        incBtns2.addEventListener('click', () => {
            let inputs = incBtns.closest('.counter-area').querySelector('input');
            inputs.value++;
        })

        decBtns2.addEventListener('click', () => {
            let inputs = incBtns.closest('.counter-area').querySelector('input');
            if (inputs.value > 1) {
                inputs.value--;
            }
        })


        let img = document.querySelectorAll('.side-image');
        img.forEach(item => {
            item.addEventListener('click', () => {
                img.forEach(img => img.style.border = "1px solid gray")
                const imgTag = item.querySelector("img");
                document.querySelector('.img-change').src = imgTag.src;
                item.style.border = "2px solid #4f7eff";
            })
        })

        const tabMethod = (e, btn) => {
            const valueId = e.target.getAttribute('data-value');
            const valueId2 = btn.getAttribute('data-value');
            document.getElementById(valueId).style.display = "block";
            e.target.classList.add('active');
            btn.classList.remove('active');
            document.getElementById(valueId2).style.display = "none";
        }
        const btnsTab = document.querySelectorAll('.product-tab-btn');
        btnsTab[0].addEventListener('click', (e) => {
            tabMethod(e, btnsTab[1])
        })
        btnsTab[1].addEventListener('click', (e) => {
            tabMethod(e, btnsTab[0])
        })
    </script>
    <script>
        document.querySelectorAll('#variantForm select').forEach(select => {
            select.addEventListener('change', () => {
                const formData = new FormData(document.getElementById('variantForm'));
                fetch('/get-variant-price', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('priceDisplay').textContent = data.price || 'N/A';
                    });
            });
        });
    </script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let priceDisplay = document.getElementById("variant-price");

            document.querySelectorAll("input[type='radio']").forEach(function(input) {
                input.addEventListener("change", function() {
                    let selectedAttributes = {};
                    document.querySelectorAll("input[type='radio']:checked").forEach(function(
                        checkedInput) {
                        selectedAttributes[checkedInput.name] = checkedInput.value;
                    });

                    let variants = @json($variants);

                    let matchedVariant = variants.find(variant => {
                        return Object.keys(variant.attributes).every(attr => variant
                            .attributes[attr] === selectedAttributes[attr]);
                    });

                    if (matchedVariant) {
                        priceDisplay.textContent = "$" + matchedVariant.price;
                    } else {
                        priceDisplay.textContent = "Select variant";
                    }
                });
            });

            document.getElementById("increase-qty").addEventListener("click", function() {
                let qtyInput = document.getElementById("quantity");
                qtyInput.value = parseInt(qtyInput.value) + 1;
            });

            document.getElementById("decrease-qty").addEventListener("click", function() {
                let qtyInput = document.getElementById("quantity");
                if (qtyInput.value > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                }
            });
        });
    </script> --}}
@endsection
