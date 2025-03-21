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
                                <img src="{{ asset('assets/web/images/sale-img.png') }}" class="img-fluid sale-img-product"
                                    alt="">
                                <a href="#" class="anchor-sale-product">View Collection</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-12 ">
                    <div>
                        <button class="btn-open-sidebar mb-2"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <div class="row blog-container">
                        @include('screens.web.blogs.list')
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
    @include('includes.web.blogs.paginate-script')

    @include('includes.web.blogs.blog-search-script')
@endpush
