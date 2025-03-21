@extends('layouts.web.app')

@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">About us</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / About us</p>
                    </div>
                </div>
            </div>

        </div>

        <section class="about-sect sh-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-12 sm-ab">
                        <div>
                            <span class="exc-products circle d-inline-block  mb-4">ABOUT US</span>
                            <h2 class="about-us-main-hd mb-3">
                                The One-stop shop for the newest
                                and best Luxury Products
                                <img src="{{ asset('assets/web/images/back-star.png') }}"
                                    style="vertical-align: middle;text-align:center;width:70px;display:none" alt="">
                                available. 
                            </h2>
                         <h2 class="about-us-main-hd">
                                We think that Reliability Bought
                                <img src="{{ asset('assets/web/images/back-star-2.png') }}"
                                    style="vertical-align: middle;text-align:center;width:70px;display:none" alt=""> 
                                    to
                                be dependable, and most of all, fun.
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-5 column-style">
                        <div class="signature-group">
                            <img src="{{ asset('assets/web/images/signature.png') }}" class="img-fluid" alt="">
                            <p class="author-name">- Anjan Parmar, Ceo.</p>
                        </div>
                        <img src="{{ asset('assets/web/images/stripes.png') }}" class="stripes-img" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="sh-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="about-us-cards">
                            <div class="box-ab-us mb-3">
                                <img src="{{ asset('assets/web/images/target.png') }}" class="img-fluid" alt="">
                            </div>
                            <h2 class="main-ab-us-hd mb-3">Our Focus</h2>
                            <p class="ab-us-text">
                                Consectetur adipiscing elit duis tristique sollicitudin nibh. Aliquam eleifend mi in nulla
                                posuere sollicitudin aliquam. Urna et pharetra.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="about-us-cards">
                            <div class="box-ab-us mb-3">
                                <img src="{{ asset('assets/web/images/rocket.png') }}" class="img-fluid" alt="">
                            </div>
                            <h2 class="main-ab-us-hd mb-3">Our Objective</h2>
                            <p class="ab-us-text">
                                Urma cursus eget nunc scelerisque viverra
                                Dictum non consectetur a erat nam at lectus urna duis. Arcu odio ut sem nulla pharetra diam
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="about-us-cards">
                            <div class="box-ab-us mb-3">
                                <img src="{{ asset('assets/web/images/idea.png') }}" class="img-fluid" alt="">
                            </div>
                            <h2 class="main-ab-us-hd mb-3">Our Philosophy</h2>
                            <p class="ab-us-text">
                                Elementum tempus egestas sed risus pretium quam vulputate. Et leo duis ut diam quam nulla
                                porttitor. Leo duis ut diam quam nulla porttitor.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="video px-4">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative">
                            <video src="{{ asset('assets/web/images/video-about-us.mp4') }}" class="ab-us-video"
                                autoplay muted loop preload></video>
                            {{-- <button class="play-btn"><i class="fa-solid fa-pause"></i></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<section class="sh-space">-->
        <!--    <div class="container-fluid">-->
        <!--        <div class="row ">-->
        <!--            <div class="col-12">-->
        <!--                <div class="text-center">-->
        <!--                    <span class="exc-products">Our Team</span>-->
        <!--                    <h2 class="main-sec-heading my-5">-->
        <!--                        Our Expert Team-->
        <!--                    </h2>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="about-us-slides">-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-1.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Anjan Parmar</h2>-->
        <!--                        <p class="exp-para">Co-Founder, CEO</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-2.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Jennifer Hal’s</h2>-->
        <!--                        <p class="exp-para">E-Commerce Specialist</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-3.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Isabell Jones</h2>-->
        <!--                        <p class="exp-para">Social Media Executive</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-4.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Johan Miller</h2>-->
        <!--                        <p class="exp-para">Warehouse Manager</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-3.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Isabell Jones</h2>-->
        <!--                        <p class="exp-para">Social Media Executive</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--             <div class="col-lg-3 col-md-6 col-sm-6 mb-3">-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-1.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Anjan Parmar</h2>-->
        <!--                        <p class="exp-para">co-Founder, CEO</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div> -->
        <!--             <div class="col-lg-3 col-md-6 col-sm-6 mb-3">-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-2.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Jennifer Hal’s</h2>-->
        <!--                        <p class="exp-para">E-Commerce Specialist</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div> -->
        <!--             <div class="col-lg-3 col-md-6 col-sm-6 mb-3">-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-3.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Isabell Jones</h2>-->
        <!--                        <p class="exp-para">Social Media Executive</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div> -->
        <!--            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">-->
        <!--                <div class="card-experts">-->
        <!--                    <div>-->
        <!--                        <img src="{{ asset('assets/web/images/expert-4.png') }}" class="img-fluid expert-images"-->
        <!--                            alt="">-->
        <!--                    </div>-->
        <!--                    <div class="ab-us-exp-content">-->
        <!--                        <h2 class="exp-hd mb-2">Johan Miller</h2>-->
        <!--                        <p class="exp-para">Warehouse Manager</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div> -->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <x-slide-blog />
        <x-our-blog :$blogs />

    </main>
    {{-- <script>
        const btn = document.querySelector(".play-btn");
        const video = document.querySelector(".ab-us-video");


        btn.addEventListener("click", () => {
            const hasClass = video.parentNode.querySelector("i").classList.contains("fa-play");
            const icon = video.parentNode.querySelector("i").classList;

            if (hasClass) {
                video.play();
                icon.replace("fa-play", "fa-pause");
            } else {
                video.pause();
                icon.replace("fa-pause", "fa-play");
            }
        })
        video.addEventListener("ended", () => {
            const icon = video.parentNode.querySelector("i").classList;
            icon.replace("fa-pause", "fa-play");
        })
    </script> --}}
@endsection
