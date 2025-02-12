@php
    $slideCard = [
        [
            'title' => 'MCM Bags',
            'subTitle' => 'with motion tracking',
            'text' => 'Habitasse platea dictumst quisque sagittis purus sit volutpat.',
            'price' => '',
            'bg' => 'rgba(235, 251, 255, 1)',
            'img' => 'assets/web/images/product-1.png',
            'cardBackTitle' => 'smart watch',
        ],
        [
            'title' => "Clothing's",
            'subTitle' => 'Hoodies & Sweatshirts',
            'text' => 'Lobortis scelerisque fermentum dui odio ut enim faucibus ornare.',
            'price' => '',
            'bg' => 'rgba(252, 234, 238, 1)',

            'img' => 'assets/web/images/product-2.png',
            'cardBackTitle' => "Hoodie",
        ],
        [
            'title' => "woman's",
            'subTitle' => 'Beauty Products',
            'text' => 'Sagittis eu volutpat odio facilisis mauris.Sed felis eget velit.',
            'price' => '',
            'bg' => 'rgba(225, 241, 228, 1)',

            'img' => 'assets/web/images/product-3.png',
            'cardBackTitle' => "Beauty",
        ],
        [
            'title' => "Clothing's",
            'subTitle' => 'Hoodies & Sweatshirts',
            'text' => 'Lobortis scelerisque fermentum dui odio ut enim faucibus ornare.',
            'price' => '',
            'bg' => 'rgba(218, 255, 190, 1)',

            'img' => 'assets/web/images/product-2.png',
            'cardBackTitle' => "Beauty",
        ],
    ];
@endphp

<section>
    <div class="container-fluid px-3 my-5">
        <div class="row">
            <div class="col-12">
                <div class="slider-for">
                    @foreach ($slideCard as $cards)
                        <div class="products-card position-relative" style="background-color: {{ $cards['bg'] }};
">
                            <h2 class="multi-heading-product">{{$cards["cardBackTitle"]}}</h2>

                            <div class="text-area">
                                <h1 class="card-title">{{ $cards['title'] }}<br>
                                    <span class="sub-title">{{ $cards['subTitle'] }}</span>
                                </h1>
                                <p class="card-para my-4">
                                    {{ $cards['text'] }}
                                </p>
                                <a href="#" class="price-text">Starts from - $290</a>
                            </div>
                            <div class="img-area">
                                <img src="{{ asset($cards['img']) }}" class="img-fluid card-images"
                                    alt="{{ $cards['title'] }}-img">
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
