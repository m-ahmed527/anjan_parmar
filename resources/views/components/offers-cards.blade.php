@php
    $offers = [
        [
            'firstText' => 'Trusted Partners',
            'secondText' => 'Secured Payment',
            'icon' => 'assets/web/images/card.png',
        ],
        [
            'firstText' => 'Purchase at ease',
            'secondText' => 'In-Store Pickup',
            'icon' => 'assets/web/images/Shop.png',
        ],
        [
            'firstText' => 'Specials Deals Weekly',
            'secondText' => 'Limited Time Offers',
            'icon' => 'assets/web/images/badge-1.png',
        ],
        [
            'firstText' => 'Anytime Anywhere',
            'secondText' => 'Worldwide Delivery',
            'icon' => 'assets/web/images/badge.png',
        ],
    ];
@endphp

<section class="offer-card-area px-3">
    <div class="container-fluid">
        <div class="row">
            @foreach ($offers as $cardItem)
                <div class="col-lg-6 col-xl-6 col-xxl-3 col-md-6">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="icon-card">
                                    <img src="{{ asset($cardItem['icon']) }}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="text-card-area">
                                    <span class="smaller-text">{{ $cardItem['firstText'] }}</span>
                                    <p class="second-text">{{ $cardItem['secondText'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
