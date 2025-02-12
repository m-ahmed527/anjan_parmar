@extends('layouts.web.app')


@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Contacts</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Contacts</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid my-5 sh-space">
            <div class="row">
                <div class="col-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.680381865286!2d-0.12720032301648004!3d51.50073251118986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604c38c8cd1d9%3A0xb78f2474b9a45aa9!2sBig%20Ben!5e0!3m2!1sen!2s!4v1738023409309!5m2!1sen!2s"
                        width="100%" height="600" style="border:0;border-radius:40px" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="mb-5"></iframe>
                </div>
                <div class="col-lg-7 px-5 d-flex justify-content-center form-area-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="tag-content">
                                <span class="exc-products circle mb-3 d-inline-block text-center">REACH US</span>
                            </div>
                            <h2 class="last-contact-heading mb-3">
                                We're here to help at <br /> the click of a button!
                            </h2>
                            <p class="para-card-last mb-5">Leo duis ut diam quam nulla porttitor massa id. Dictum at commodo
                                ullamcorper.
                                Sit amet <br />
                                cursus sit amet sit amet commodo dictum.
                            </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="inner-cards-contact">
                                <div class="contact-icon-area">
                                    <img src="{{ asset('assets/web/images/location.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="box-inner-heading">Regional Office</h2>
                                    <p class="contact-para-area-2">Leo duis ut diam quam nulla.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="inner-cards-contact">
                                <div class="contact-icon-area">
                                    <img src="{{ asset('assets/web/images/email-icon.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="box-inner-heading">Mail Us</h2>
                                    <p class="contact-para-area-2">sealoffer@outlook.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="inner-cards-contact">
                                <div class="contact-icon-area">
                                    <img src="{{ asset('assets/web/images/message.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="box-inner-heading">Chat With Us</h2>
                                    <p class="contact-para-area-2">Leo duis ut diam quam nulla.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="inner-cards-contact">
                                <div class="contact-icon-area">
                                    <img src="{{ asset('assets/web/images/call.png') }}" alt="">
                                </div>
                                <div>
                                    <h2 class="box-inner-heading">Call Us</h2>
                                    <p class="contact-para-area-2">321-978-3993</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 px-5 justify-content-center form-area-block">
                    <div>
                        <form action="" class="form-block">
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email Address">
                            <input type="number" placeholder="Phone Number" name="" id="">
                            <textarea name="" placeholder="Additional Message" id="" cols="30" rows="10"></textarea>
                            <button type="submit" class="submit-btn submit-btn-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
