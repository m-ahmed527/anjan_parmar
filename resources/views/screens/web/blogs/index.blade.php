@extends('layouts.web.app')


@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Blogs</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Blogs</p>
                    </div>
                </div>
            </div>

        </div>


        <div class="container-fluid my-5 sh-space">
            <div class="row g-4">
                <div class="col-lg-4 col-12 px-5 side-bar-area">
                    <div class="close-area-sidebar">
                        <button class="btn-close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="content-sidebar">
                        <div class="mb-4">
                            <input type="text" class="keyword-search-inp" placeholder="Enter Keyword">
                        </div>
                        <div class="filter-product-1  mb-4">
                            <div class="filter-header-1">
                                <h2 class="filter-heading">Recent Posts</h2>
                            </div>
                            <div class="radio-list oveflow-block">
                                <div class="blog-row">

                                    <img src="{{ asset('assets/web/images/blog-1-img.jpg') }}" class="blog-image"
                                        alt="blogs">

                                    <div class="">
                                        <span class="text-area-blogs">June 1, 2024</span>
                                        <h2 class="blog-main-heading mt-3">
                                            Lorem ipsum dolor sit amet consectetur.
                                        </h2>
                                    </div>
                                </div>
                                <div class="blog-row">
                                    <img src="{{ asset('assets/web/images/blog-2-img.jpg') }}" class="blog-image"
                                        alt="blogs">
                                    <div class="">
                                        <span class="text-area-blogs">June 1, 2024</span>
                                        <h2 class="blog-main-heading mt-3">
                                            Lorem ipsum dolor sit amet consectetur.
                                        </h2>
                                    </div>
                                </div>

                                <div class="blog-row">
                                    <img src="{{ asset('assets/web/images/blog-3-img.jpg') }}" class="blog-image"
                                        alt="blogs">
                                    <div class="">
                                        <span class="text-area-blogs">June 1, 2024</span>
                                        <h2 class="blog-main-heading mt-3">
                                            Lorem ipsum dolor sit amet consectetur.
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="filter-product-1 mb-4">
                            <div class="filter-header-1">
                                <h2 class="filter-heading">Tags</h2>
                            </div>
                            <div class="tab-product-area">
                                <button class="tab-btn-products">Accessories</button>
                                <button class="tab-btn-products">Home Appliances</button>
                                <button class="tab-btn-products">Laptops</button>
                                <button class="tab-btn-products">Maintenance</button>
                                <button class="tab-btn-products">Mobile Phones</button>
                            </div>
                        </div>
                        <div class="filter-product-1 mb-4">
                            <div class="filter-header-1">
                                <h2 class="filter-heading">Instagram</h2>
                            </div>
                            <div class="range-area">
                                <div class="ins-images-area">
                                    <img src="{{ asset('assets/web/images/figure-1.png') }}"
                                        class="img-fluid img-blog-2" alt="">
                                    <img src="{{ asset('assets/web/images/figure-2.png') }}" class="img-fluid img-blog-2"
                                        alt="">
                                    <img src="{{ asset('assets/web/images/figure-3.png') }}" class="img-fluid img-blog-2"
                                        alt="">
                                    <img src="{{ asset('assets/web/images/figure-4.png') }}" class="img-fluid img-blog-2"
                                        alt="">
                                    <img src="{{ asset('assets/web/images/figure-5.png') }}"
                                        class="img-fluid img-blog-2" alt="">
                                    <img src="{{ asset('assets/web/images/figure-6.png') }}" class="img-fluid img-blog-2"
                                        alt="">
                                </div>
                            </div>
                        </div> --}}
                        <div class="mb-4">
                            <div class="range-area position-relative p-0 flex-row">
                                <img src="{{ asset('assets/web/images/sale-img.png') }}" class="img-fluid sale-img-product"
                                    alt="">
                                <a href="#" class="anchor-sale-product">View Collection</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-12 ">
                    <div class="row blog-container">
                        {{-- <div class="col-12">
                            <button class="btn-open-sidebar mb-2"><i class="fa-solid fa-arrow-right"></i></button>
                        </div> --}}
                        @include('screens.web.blogs.list')
                        {{-- <div class="col-lg-6 col-xl-12 px-4 mb-5">
                            <div class="blog-sect-card">
                                <div class="blog-img-area">
                                    <img src="{{ asset('assets/web/images/blog2.png') }}" class="img-fluid cont-images  m-0"
                                        alt="">
                                    <span class="img-banner">June 1, 2024</span>
                                </div>
                                <div class="blog-content">
                                    <h2 class="card-main-heading heading-blg text-sm-start">
                                        Lorem ipsum dolor, sit amet conse.
                                    </h2>
                                    <p class="para gray my-3">
                                        Leo duis ut diam quam. Ultrices tincidunt arcu non sodales neque. Ultrices vitae
                                        auctor eu augue ut lectus arcu.
                                        Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae.
                                    </p>
                                    <a href="{{ route('best-camera') }}" class="link-btn">Read More</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-xl-12 px-4  mb-5">
                            <div class="blog-sect-card">
                                <div class="blog-img-area">
                                    <img src="{{ asset('assets/web/images/blog3.png') }}" class="img-fluid cont-images  m-0"
                                        alt="">
                                    <span class="img-banner">June 1, 2024</span>
                                </div>
                                <div class="blog-content">
                                    <h2 class="card-main-heading heading-blg text-sm-start">
                                        Lorem ipsum dolor, sit amet conse.
                                    </h2>
                                    <p class="para gray my-3">
                                        Venenatis cras sed felis eget. In massa tempor nec feugiat nisl pretium fusce.
                                        Turpis egestas sed tempus urna et
                                        pharetra pharetra massa massa. Sem et tortor consequat id porta...
                                    </p>
                                    <a href="{{ route('best-camera') }}" class="link-btn">Read More</a>
                                </div>
                            </div>
                        </div> --}}

                    </div>

                </div>
            </div>
        </div>
    </main>
    <script>
        const btn = document.querySelectorAll(".pag-btn");
        btn.forEach(element => {
            element.addEventListener("click", () => {
                btn.forEach(button => button.classList.remove("pagination-active"))
                element.classList.add("pagination-active");
            })
        });
    </script>
@endsection
@push('scripts')
    @include('includes.web.paginate-script')
@endpush
