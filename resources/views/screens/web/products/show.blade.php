@extends('layouts.web.app')
{{-- @php
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
@endphp --}}
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
                                href="{{ route('web.products.index') }}" class="text-decoration-none">Products</a>
                            / {{ $product->name }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="sh-space padd-small padd-small-2">
            <div class="container-fluid px-4">
                <div class="row row-gap-3">
                    <div class="col-xl-2 col-12 p-0 column-sliders position-relative">

                        <div class="side-images-wrap">
                            <div class="side-image" style="border:2px solid #4f7eff">
                                <img src="{{ $product->getFirstMediaUrl('featured_image') }}" alt="Product Image"
                                    class="gallery-img-item">
                            </div>
                            @forelse ($product->getMediaCollectionUrl('multiple_images') as $image)
                                <div class="side-image" style="border:2px solid #4f7eff">
                                    <img src="{{ $image }}" alt="Product Image" class="gallery-img-item">
                                </div>
                            @empty
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
                        <div class="slider-btns-2">
                            <button class="previous-btn-2"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next-btn-2"><i class="fa-solid fa-arrow-right"></i></button>
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
                            <p class="product-price" id="base-price">${{ $product->price }}</p>
                            @php
                                // Group variants by attribute name
                                $counter = 1;
                                $storedData = ['attribute_id' => null]; // Array use kiya reference maintain karne ke liye

                                $groupedVariants = $product->variants
                                    ->flatMap(function ($variant) use (&$counter, &$storedData) {
                                        return $variant->attributeValues->map(function ($attributeValue) use (
                                            &$counter,
                                            &$storedData,
                                        ) {
                                            if ($counter == 1) {
                                                $storedData['attribute_id'] = $attributeValue->attribute_id; // Properly store attribute_id
                                            }

                                            $counter++; // Counter increment karna
                                            return [
                                                'attribute_name' => $attributeValue->attribute->name,
                                                'attribute_value' => $attributeValue->value,
                                                'attribute_value_id' => $attributeValue->id,
                                            ];
                                        });
                                    })
                                    ->groupBy('attribute_name');

                            @endphp
                            <form id="variantForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                                {{-- @foreach ($groupedAttributes as $attributeName => $values)
                                    <input type="hidden" name="attributes[]" value="{{ $attributeName }}" id="">
                                    <p class="product-price">{{ $attributeName }}</p>
                                    <div class="storage-btn-area">
                                        @foreach ($values as $value)
                                            @php
                                                $radioId = $attributeName . '-' . $value;
                                            @endphp
                                            <input type="radio" type="hidden" id="{{ $radioId }}"
                                                class="custom-radios" name="attributes[{{ strtolower($attributeName) }}]"
                                                value="{{ $value }}">
                                            <label for="{{ $radioId }}">{{ $value }}</label>
                                        @endforeach
                                    </div>
                                @endforeach --}}
                                @foreach ($groupedVariants as $attributeName => $attributeValues)
                                    <input type="hidden" name="attributes[]" value="{{ $attributeName }}" id="">
                                    <p class="product-price">{{ $attributeName }}</p>
                                    <div class="storage-btn-area">
                                        @foreach ($attributeValues->unique('attribute_value') as $value)
                                            @php
                                                $radioId = $attributeName . '-' . $value['attribute_value_id'];
                                            @endphp
                                            <input type="radio" id="{{ $radioId }}" class="custom-radios"
                                                name="attribute_values[]-{{ $attributeName }}"
                                                value="{{ $value['attribute_value_id'] }}">
                                            <label for="{{ $radioId }}">{{ $value['attribute_value'] }}</label>
                                        @endforeach
                                    </div>
                                @endforeach
                            </form>


                            <p><span id="priceDisplay" class="text-danger"></span></p>
                            <div class="buttons-group">
                                <div class="quantity-selection counter-area">
                                    <button class="btn  decrement decrement-2">-</button>
                                    <input type="text" name="qty" readonly value="1" class="qtyValue">
                                    <button class="btn  increment increment-2">+</button>
                                </div>
                                <button href="{{ route('cart-page') }}" class="add-to-cart-btn text-decoration-none"
                                    id="add-to-cart">Add To
                                    Cart</button>
                            </div>
                            <div class="add-to-cart d-flex flex-column justify-content-center  gap-3 mt-3">
                                @if ($product->is_premium)
                                    <button class="add-cart-btn offer-btn">Make an offer</button>
                                @endif
                                <button href="{{ route('web.checkout.index') }}" class="add-cart-btn buy-outline"
                                    id="buy-now">Buy
                                    Now</button>
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
                        @forelse ($relatedProducts as $index => $relatedProduct)
                            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="product-card sh-prod-card">
                                    <div class="products-img sh-prod">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <p class="top-img">{{ $relatedProduct->category->name }}</p>
                                            <button class="btn heart-save-btn p-0 wishlist-btn"
                                                data-slug="{{ $relatedProduct->slug }}">
                                                <i class=" {{ auth()?->user()?->hasWishlisted($relatedProduct->id) ? 'fa-solid' : 'fa-regular' }} fa-heart"
                                                    data-slug="icon-{{ $relatedProduct->slug }}"
                                                    style="color: rgb(255, 114, 114)"></i>
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

                                            <a href="{{ route('web.products.show', $relatedProduct->slug) }}"
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
                        @endforelse


                    </div>
                </div>
            </section>
        </div>
        <x-slide-blog />
        <x-offer-modal :$product />
    </main>
    <script>
        let incBtns2 = document.querySelector('.increment-2');
        let decBtns2 = document.querySelector('.decrement-2');

        incBtns2.addEventListener('click', () => {
            let inputs = document.querySelector('.counter-area').querySelector('input');
            inputs.value++;
        })

        decBtns2.addEventListener('click', () => {
            let inputs = document.querySelector('.counter-area').querySelector('input');
            if (inputs.value > 1) {
                inputs.value--;
            }
        })


        let img = document.querySelectorAll('.side-image');
        img.forEach(item => {
            item.addEventListener('click', () => {

                img.forEach(img => img.style.border = "1px solid gray")
                const imgTag = item.querySelector("img");
                console.log(imgTag);

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
        document.querySelectorAll('#variantForm .custom-radios').forEach(select => {
            select.addEventListener('change', () => {
                const form = document.getElementById('variantForm');
                const formData = new FormData(form);

                var basePriceDiv = document.getElementById('base-price');
                var addToCartBtn = document.getElementById('add-to-cart');
                var buyNowBtn = document.getElementById('buy-now');
                var priceDisplayDiv = document.getElementById('priceDisplay');

                fetch("{{ route('web.products.get.variant.price') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);

                        let basePrice = parseFloat(
                            @json($product->price)
                        ); // Laravel se price fetch karna sahi position pe
                        let newPrice = data.price ? parseFloat(data.price) : 0;

                        if (data.price === null) {
                            priceDisplayDiv.textContent = "Selected Combination is not available";
                            addToCartBtn.disabled = true;
                            buyNowBtn.disabled = true;
                            basePriceDiv.textContent = "$" + basePrice; // Default price dikhayein
                        } else if (data.quantity === 0) {
                            priceDisplayDiv.textContent = "Selected Combination is out of stock";
                            addToCartBtn.disabled = true;
                            buyNowBtn.disabled = true;
                        } else {
                            let finalPrice = basePrice + newPrice; // Naya price calculate karein
                            priceDisplayDiv.textContent = ""; // Extra text clear karein
                            basePriceDiv.textContent = "$" + finalPrice.toFixed(
                                2); // Price ko 2 decimal points tak rakhein
                            addToCartBtn.disabled = false;
                            buyNowBtn.disabled = false;
                        }
                    })
                    .catch(error => console.log('Error:', error));
            });
        });

        function updateButtonIcons() {
            let previousBtn = document.querySelector(".previous-btn-2 i");
            let nextBtn = document.querySelector(".next-btn-2 i");

            let isMobile = screen.width < 1200;


            previousBtn.className = `fa-solid ${isMobile ? "fa-arrow-left" : "fa-arrow-up"}`;
            nextBtn.className = `fa-solid ${isMobile ? "fa-arrow-right" : "fa-arrow-down"}`;
        }

        // Page load pe chalayega
        updateButtonIcons();

        // Window resize hone pe bhi chalayega
        window.addEventListener("resize", updateButtonIcons);
    </script>

    <script>
        $(document).ready(function() {
            $('#add-to-cart').on('click', function() {
                let product_id = $('input[name="product_id"]').val();
                let quantity = $('input[name="qty"]').val();
                let selectedAttributes = $('input[name^="attribute_values"]:checked');

                let attributeValues = [];
                selectedAttributes.each(function() {
                    attributeValues.push($(this).val());
                });

                if (attributeValues.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Please select a variant!',
                    });
                    return;
                }
                console.log('Product ID:', product_id, 'quantity : ', quantity, 'attributeValues : ',
                    attributeValues);

                // Pehle variant price aur stock check karenge
                $.ajax({
                    url: "{{ route('web.products.get.variant.price') }}",
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        product_id: product_id,
                        attribute_values: attributeValues
                    },
                    success: function(data) {
                        if (!data.price) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Not Available',
                                text: 'Selected combination is not available!',
                            });
                            return;
                        }
                        console.log(data)
                        // Ab cart me add karenge
                        $.ajax({
                            url: "{{ route('web.cart.add') }}",
                            type: 'POST',
                            data: {
                                _token: $('input[name="_token"]').val(),
                                product_id: product_id,
                                variant_id: data.variant_id,
                                quantity: quantity,
                                attribute_values: attributeValues
                            },
                            success: function(cartData) {
                                console.log('success :', cartData);

                                if (cartData.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Added!',
                                        text: 'Item added to cart successfully!',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    $('.cart-count').text(cartData.cart
                                        .total_items);
                                    $('.cart-price').text('$' + cartData.cart
                                        .total);
                                }

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
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Opps...!',
                            text: error.responseJSON.message,
                        });
                    }
                });
            });
        });
    </script>
@endsection






{{-- <select name="attribute_values[]" class="form-control">
                                        @foreach ($attributeValues->unique('attribute_value') as $value)
                                            <option value="{{ $value['attribute_value_id'] }}">
                                                {{ $value['attribute_value'] }}
                                            </option>
                                        @endforeach
                                    </select> --}}



{{-- <script>
        var storedAttributeID = @json($storedData['attribute_id']);
        document.querySelectorAll('#variantForm .custom-radios').forEach(select => {
            select.addEventListener('change', () => {

                const form = document.getElementById('variantForm');
                const formData = new FormData(form);
                formData.append('storedAttributeID', storedAttributeID);
                let value = select.value;
                fetch('/get-variant-price/' + value, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.success && data.combinations) {
                            let validAttributeId = parseInt(data
                                .attribute_id); // Response se valid attribute_id
                            // let validVariantIds = data.combinations.map(item => item
                            //     .id); // Combination array se valid variant IDs
                            let validVariantIds = data.combinations

                            console.log("Valid Attribute ID:", validAttributeId);
                            console.log("Valid Variant IDs:", validVariantIds);

                            // Disable all radio buttons except valid ones
                            document.querySelectorAll('#variantForm .custom-radios').forEach(radio => {
                                let radioValue = parseInt(radio
                                    .value); // Get radio button's variant ID
                                let radioAttributeId = parseInt(radio.getAttribute("name")
                                    .split("-")[1]); // Extract attribute_id

                                if (validVariantIds.includes(radioValue) || radioAttributeId ==
                                    validAttributeId) {
                                    radio.disabled =
                                        false; // ✅ Enable if it's in combination OR matches attribute_id
                                } else {
                                    radio.disabled =
                                        true; // ❌ Disable if neither condition is met
                                }
                            });
                        }
                        document.getElementById('priceDisplay').textContent = "Price: " + (data.price ||
                            'N/A');
                    })
                    .catch(error => console.log('Error:', error));
            });
        });
    </script> --}}



{{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let variantCombinations = []; // Backend se valid combinations yahan load honge

            // Backend se valid variant combinations fetch karo
            fetch('/get-variant-combinations')
                .then(response => response.json())
                .then(data => {
                    variantCombinations = data;
                })
                .catch(error => console.error('Error fetching combinations:', error));

            document.querySelectorAll('#variantForm .custom-radios').forEach(select => {
                select.addEventListener('change', function() {
                    updateOptions();
                    updatePrice();
                });
            });

            function updateOptions() {
                let selectedValues = getSelectedValues();

                document.querySelectorAll('#variantForm .custom-radios').forEach(input => {
                    let currentValue = input.value;
                    let parentName = input.getAttribute("name").split('-')[1];

                    // Check karo ke ye value kisi valid combination ka part hai ya nahi
                    let isValid = variantCombinations.some(combination => {
                        return selectedValues.every(val => combination.includes(val)) || combination
                            .includes(currentValue);
                    });

                    // Sirf disable karo agar ye valid nahi hai, lekin agar ye already selected hai to enable rehne do
                    // if (!input.checked) {
                    //     input.disabled = !isValid;
                    // }
                });
            }

            function updatePrice() {
                const form = document.getElementById('variantForm');
                const formData = new FormData(form);

                fetch('/get-variant-price', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('priceDisplay').textContent = "Price: " + (data.price || 'N/A');
                    })
                    .catch(error => console.error('Error:', error));
            }

            function getSelectedValues() {
                let selected = [];
                document.querySelectorAll('#variantForm .custom-radios:checked').forEach(input => {
                    selected.push(input.value);
                });
                return selected;
            }
        });
    </script> --}}



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
