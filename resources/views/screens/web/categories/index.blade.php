@extends('layouts.web.app')

{{-- @php
    $tabContent = [
        ['btnText' => 'All Products', 'imgUrl' => 'assets/web/images/icon-1.png'],
        ['btnText' => 'Gadgets', 'imgUrl' => 'assets/web/images/tv-icon.png'],
        ['btnText' => "Clothing's", 'imgUrl' => 'assets/web/images/fashion.png'],
        ['btnText' => 'Appliances', 'imgUrl' => 'assets/web/images/portfolio.png'],
    ];
    
@endphp --}}

@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Categories</h1>
                        <p class="sh-para">
                            <a href="{{ route('index') }}" class="text-decoration-none">Home</a>
                            / Categories
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <section class="cards-cate-sect">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-12">
                        <div class="filter-category">

                        </div>
                        <div class="col-12">
                            <div class="class-row category-list" id="category-list" data-page="1">
                                @include('screens.web.categories.list')
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="btn-area-category">
                                <button class="mx-auto view-more-btn">
                                    View More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <x-slide-blog />
        <x-our-blog :$blogs />
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".view-more-btn").click(function() {
                let page = parseInt($("#category-list").attr("data-page")) + 1;

                $.ajax({
                    url: "{{ route('web.categories.index') }}",
                    type: "GET",
                    data: {
                        page: page
                    },
                    beforeSend: function() {
                        $("#category-list").LoadingOverlay("show");
                    },
                    success: function(response) {
                        $("#category-list").LoadingOverlay("hide");

                        if (response.html.trim() !== '') {
                            $("#category-list").append(response.html);
                            $("#category-list").attr("data-page", page);

                            // Agar current page lastPage ke barabar ho gaya to button hide kar do
                            if (page >= response.lastPage) {
                                $(".view-more-btn").hide();
                            }
                        } else {
                            $(".view-more-btn").hide();
                        }
                    },
                    error: function() {
                        $("#category-list").LoadingOverlay("hide");
                    }
                });
            });

            // **Page Load par bhi check kar lo ke sab categories agayi hain ya nahi**
            let currentPage = parseInt($("#category-list").attr("data-page"));
            let lastPage = "{{ $categories->lastPage() }}";

            if (currentPage >= lastPage) {
                $(".view-more-btn").hide();
            }
        });
    </script>
@endpush
