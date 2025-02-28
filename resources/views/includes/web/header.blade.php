<header>
    <div class="header-top">
        <p class="header-top-para">20% On All Popular Products</p>
        <div class="lang-curren">
            <button class="btn-style small-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-search"></i>
            </button>
            <a href="{{ route('vendor.register.view') }}" class="vendors-btn vendor-outline">
                Signup as vendors
            </a>
        </div>
    </div>
    <div class="header-second">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/grey-logo.png') }}" class="logo img-fluid" alt="">
        </a>

        <div class="search-header">
            <select name="" id="" class="btn  anchor-btn text-start">
                <option value="Relevance">Choose Categories</option>
                <option>Laptop</option>
                <option>Smart Watches </option>
                <option>Headsets </option>
                <option>Gaming Setups
                </option>
                <option>Drone Cameras
                </option>
            </select>
            <input type="text" placeholder="Search Your Products" class="header-search-input">
            <li>
                <button class="btn-style-2 search-btn-back">
                    <i class="fa fa-search"></i>
                </button>
            </li>
        </div>

        <ul class="nav-links-main">
            <li class="position-relative">
                <a href="{{ route('wishlist') }}" class="btn-style heart-btn text-decoration-none">
                    <i class="fa fa-heart"></i>
                </a>
                <span class="number-badge">0</span>
            </li>
            <li class="position-relative">
                <a href="{{ route('cart-page') }}" class="cart-price-area text-decoration-none">
                    <span class="cart-icon-area">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                    </span>
                    <span class="price-total">$00.00</span>
                </a>
            </li>
            <li>
                @auth
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="button" class="btn btn-style user-btn" id="logout-btn">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                @else
                    <button type="button" class="btn btn-style user-btn" data-bs-toggle="modal" data-bs-target="#auth">
                        <i class="fa-regular fa-circle-user"></i>
                    </button>

                @endauth
            </li>
            <li>
                <button class="btn-style search-btn-menu bar-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </li>
        </ul>
    </div>
    <nav class="header-third">
        <ul class="nav-links-main-2">
            <li>
                <a href="{{ route('index') }}" class="nav-link link-active">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about-us') }}" class="nav-link">
                    About
                </a>
            </li>
            <li>
                <a href="{{ route('categories') }}" class="nav-link">
                    Categories
                </a>
            </li>
            <li>
                <a href="{{ route('products') }}" class="nav-link">
                    Products
                </a>
            </li>
            <li>
                <a href="{{ route('categories-store') }}" class="nav-link">
                    Shop by store
                </a>
            </li>
            <li>
                <a href="{{ route('blogs') }}" class="nav-link">
                    Blogs
                </a>
            </li>
        </ul>
        @guest
            <a href="{{ route('vendor.register.view') }}" class="vendors-btn">
                Signup as vendors
            </a>
        @endguest
        @role('Admin')
            <a href="{{ route('admin.index') }}" class="vendors-btn">
                Admin Dashboard
            </a>
        @endrole
        @role('Vendor')
            <a href="#" class="vendors-btn">
                Vendor Dashboard
            </a>
        @endrole

    </nav>
    <div class="off-canva-custom">
        <div class="menu-bar">
            <div>
                <button class="search-btn-menu close-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <ul>
                <li>
                    <a href="{{ route('index') }}" class="nav-link">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}" class="nav-link">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}" class="nav-link">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}" class="nav-link">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop') }}" class="nav-link">
                        Shop
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs') }}" class="nav-link">
                        Blogs
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="search-header search-header-2">
                        <select name="" id="" class="btn  anchor-btn text-start">
                            <option value="Relevance">Choose Categories</option>
                            <option>Laptop</option>
                            <option>Smart Watches </option>
                            <option>Headsets </option>
                            <option>Gaming Setups
                            </option>
                            <option>Drone Cameras
                            </option>
                        </select>
                        <input type="text" placeholder="Search Your Products" class="header-search-input">
                        <li>
                            <button class="btn-style-2 search-btn-back">
                                <i class="fa fa-search"></i>
                            </button>
                        </li>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog centered-modal">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <img src="{{ asset('assets/web/images/Seal-Offer-llc.png') }}" alt=""
                        class="logo img-fluid mb-5">
                </div>
                <div class="modal-body">
                    <div class="auth-buttons">
                        <a href="{{ route('register') }}" class="btn  w-100 mb-3">
                            Sign up
                        </a>
                        <a href="{{ route('login') }}" class="btn w-100">
                            Login
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




</header>
