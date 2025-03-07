<?php

use App\Http\Controllers\Vendor\AccountManagementController;
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
});
