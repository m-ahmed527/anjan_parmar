<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;



// Route::view('/products', 'screens.web.products')->name('products');
Route::view('/categories', 'screens.web.categories.index')->name('categories');
Route::view('/about-us', 'screens.web.about-us.index')->name('about-us');
Route::view('/cart-page', 'screens.web.cart.index')->name('cart-page');
Route::view('/checkout', 'screens.web.checkout.index')->name('checkout');
Route::view('/blogs', 'screens.web.blogs.index')->name('blogs');
Route::view('/best-camera', 'screens.web.blogs.show')->name('best-camera');
Route::view('/shipping', 'screens.web.shipping-policy.index')->name('shipping');
Route::view('/terms-condition', 'screens.web.terms-conditions.index')->name('terms-condition');
Route::view('/contacts', 'screens.web.contact-us.index')->name('contacts');
Route::view('/wishlist', 'screens.web.wishlists.index')->name('wishlist');
Route::view('/categories-store', 'screens.web.stores.index')->name('categories-store');
// Route::view('/categories-store', 'screens.web.categories-store')->name('categories-store');
Route::view('/testimonials', 'screens.web.testimonials.index')->name('testimonials');


// Auth
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'loginView')->name('login');
        Route::post('/login', 'login');

        Route::get('/register', 'registerView')->name('register');
        Route::post('/register', 'register');

        Route::get('/forgot-password', 'forgotPasswordView')->name('forgot.password');
        Route::post('/forgot-password-email', 'forgotPassword')->name('password.email');


        Route::get('/reset-password', 'resetPasswordView')->name('reset.password');
        Route::post('/reset-password', 'resetPassword')->name('password.update');

        Route::get('/vendor/register', 'vendorRegisterView')->name('vendor.register.view');
    });
    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});
// Route::view('/login', 'auth.web.login')->name('login');

$products = [
    [
        'id' => 1,
        'name' => 'Smart Phones',
        'price' => '69.99',
        'finalPrice' => '160.99',
        'description' => '
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
 Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
              ',
        'img' => '/ip-img.png',
        'category' => 'Smart Phones'
    ],
    [
        'id' => 2,
        'name' => 'Laptops',
        'price' => '59.99',
        'finalPrice' => '160.99',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
 Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.

',
        'img' => '/laptop.png',
        'category' => 'Portable Laptops'
    ],
    [
        'id' => 3,
        'name' => 'Purse',
        'price' => '14.99',
        'finalPrice' => '160.99',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
 Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.

',
        'img' => '/purse.png',
        'category' => 'Luxury Bags'
    ],
    [
        'id' => 4,
        'name' => 'Headset',
        'price' => '9.99',
        'finalPrice' => '160.99',
        'description' => '
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
 Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
',
        'img' => '/head-img.png',
        'category' => 'Headsets'
    ],

    [
        'id' => 5,
        'name' => 'Black Hoodie',
        'price' => '12.99',
        'finalPrice' => '160.99',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
 Provident, rerum.
',
        'img' => '/hoodie-img.png',
        'category' => 'Hoodies'
    ],

    [
        'id' => 6,
        'name' => 'Gaming PC GTX 360',
        'price' => '9.99',
        'finalPrice' => '160.99',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
         Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
',
        'img' => '/cpu-img.png',
        'category' => 'Gaming Pc'
    ],

    [
        'id' => 7,
        'name' => 'Hoodie',
        'price' => '14.99 ',
        'finalPrice' => '160.99',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus,Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
         eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.',
        'img' => '/hoodie-img.png',
        'category' => 'Hoodie'
    ],

    [
        'id' => 8,
        'name' => 'Air-pods Headset',
        'price' => '14.99',
        'finalPrice' => '160.99',
        'description' => '
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure,Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
 ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
',
        'img' => '/airbuds-img.png',
        'category' => 'Airpods'
    ],

    [
        'id' => 9,
        'name' => '4X4 RC Cars',
        'price' => '9.99',
        'finalPrice' => '160.99',
        'description' => '
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptatibus, eum deserunt quisquam ipsum magni ut dolores. Iure, ipsa iste! Odit velit et error eligendi voluptatem sapiente nostrum quaerat ad.
',
        'img' => '/jeep-img.png',
        'category' => 'Rc Cars'
    ],
];


Route::get('/products/{id}', function ($id) use ($products) {
    $product = collect($products)->firstWhere('id', $id);

    if (!$product) {
        abort(404, 'Product not found');
    }
    return view('screens.web.products.show', ['product' => $product], ['products' => $products]);
})->name('products.show');

Route::view('/products', 'screens.web.products.index', ['products' => $products])->name('products');
Route::view('/shop', 'screens.web.shop.index', ['products' => $products])->name('shop');

Route::view('/', 'screens.web.index', ['products' => $products])->name('index');
