<header>
    @php
        $cats = App\Models\Category::all();
        // dd($categories[0]->name);
    @endphp
    <div class="header-top">
        <p class="header-top-para">20% On All Popular Products</p>
        <div class="lang-curren">
            <button class="btn-style small-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-search"></i>
            </button>
            <a href="{{ route('web.vendor.register.view') }}" class="vendors-btn vendor-outline">
                Signup as vendors
            </a>
        </div>
    </div>
    <div class="header-second">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/grey-logo.png') }}" class="logo img-fluid" alt="">
        </a>

        <div class="position-relative">
            <div class="search-header">
                <select name="category" id="" class="btn  anchor-btn text-start search-select">
                    <option value="">Choose Categories</option>
                    @forelse ($cats as $cat)
                        <option value={{ $cat->slug }}>{{ $cat->name }}</option>
                    @empty
                        <option value="">No Category Available</option>
                    @endforelse

                </select>
                <input id="search" type="text" name="product_name" placeholder="Search Your Products"
                    class="header-search-input search-input">
            </div>

            <div class="search-suggestions">
                <ul class="search-suggestions--list hidden">
                    {{-- ajax se append ho rha hai --}}
                </ul>
            </div>
        </div>

        {{-- @dd(session('cart')) --}}
        <ul class="nav-links-main">
            <li class="position-relative">
                <a href="{{ route('web.wishlist.index') }}"
                    class="btn-style heart-btn text-decoration-none wishlist-btn">
                    <i class="fa fa-heart"></i>
                </a>
                <span class="number-badge wishlist-count">{{ auth()?->user()?->wishlistCount() ?? 0 }}</span>
            </li>
            <li class="position-relative">
                <a href="{{ route('web.cart.index') }}" class="cart-price-area text-decoration-none cart-btn">
                    <span class="cart-icon-area">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                    </span>
                    <span class="price-total cart-price">${{ session('cart')['total'] ?? 00.0 }}</span>
                </a>
                <span class="number-badge cart-count">{{ session('cart')['total_items'] ?? 0 }}</span>
            </li>
            <li>
                @auth
                    <form action="{{ route('web.logout') }}" method="POST" id="logout-form">
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
                <a href="{{ route('web.categories.index') }}" class="nav-link">
                    Categories
                </a>
            </li>
            <li>
                <a href="{{ route('web.products.index') }}" class="nav-link">
                    Products
                </a>
            </li>
            <li>
                <a href="{{ route('web.stores.index') }}" class="nav-link">
                    Shop by store
                </a>
            </li>
            <li>
                <a href="{{ route('web.blogs.index') }}" class="nav-link">
                    Blogs
                </a>
            </li>
        </ul>
        @guest
            <a href="{{ route('web.vendor.register.view') }}" class="vendors-btn">
                Signup as vendors
            </a>
        @endguest
        @role('Admin')
            <a href="{{ route('admin.index') }}" class="vendors-btn">
                Admin Dashboard
            </a>
        @endrole
        @role('Vendor')
            <a href="{{ route('vendor.dashboard.index') }}" class="vendors-btn">
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
                    <a href="{{ route('web.categories.index') }}" class="nav-link">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.products.index') }}" class="nav-link">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop') }}" class="nav-link">
                        Shop
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.blogs.index') }}" class="nav-link">
                        Blogs
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="position-relative">
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
                            <input id="" placeholder="Search Your Products" class="header-search-input">
                            <li>
                                <button class="btn-style-2 search-btn-back">
                                    <i class="fa fa-search"></i>
                                </button>
                            </li>
                        </div>
                        <div class="search-suggestions">
                            <ul class="search-suggestions--list hidden">
                                <li> <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                                    <div>
                                        Product Name 1
                                        <p>Category</p>
                                    </div>
                                </li>
                                <li> <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                                    <div>
                                        Product Name 2
                                        <p>Category</p>
                                    </div>
                                </li>
                                <li> <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                                    <div>
                                        Product Name 3
                                        <p>Category</p>
                                    </div>
                                </li>
                                <li> <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                                    <div>
                                        Product Name 4
                                        <p>Category</p>
                                    </div>
                                </li>
                                <li> <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                                    <div>
                                        Product Name 5
                                        <p>Category</p>
                                    </div>
                                </li>
                                <li> <img src="{{ asset('assets/web/images/gallery3.png') }}" alt="">
                                    <div>
                                        Product Name 6
                                        <p>Category</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog centered-modal">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <img src="{{ asset('assets/web/images/Seal-Offer-llc.png') }}" alt=""
                        class="logo img-fluid mb-5">
                </div>
                <div class="modal-body">
                    <div class="auth-buttons">
                        <a href="{{ route('web.register') }}" class="btn  w-100 mb-3">
                            Sign up
                        </a>
                        <a href="{{ route('web.login') }}" class="btn w-100">
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











{{-- // results.on("click", "li", function() {
    //     input.val("");
    //     // select.val("Relevance");
    //     results.addClass("hidden");
    // }); --}}

{{-- // const input = document.querySelectorAll('.header-search-input');
// const results = document.querySelector('.search-suggestions--list');
// const lists = document.querySelectorAll(".search-suggestions--list");

// lists.forEach(listItem => {
//     listItem.addEventListener("click", () => {
//         input[0] ? input[0].value = "" : input[1].value = ""
//         results.classList.add("hidden");
//     })
// });

// const detectSearch = (event) => {
//     const query = event.target.value.trim();
//     console.log(query);
//     if (query) {
//         // getSearchSuggestions(query);
//         results.classList.remove("hidden")
//     } else {
//         // hideSearchSuggestions();
//         results.classList.add("hidden")
//     }
// };
// console.log(input);
// input[0].addEventListener('keyup', detectSearch);
// input[1].addEventListener('keyup', detectSearch); --}}
