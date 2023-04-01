<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\View;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

    // Schema::defaultStringLength(191);
       $wishlistCount=DB::table('wishlists')->get();
       View::share('wishlistCount',$wishlistCount);

       $cartCount=DB::table('carts')->get();
       View::share('cartCount',$cartCount);
    }
}
