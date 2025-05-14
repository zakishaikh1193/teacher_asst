<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        // // Fetch all services
        // $services = DB::table('services')->select('heading', 'url')->get();
        // // Share with all views
        // View::share('menuServices', $services);

        // Fetch all categories with limit 10
        if (Schema::hasTable('service_categories')) {
            $categories = DB::table('service_categories')->limit(10)->get();
            View::share('menuCategories', $categories);  // Share with all views

            // Load settings globally and share it with all views
            $settings = DB::table('settings')->first();
            View::share('AppSettings', $settings);
        }
        // Register a custom namespace called 'event'  
        // Lang::addNamespace('event', resource_path('views/event/lang'));
        Lang::addNamespace('lang', resource_path('views/lang'));
        app()->setLocale(session('locale', config('app.locale')));
    }
}
