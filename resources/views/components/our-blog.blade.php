@props(['headTitle' => $headTitle ?? 'Our Blogs', 'subTitle' => $subTitle ?? 'Latest News & Update'])

<section class="blog-section mx-3">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="row align-items-center text-center justify-content-between mb-5">
                    <div class="col-12">
                        <div class="blog-hd-area" style="border-left: none">
                            <span class="exc-products">{{ $headTitle }}</span>
                            <h1 class="main-sec-heading mt-5">Latest News & Update</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr class="blog-hr">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                <div class="blog-card">
                    <div class="blog-img-area">
                        <img class="img-fluid blog-img" src="{{ asset('assets/web/images/blog1.png') }}" alt="">
                        <span class="img-banner">June 1, 2024</span>
                    </div>
                    <div class="blog-text-area">
                        <h3 class="card-main-heading">The Best Clothing's To Buy As A Modeling</h3>
                        <p class="para gray">At tellus at urna condimentum. Ut enim blandit volutpat maecenas
                            volutpat
                            blandit. Posuere urna nec tincidunt praesent....</p>
                        <a href="{{route('best-camera')}}" class="link-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                <div class="blog-card">
                    <div class="blog-img-area">
                        <img class="img-fluid blog-img" src="{{ asset('assets/web/images/blog2.png') }}" alt="">
                        <span class="img-banner">June 1, 2024</span>
                    </div>
                    <div class="blog-text-area">
                        <h3 class="card-main-heading">10 Devices To Make Your Everyday Life Better</h3>
                        <p class="para gray">At tellus at urna condimentum. Ut enim blandit volutpat maecenas
                            volutpat
                            blandit. Posuere urna nec tincidunt praesent....</p>
                        <a href="{{route('best-camera')}}" class="link-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                <div class="blog-card">
                    <div class="blog-img-area">
                        <img class="img-fluid blog-img" src="{{ asset('assets/web/images/blog3.png') }}" alt="">
                        <span class="img-banner">June 1, 2024</span>
                    </div>
                    <div class="blog-text-area">
                        <h3 class="card-main-heading">The Top 10 Devices You Must Have In 2024</h3>
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
