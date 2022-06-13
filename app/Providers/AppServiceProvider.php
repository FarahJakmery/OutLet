<?php

namespace App\Providers;

use App\Http\View\Composers\ProductComposer;
use App\Models\Brand;
use App\Models\Mcategory;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Sharing Data With All Views
        View::share('Brands', Brand::all());
        View::share('mainCategories', Mcategory::all());
        View::share('SubCategories', Subcategory::all());
        View::share('Sizes', Size::all());
        // View Composers
        View::composer('*', ProductComposer::class);
    }
}
