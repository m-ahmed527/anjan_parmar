@extends('layouts.web.app')


@section('content')
    <main>

        <section class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-banner">
                            <div>
                                <h1 class="sh-head">Best Camera Buy</h1>
                                <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Blogs
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="container-fluid  sh-space">
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
                            <div class="filter-product-1 mb-4">
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
                        <div class="col-xl-8 col-12">
                                <div>
                                    <button class="btn-open-sidebar mb-2"><i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                                <div class="blog-sect-card blog-sect-card-border mb-5">
                                    <div class="blog-img-area blog-img-area-2 m-0">
                                        <img src="{{ asset('assets/web/images/blogs-main-image.jpg') }}" class="img-fluid cont-images"
                                            alt="">
                                        <span class="img-banner">June 1, 2024</span>
                                    </div>
                                    <div>
                                        <h2 class="card-main-heading heading-blg">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </h2>
                                        <p class="para light-gray my-3">
                                            Pharetra pharetra massa massa ultricies mi quis hendrerit dolor. Rhoncus est
                                            pellentesque elit ullamcorper. Id velit ut tortor pretium. Enim blandit
                                            volutpat.Nullam sit amet vehicula ex. Vivamus ac enim eu lacus ornare
                                            sollicitudin.
                                            Integer lacus dui, gravida sit amet pellentesque sed, posuere nec eros.
                                            Pellentesque
                                            mattis viverra erat, at lacinia elit. Quisque convallis pharetra metus finibus
                                            volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                            posuere
                                            cubilia curae; Aliquam semper libero ut lectus vehicula, quis sagittis magna
                                            dapibus. Suspendisse sodales lorem tincidunt sagittis fermentum. Curabitur
                                            placerat
                                            ultrices dolor eu sagittis. Donec non sodales lacus. Nullam ut felis vitae justo
                                            tristique consectetur id vitae quam. Nam posuere eros ut urna viverra rutrum.
                                            Nam
                                            nulla tellus, viverra mollis lectus nec, hendrerit luctus libero.
                                        </p>
                                        <p class="para light-gray my-3">
                                            Cras pulvinar mattis nunc sed blandit libero volutpat sed cras mus. Integer
                                            interdum
                                            metus vel porttitor volutpat. Maecenas tincidunt et neque in elementum. Orci
                                            varius
                                            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ac
                                            lectus consequat, aliquam eros nec, dignissim enim. Vestibulum ante ipsum primis
                                            in
                                            faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque in
                                            efficitur
                                            nibh.
                                        </p>
                                    </div>
                                </div>
                                <div class="blog-camera-infor my-5">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <h2 class="blog-camera-heading mb-4">Neque convallis a cras semper auctor neque
                                                vitae
                                                tempus.
                                            </h2>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <img src="{{ asset('assets/web/images/camera-image.png') }}" class="img-fluid camera-image"
                                                alt="">
                                        </div>
                                        <div class=" col-12 d-flex align-items-center mb-3">
                                            <ul class="lists-shipping">
                                                <li class="shipping-para mb-3">Ut dapibus dui quis elit elementum,
                                                    vulputate
                                                    elei</li>
                                                <li class="shipping-para mb-3">Ut dapibus dui quis elit elementum,
                                                    vulputate
                                                    elei</li>
                                                <li class="shipping-para mb-3">Ut dapibus dui quis elit elementum,
                                                    vulputate
                                                    elei</li>
                                                <li class="shipping-para mb-3">Ut dapibus dui quis elit elementum,
                                                    vulputate
                                                    elei</li>
                                                <li class="shipping-para mb-3">Ut dapibus dui quis elit elementum,
                                                    vulputate
                                                    elei</li>
                                                <li class="shipping-para mb-3">Ut dapibus dui quis elit elementum,
                                                    vulputate
                                                    elei</li>
                                            </ul>
                                        </div>
                                        <div class="col-12 my-3">
                                            <h2 class="blog-camera-heading mb-4">Urna duis convallis convallis tellus id
                                                interdum velit.
                                            </h2>
                                            <div class="box-camera">
                                                <p class="gray-para">Blandit aliquam etiam erat velit. Cursus eget nunc
                                                    scelerisque viverra mauris
                                                    in aliquam sem.Luctus venenatis lectus magna fringilla.
                                                </p>
                                                <p class="inside-text"><span class="jack-spparow-text">– Jack
                                                        Robert</span>, Los Angles, CA</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="para gray my-4">Enim nunc faucibus a pellentesque sit. Ut lectus
                                                    arcu
                                                    bibendum at
                                                    varius.consectetur. Vestibulum vel nibh pretium, fringilla quam ac,
                                                    pretium
                                                    sem. Vestibulum suscipit blandit pharetra. Aliquam suscipit, urna sit
                                                    amet
                                                    iaculis dictum.
                                                </p>
                                                <div class="last-area-bottom">
                                                    <button class="tab-btn-products tab-btn-pro-2">Accessories</button>
                                                    <div class="social-media-icons">
                                                        <a href="#" class="social-media-btn">
                                                            <i class="fa-brands fa-instagram"></i>
                                                        </a>
                                                        <a href="#" class="social-media-btn">
                                                            <i class="fa-brands fa-threads"></i>
                                                        </a>
                                                        <a href="#" class="social-media-btn">
                                                            <i class="fa-brands fa-discord"></i> </a>
                                                        <a href="#" class="social-media-btn"><i
                                                                class="fa-brands fa-meta"></i></a>
                                                        <a href="#" class="social-media-btn"><i
                                                                class="fa-brands fa-x-twitter"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
        </section>
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
