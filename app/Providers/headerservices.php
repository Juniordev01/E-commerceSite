<?php

namespace App\Providers;
use App\Models\profile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class headerservices extends ServiceProvider
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
        // if(auth()->user())
        // {
            view()->composer('*', function ($view) 
            {
                if(auth()->user())
                {
                    $profile = profile::where('user_id', Auth::user()->id)->first();
                    $view->with('profile',$profile); 
                    // view::share('profile',$profile); 
                }
                  
            });
        // }
    }
    
}
