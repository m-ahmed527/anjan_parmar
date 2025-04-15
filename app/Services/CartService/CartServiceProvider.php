<?php

namespace App\Services\CartService;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Create a new class instance.
     */
    public function register()
    {
        $this->app->singleton('cart', function ($app) {
            // dd($app);
            return new Cart();
        });
    }
}
