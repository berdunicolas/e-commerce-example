<?php

namespace App\Providers;

use App\View\Components\Layout\Store;
use App\View\Components\Layout\StoreFooter;
use App\View\Components\Layout\StoreNavBar;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('store-layout', Store::class);
        Blade::component('store-navbar', StoreNavBar::class);
        Blade::component('store-footer', StoreFooter::class);
    }
}
