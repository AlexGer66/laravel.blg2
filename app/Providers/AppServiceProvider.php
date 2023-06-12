<?php

namespace App\Providers;

use App\Models\Posts;
use App\Models\Categories;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        view()->composer('layouts.sidebar', function ($view) {
            if (Cache::has('cats')) {
                $cats = Cache::get('cats');
            } else {
                $cats = Categories::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('cats', $cats, 30);
            }

            $view->with('popular_posts', Posts::orderBy('views', 'desc')->limit(3)->get());
            $view->with('cats', $cats);
        });
    }
}
