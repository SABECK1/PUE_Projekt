<?php

namespace App\Providers;

use BladeUI\Icons\BladeIconsServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            // Check if the user is authenticated
            $userRole = Auth::check() ? Auth::user()->role : 1; // -----CHANGE-----
            $view->with('userRole', $userRole);
        });

    }

}
