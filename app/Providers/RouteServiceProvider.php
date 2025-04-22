<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        Route::middleware('is_admin', IsAdmin::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        
    }
}
