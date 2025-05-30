<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AttributeManagementController;
use App\Http\Controllers\Admin\BlogCategoryManagementController;
use App\Http\Controllers\Admin\BlogManagementController;
use App\Http\Controllers\Admin\BrandManagementController;
use App\Http\Controllers\Admin\CategoryManagementController;
use App\Http\Controllers\Admin\CategoryTypeManegementController;
use App\Http\Controllers\Admin\ContactManagementController;
use App\Http\Controllers\Admin\NewsLetterMangement;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OfferManagementController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\PageManagementController;
use App\Http\Controllers\Admin\ProductManagementController;
use App\Http\Controllers\Admin\ProfileManagementController;
use App\Http\Controllers\Admin\TestimonialsManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ShippingChargesManagementController;
use App\Http\Controllers\Admin\VendorManagementController;
use App\Http\Controllers\Admin\VendorRequestMangementController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->get('/login', function () {
    // view('screens.admin.notifications-mangement.index')
    return view('auth.admin.login');
})->name('login');
Route::middleware('auth', 'is_admin', 'role_or_permission:Admin')->group(function () {
    Route::get('/all-notifications', [NotificationController::class, 'index'])->name('notification.index');

    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    // Attributes
    Route::get('/attributes', [AttributeManagementController::class, 'index'])->name('attribute.index');
    Route::get('/attributes/get-data', [AttributeManagementController::class, 'getAttributeData'])->name('attribute.get.data');
    Route::get('/attribute/create', [AttributeManagementController::class, 'create'])->name('attribute.create');
    Route::post('/attribute/store', [AttributeManagementController::class, 'store'])->name('attribute.store');
    Route::get('/attribute/edit/{attribute}', [AttributeManagementController::class, 'edit'])->name('attribute.edit');
    Route::post('/attribute/update/{attribute}', [AttributeManagementController::class, 'update'])->name('attribute.update');
    Route::post('/attribute/delete/{attribute}', [AttributeManagementController::class, 'delete'])->name('attribute.delete');
    Route::get('/attribute/details/{attribute}', [AttributeManagementController::class, 'show'])->name('attribute.details');

    // Products
    Route::get('/all/products', [ProductManagementController::class, 'index'])->name('product.index');
    Route::get('/all/products/get-data', [ProductManagementController::class, 'getProductsData'])->name('product.get.data');
    Route::get('/all/vendor-products', [ProductManagementController::class, 'vednorProducts'])->name('vendor-products.index');
    Route::get('/all/products/premium', [ProductManagementController::class, 'premiumIndex'])->name('product.premium.index');
    Route::get('/all/products/premium/get-data', [ProductManagementController::class, 'getPremiumData'])->name('product.premium.get.data');
    Route::get('/product/create', [ProductManagementController::class, 'create'])->name('product.create');
    // Route::get('/get-variants/{attribute}', [ProductManagementController::class, 'getVariants'])->name('get.variant');
    // Route::get('/get-selected-variants/{attribute}', [ProductManagementController::class, 'selectedVariants'])->name('get.selected.variant');
    Route::post('/product/store', [ProductManagementController::class, 'store'])->name('product.store');
    Route::post('/product/delete/{product}', [ProductManagementController::class, 'delete'])->name('product.delete');
    Route::get('/product/edit/{product}', [ProductManagementController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{product}', [ProductManagementController::class, 'update'])->name('product.update');
    Route::get('/product/make-premium', [ProductManagementController::class, 'makePremium'])->name('product.make.premium');
    Route::get('/product/remove-premium', [ProductManagementController::class, 'removePremium'])->name('product.remove.premium');
    Route::get('/product/premium/offers', [ProductManagementController::class, 'productOffers'])->name('product.premium.offers');

    Route::get('/product/details/{product}', [ProductManagementController::class, 'show'])->name('product.details');
    // change product status
    Route::get('/product-status/change/{product}', [ProductManagementController::class, 'changeStatus'])->name('product.change.status');
    Route::get('/product/get-attribues/{category}', [ProductManagementController::class, 'getAttribute'])->name('get.attributes');

    //brands
    Route::get('/brands', [BrandManagementController::class, 'index'])->name('brand.index');
    Route::get('/brand/add', [BrandManagementController::class, 'create'])->name('brand.create');
    Route::post('/brand/add', [BrandManagementController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{brand}', [BrandManagementController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{brand}', [BrandManagementController::class, 'update'])->name('brand.update');
    Route::post('/brand/delete/{brand}', [BrandManagementController::class, 'delete'])->name('brand.delete');
    Route::get('/brand/show/{brand}', [BrandManagementController::class, 'show'])->name('brand.show');
    Route::get('/brand-status/change/{brand}', [BrandManagementController::class, 'changeStatus'])->name('brand.status.change');

    // CategorTypes
    Route::get('/category-types', [CategoryTypeManegementController::class, 'index'])->name('category.type.index');
    Route::get('/category-type/create', [CategoryTypeManegementController::class, 'create'])->name('category.type.create');
    Route::get('/category-type/edit/{categoryType}', [CategoryTypeManegementController::class, 'edit'])->name('category.type.edit');
    Route::post('/category-type/store', [CategoryTypeManegementController::class, 'store'])->name('category.type.store');
    Route::post('/category-type/update/{categoryType}', [CategoryTypeManegementController::class, 'update'])->name('category.type.update');
    Route::post('/category-type/delete/{categoryType}', [CategoryTypeManegementController::class, 'delete'])->name('category.type.delete');
    Route::get('/category-type/show/{categoryType}', [CategoryTypeManegementController::class, 'show'])->name('category.type.show');
    // Route::get('/category-status/change/{categoryType}', [CategoryTypeManegementController::class, 'changeStatus'])->name('category.change.status');

    // Categories
    Route::get('/categories', [CategoryManagementController::class, 'index'])->name('category.index');
    Route::get('/categories/get-data', [CategoryManagementController::class, 'getCategoryData'])->name('category.get.data');
    Route::get('/category/create', [CategoryManagementController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{category}', [CategoryManagementController::class, 'edit'])->name('category.edit');
    Route::post('/category/store', [CategoryManagementController::class, 'store'])->name('category.store');
    Route::post('/category/update/{category}', [CategoryManagementController::class, 'update'])->name('category.update');
    Route::post('/category/delete/{category}', [CategoryManagementController::class, 'delete'])->name('category.delete');
    Route::get('/category/show/{category}', [CategoryManagementController::class, 'show'])->name('category.show');
    Route::get('/category-status/change/{category}', [CategoryManagementController::class, 'changeStatus'])->name('category.change.status');

    // orders

    Route::get('/all-orders', [OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('/all-orders/get-data', [OrderManagementController::class, 'getOrdersData'])->name('orders.get.data');
    Route::get('/order/details/{order}', [OrderManagementController::class, 'orderDetails'])->name('order.details');
    // Route::get('/order-status/change/{order}', [OrderManagementController::class, 'changeStatus'])->name('order.change.status');
    // Route::get('/order/variant/details/{order}', [OrderManagementController::class, 'orderVariantDetails'])->name('order.variant.detail');

    // offers
    Route::get('/all-offers', [OfferManagementController::class, 'index'])->name('offers.index');
    Route::get('/all-offers/get-data', [OfferManagementController::class, 'getOffersData'])->name('offers.get.data');
    Route::get('/offer/details/{offer}', [OfferManagementController::class, 'show'])->name('offer.details');
    // Route::get('/offer-status/change/{offer}', [OfferManagementController::class, 'changeStatus'])->name('offer.change.status');
    // Route::get('/offer/variant/details/{offer}', [OfferManagementController::class, 'offerVariantDetails'])->name('offer.variant.detail');

    // vendor requests
    // Route::get('/all-vendor-requests', [VendorRequestMangementController::class, 'index'])->name('vendor.requests');
    // Route::get('/vendor-requests/details/{vendorRequest}', [VendorRequestMangementController::class, 'show'])->name('vendor.requests.detail');



    // vendor requests
    Route::get('/all-vendor-requests', [VendorRequestMangementController::class, 'index'])->name('vendor.requests');
    Route::get('/all-vendor-requests/get-data', [VendorRequestMangementController::class, 'getVendorRequestsData'])->name('vendor.requests.get.data');
    Route::get('/vendor-requests/details/{vendorRequest}', [VendorRequestMangementController::class, 'show'])->name('vendor.requests.detail');
    Route::post('/vendor-requests/reply/{vendorRequest}', [VendorRequestMangementController::class, 'reply'])->name('vendor.requests.reply');
    Route::get('/vendor-requests/all-replies/{vendorRequest}', [VendorRequestMangementController::class, 'allReplies'])->name('vendor.requests.all.replies');
    Route::get('/vendor-requests/all-replies/{vendorRequest}/get-data', [VendorRequestMangementController::class, 'getAllRepliesData'])->name('vendor.requests.all.replies.get.data');
    Route::post('/vendor-requests/reply/delete/{vendorRequestReply}', [VendorRequestMangementController::class, 'deleteReply'])->name('vendor.requests.reply.delete');

    // contact-us

    Route::get('/all-contacts', [ContactManagementController::class, 'index'])->name('contact.index');
    Route::get('/all-contacts/get-data', [ContactManagementController::class, 'getContactData'])->name('contact.get.data');
    Route::get('/contact/details/{contact}', [ContactManagementController::class, 'show'])->name('contact.detail');



    // profile
    Route::get('/profile', [ProfileManagementController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileManagementController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileManagementController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update-image', [ProfileManagementController::class, 'updateImage'])->name('profile.update.image');

    //users
    Route::get('/all-users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/all-users/get-data', [UserManagementController::class, 'getUserData'])->name('users.get.data');
    Route::get('/details/{user}', [UserManagementController::class, 'show'])->name('user.detial');
    Route::get('/create/new-user', [UserManagementController::class, 'create'])->name('create.user');
    Route::post('/create/new-user', [UserManagementController::class, 'store']);
    Route::get('/edit/{user}', [UserManagementController::class, 'edit'])->name('user.edit');
    Route::post('/update/{user}', [UserManagementController::class, 'update'])->name('update.user');

    // vendors
    Route::get('/all-vendors', [VendorManagementController::class, 'index'])->name('vendors.index');
    Route::get('/all-vendors/get-data', [VendorManagementController::class, 'getVendorsDarta'])->name('vendors.get.data');
    Route::get('/details/{vendor}', [VendorManagementController::class, 'show'])->name('vendor.detial');
    Route::get('/vendor-status/change/{vendor}', [VendorManagementController::class, 'changeStatus'])->name('vendor.change.status');
    // Route::get('/create/new-vendor', [VendorManagementController::class, 'create'])->name('create.vendor');
    // Route::post('/create/new-vendor', [VendorManagementController::class, 'store']);
    // Route::get('/edit/{vendor}', [VendorManagementController::class, 'edit'])->name('vendor.edit');
    // Route::post('/update/{vendor}', [VendorManagementController::class, 'update'])->name('update.vendor');

    //news letter
    Route::get('/all-newsletters', [NewsLetterMangement::class, 'index'])->name('newsletter.index');
    Route::get('/all-newsletters/get-data', [NewsLetterMangement::class, 'getNewLetterData'])->name('newsletter.get.data');
    Route::post('/all-newsletter/delete/{newsLetter}', [NewsLetterMangement::class, 'destroy'])->name('newsletter.delete');

    //blogs categories

    // Route::get('/all-blog-categories', [BlogCategoryManagementController::class, 'index'])->name('blog.category.index');
    // Route::get('/create/blog-category', [BlogCategoryManagementController::class, 'create'])->name('blog.category.create');
    // Route::get('/detail/blog-category/{blogCategory}', [BlogCategoryManagementController::class, 'show'])->name('blog.category.show');
    // Route::get('/edit/blog-category/{blogCategory}', [BlogCategoryManagementController::class, 'edit'])->name('blog.category.edit');
    // Route::post('/store/blog-category', [BlogCategoryManagementController::class, 'store'])->name('blog.category.store');
    // Route::post('/update/blog-category/{blogCategory}', [BlogCategoryManagementController::class, 'update'])->name('blog.category.update');
    // Route::post('/delete/blog-category/{blogCategory}', [BlogCategoryManagementController::class, 'destroy'])->name('blog.category.delete');

    //blogs
    Route::get('/all-blogs', [BlogManagementController::class, 'index'])->name('blog.index');
    Route::get('/all-blogs/get-data', [BlogManagementController::class, 'getBlogData'])->name('blog.get.data');
    Route::get('/create/new-blog', [BlogManagementController::class, 'create'])->name('blog.create');
    Route::post('/store', [BlogManagementController::class, 'store'])->name('blog.store');
    Route::post('/upload-content-image', [BlogManagementController::class, 'uploadContentImage'])->name('blog.store.content.image');

    Route::get('/edit/blog/{blog}', [BlogManagementController::class, 'edit'])->name('blog.edit');
    Route::post('/update/blog/{blog}', [BlogManagementController::class, 'update'])->name('blog.update');
    Route::get('/details/blog/{blog}', [BlogManagementController::class, 'show'])->name('blog.show');
    Route::post('/delete/blog/{blog}', [BlogManagementController::class, 'destroy'])->name('blog.delete');


    // // Notificaitons

    Route::get('/mark-all-read', function () {
        try {

            auth()->user()->unreadNotifications->markAsRead();
            return response()->json([
                'success' => true,
                'notificationCount' => count(auth()->user()->fresh()->unreadNotifications),
                'message' => 'All notifications marked as read.'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while marking all notifications as read.'
            ], 400);
        }
    })->name('notificaitons.mark.all.read');
    // Route::get('/mark-read/{id}', [NotificationController::class, 'markRead'])->name('notificaiton.mark.read');

    // Testimonials

    Route::get('/all-testimonials', [TestimonialsManagementController::class, 'index'])->name('testimonial.index');
    Route::get('/all-testimonials/get-data', [TestimonialsManagementController::class, 'getTestimonialData'])->name('testimonial.get.data');
    Route::get('/create/new-testimonial', [TestimonialsManagementController::class, 'create'])->name('testimonial.create');
    Route::post('/store/new-testimonial', [TestimonialsManagementController::class, 'store'])->name('testimonial.store');
    Route::get('/edit/testimonial/{testimonial}', [TestimonialsManagementController::class, 'edit'])->name('testimonial.edit');
    Route::post('/update/testimonial/{testimonial}', [TestimonialsManagementController::class, 'update'])->name('testimonial.update');
    Route::post('/delete/testimonial/{testimonial}', [TestimonialsManagementController::class, 'delete'])->name('testimonial.delete');


    //home page management

    // Route::get('/sliders', [PageManagementController::class, 'index'])->name('slider.management.index');
    // Route::get('/create-slider', [PageManagementController::class, 'create'])->name('slider.management.create');
    // Route::post('/create-slider', [PageManagementController::class, 'store'])->name('slider.management.store');
    // Route::get('/edit-slider/{slider}', [PageManagementController::class, 'edit'])->name('slider.management.edit');
    // Route::post('/delete-slider/{slider}', [PageManagementController::class, 'delete'])->name('slider.management.delete');
    // Route::post('/update-slider/{slider}', [PageManagementController::class, 'update'])->name('slider.management.update');

    // //homepage category-section management

    // Route::get('/homePage-category-section', [PageManagementController::class, 'viewCategorySection'])->name('home.page.category.section.index');
    // Route::get('/create-homePage-category-section/{categorySection}', [PageManagementController::class, 'editCategorySection'])->name('home.page.category.section.edit');
    // Route::post('/create-homePage-category-section/{categorySection}', [PageManagementController::class, 'updateCategorySection'])->name('home.page.category.section.update');

    // //shipping-charges-management

    // Route::get('/shipping-charges', [ShippingChargesManagementController::class, 'index'])->name('shipping.charges.index');
    // Route::get('/edit-shipping-charges/{shippingCharge}', [ShippingChargesManagementController::class, 'edit'])->name('shipping.charges.edit');
    // Route::post('/edit-shipping-charges/{shippingCharge}', [ShippingChargesManagementController::class, 'update'])->name('shipping.charges.update');
});
