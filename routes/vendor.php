<?php

use App\Http\Controllers\Vendor\AccountManagementController;
use App\Http\Controllers\Vendor\ProductManagementController;
use App\Http\Controllers\Vendor\RequestManagementController;
use App\Http\Controllers\Vendor\VendorDashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth', 'role_or_permission:Vendor')->group(function () {
    Route::name('dashboard.')->controller(VendorDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('profile', 'profile')->name('profile');
        // Route::get('orders', 'orders')->name('orders');
        // Route::get('inventory', 'inventory')->name('inventory');
        // Route::get('settings', 'settings')->name('settings');
    });
    Route::name('account.')->controller(AccountManagementController::class)->group(function () {
        Route::get('/account', 'index')->name('index');
        Route::post('/account-update', 'update')->name('update');
        Route::post('/account-image-update', 'updateImage')->name('update.image');
        Route::post('/account-password-update', 'updatePassword')->name('update.password');
    });
    Route::name('products.')->controller(ProductManagementController::class)->group(function () {
        Route::get('/products', 'index')->name('index');
        Route::get('/product/create', 'create')->name('create');
        Route::get('/product/get-attribues/{category}', 'getAttribute')->name('get.attributes');
        Route::post('/product/store', 'store')->name('store');
        Route::get('/product/details/{product}', 'show')->name('details');
        Route::get('/product/edit/{product}', 'edit')->name('edit');
        Route::post('/product/update/{product}', 'update')->name('update');
        Route::post('/product/delete/{product}', 'destroy')->name('delete');
    });
    Route::name('requests.')->controller(RequestManagementController::class)->group(function () {
        Route::get('/requests', 'index')->name('index');
        Route::get('/request/create', 'create')->name('create');
        Route::post('/request/store', 'store')->name('store');
        Route::get('/request/show/{vendorRequest}', 'show')->name('show');
        Route::get('/request/edit/{vendorRequest}', 'edit')->name('edit');
        Route::post('/request/update/{vendorRequest}', 'update')->name('update');
        Route::post('/request/delete/{vendorRequest}', 'destroy')->name('delete');
    });
});
