<footer class="footer loader">
    <div class="container-fluid ">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-5 col-xl-5 col-md-5 col-12">
                <div>
                    <img class="img-fluid footer-logo" src="{{ asset('assets/web/images/logo-headers.png') }}"
                        alt="">
                    <p class="para mt-3">Ut eleifend mattis ligula, porta finibus tincidunt urna gravida at. <br>
                        Aenean maecenas vehiculles mattis arcu non mattis Integer</p>
                </div>
            </div>
            <div class="col-lg-5 col-xl-3 col-md-5 col-12">
                <h3 class="footer-stay-hd footer-stay-hd-2 error-message">Stay on top of the latest trends</h3>
                <form action="{{ route('web.newsletter.store') }}" method="POST" class="form-class"
                    id="newsletter-form">
                    @csrf
                    <div class="group-inps-area">
                        <input type="email" name="email" placeholder="Enter Your Mail Id"
                            class="form-control-input email-form">
                        <button type="button" class="submit-btn" id="newsletter-btn">Submit</button>
                    </div>
                    <label for="agree" class="agree-label">
                        <input type="checkbox" id="agree" name="agreement">
                        <span>I agree with the terms & conditions</span>
                    </label>
                </form>

            </div>
        </div>
        <div class="row mt-3">
            <h3 class="footer-stay-hd">
                Follow Us On Social
            </h3>
            <div class="col-lg-3 col-12">
                <div>
                    <div class="social-icon">
                        <a href="#" class="link-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="link-icon">
                            <i class="fa-brands fa-threads"></i>
                        </a>
                        <a href="#" class="link-icon">
                            <i class="fa-brands fa-meta"></i>
                        </a>
                        <a href="#" class="link-icon">
                            <i class="fa-brands fa-meta"></i>
                        </a>
                        <a href="#" class="link-icon">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                    <h3 class="footer-stay-hd email-footer-hd">
                        Our Email
                    </h3>
                    <a href="mailto:sealoffer@outlook.com" class="para text-decoration-none">
                        sealoffer@outlook.com
                    </a>
                    <h3 class="footer-stay-hd email-footer-hd">
                        Phone Number
                    </h3>
                    <a href="tel:321-978-3993" class="para text-decoration-none">
                        321-978-3993
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div>
                    <h3 class="footer-stay-hd">
                        Helpful Links
                    </h3>
                    <ul class="footer-links-area mt-4">
                        <li>
                            <a href="#" class="footer-link text-decoration-none">
                                Company Overview
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('shipping') }}" class="footer-link text-decoration-none">
                                Shipping Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('terms-condition') }}" class="footer-link text-decoration-none">
                                Terms & Condition
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer-link text-decoration-none">
                                Help Center
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.contacts.index') }}" class="footer-link text-decoration-none">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div>
                    <h3 class="footer-stay-hd">
                        Quick Links
                    </h3>
                    <ul class="footer-links-area mt-4">
                        <li>
                            <a href="{{ route('index') }}" class="footer-link text-decoration-none">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}" class="footer-link text-decoration-none">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories') }}" class="footer-link text-decoration-none">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.blogs.index') }}" class="footer-link text-decoration-none">
                                Blogs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonials') }}" class="footer-link text-decoration-none">
                                Testimonial
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#" class="footer-link text-decoration-none">
                                Gallery
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <div>
                    <h3 class="footer-stay-hd">
                        Payment
                    </h3>
                    <ul class="footer-links-area mt-4">
                        <li>
                            <a href="#" class="footer-link footer-link-icons text-decoration-none">
                                <span class="link-icon link-icon-style">
                                    <img src="{{ asset('assets/web/images/master-card.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <span>
                                    Mastercard
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer-link footer-link-icons text-decoration-none">
                                <span class="link-icon link-icon-style">
                                    <img src="{{ asset('assets/web/images/Skrill-Icon-1.svg.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <span>
                                    Skrill
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer-link footer-link-icons text-decoration-none">
                                <span class="link-icon link-icon-style">
                                    <img src="{{ asset('assets/web/images/pay.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <span>Apple Pay </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer-link footer-link-icons text-decoration-none">
                                <span class="link-icon link-icon-style">
                                    <img src="{{ asset('assets/web/images/Visa-Icon-1.svg.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <span>
                                    Visa
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer-link footer-link-icons text-decoration-none">
                                <span class="link-icon link-icon-style">
                                    <img src="{{ asset('assets/web/images/pay-pal.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <span>
                                    Pay Pal
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div>
                    <h3 class="footer-stay-hd">
                        Shipping
                    </h3>
                    <ul class="footer-links-area mt-4">
                        <li>
                            <a href="#" class="para footer-link-icons text-decoration-none">
                                <span class="shipping-icon">
                                    <img src="{{ asset('assets/web/images/white-card.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <div>
                                    <p>Express Shipping</p>
                                    <p>3-6 Business Days</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="para footer-link-icons text-decoration-none">
                                <span class="shipping-icon">
                                    <img src="{{ asset('assets/web/images/white-badge.png') }}" class="img-fluid"
                                        alt="">
                                </span>
                                <div>
                                    <p>Standard Shipping</p>
                                    <p>10+ Business Days</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-end">
                    <p class="last-footer-para">© <span id="year"></span> SEAL OFFER LLC. All Rights Reserved.
                    </p>
                    <p class="last-footer-para">Designed & Developed by <a href="https://www.webdesignglory.com"
                            class="text-decoration-none text-white">Web Design Glory</a></p>
                </div>
            </div>
        </div>

    </div>

</footer>

{{-- <script src="{{ asset('assets/web/js/jquery.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/web/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
@include('includes.logout-script', ['redirectUrl' => route('index')])
@include('includes.web.products.add-to-wishilist-script')
@include('includes.web.news-letter-script')

@if (session('empty_wishlist'))
    <script>
        Swal.fire({
            title: "Such an Empty!",
            text: "{{ session('empty_wishlist') }}",
            icon: "info",
            confirmButtonText: "OK"
        });
    </script>
@endif

</body>

</html>
