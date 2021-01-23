<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('categories')){
            $categories = Category::all();
            View::share('categories', $categories);
        }

        if(Schema::hasTable('locations')){
            $locations = Location::all();
            View::share('locations', $locations);
        }

        Paginator::useBootstrap();

    }
}
