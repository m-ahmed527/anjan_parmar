@extends('layouts.web.app')


@section('content')
    <main>

        <section class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-banner">
                            <div>
                                <h1 class="sh-head">{{ $blog->name }}</h1>
                                <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a><a
                                        href="{{ route('web.blogs.index') }}" class="text-decoration-none">/
                                        Blogs</a>/{{ $blog->name }}
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
                                <input type="text" name="term" class="keyword-search-inp" placeholder="Enter Keyword">
                            </div>
                            <div class="filter-product-1  mb-4">
                                <div class="filter-header-1">
                                    <h2 class="filter-heading">Recent Posts</h2>
                                </div>
                                <div class="radio-list oveflow-block recent-blog-list">
                                    @include('screens.web.blogs.recent-list')
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="range-area position-relative p-0 flex-row">
                                    <img src="{{ asset('assets/web/images/sale-img.png') }}"
                                        class="img-fluid sale-img-product" alt="">
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
                                <img src="{{ $blog->getFirstMediaUrl('blog_image') }}" class="img-fluid cont-images"
                                    alt="">
                                <span class="img-banner">{{ $blog->created_at }}</span>
                            </div>
                            <div>
                                <h2 class="card-main-heading heading-blg">
                                    {{ $blog->name }}
                                </h2>
                                <p class="para light-gray my-3">
                                    {{ $blog->short_description }}
                                </p>
                            </div>
                        </div>
                        <div class="blog-camera-infor my-5">
                            <div class="row">
                                <p class="para light-gray my-3">
                                    {!! $blog->long_description !!}
                                </p>
                                {{-- <div class="col-12 my-3">
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
                                </div> --}}
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
@push('scripts')
    @include('includes.web.blogs.blog-search-script')
@endpush
