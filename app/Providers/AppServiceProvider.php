<?php

namespace App\Providers;

use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.posts.layouts.post_type_selector', function ($view) {
            $view->with('tags', Tag::all());
        });
        view()->composer('admin.layouts.sidebar', function ($view) {
            $view->with('tags', Tag::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
