<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Observers\ModelActivityObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Customer::observe(ModelActivityObserver::class);
        Cart::observe(ModelActivityObserver::class);
        Wishlist::observe(ModelActivityObserver::class);
        Order::observe(ModelActivityObserver::class);
        Payment::observe(ModelActivityObserver::class);
        OrderProduct::observe(ModelActivityObserver::class);
    }
}
