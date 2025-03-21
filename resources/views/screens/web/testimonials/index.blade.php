@extends('layouts.web.app')


@section('content')
    <style>
        .sub-heading-shipping {
            margin-bottom: 10px;
        }
    </style>
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Testimonials</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Testimonials
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid my-5 sh-space">
            <div class="row">
                <div class="col-12">
                    <h2 class="sub-heading-shipping mb-4 text-center">What Our Customers Say</h2>
                </div>
                @forelse ($testimonials as $testimonial)
                    <div class="col-lg-6">
                        <div class="testimonial">
                            <h3>{{ $testimonial->name }}</h3>
                            <p>{{ $testimonial->description }}</p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </main>
@endsection
