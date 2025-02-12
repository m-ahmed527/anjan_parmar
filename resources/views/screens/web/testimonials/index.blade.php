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
                <div class="col-lg-6">
                    <div class="testimonial">
                        <h3>John Doe</h3>
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat augue non neque
                            consequat, et
                            fermentum justo viverra."</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial">
                        <h3>Jane Smith</h3>
                        <p>"Suspendisse potenti. Proin vitae suscipit erat. Cras malesuada semper odio, eu fringilla magna
                            placerat
                            ac."</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="testimonial">
                        <h3>Michael Brown</h3>
                        <p>"Donec bibendum, turpis a convallis aliquet, erat ligula efficitur turpis, sit amet vehicula
                            metus purus
                            et nulla."</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial">
                        <h3>Emily Wilson</h3>
                        <p>"Mauris non neque in sem hendrerit gravida. Aenean tincidunt lacus ut augue varius, et lacinia
                            orci
                            hendrerit."</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
