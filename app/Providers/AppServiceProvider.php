<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\IsAdmin;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\App;

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
        //
        Route::middleware('is_admin', IsAdmin::class);
        if (App::runningInConsole()) {
            $this->app->booted(function () {
                $schedule = app(Schedule::class);
                $schedule->command('notify:near-expiry')->daily();
            });
        }
    }
}
