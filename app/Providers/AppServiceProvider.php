<?php

namespace App\Providers;

use App\Option;
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
        view()->composer('index.layouts.header', function ($view) {
            $view->with('contact_us', Option::getOption('contact_us'));
        });
        view()->composer('index.layouts.footer', function ($view) {
            $view->with('contact_us', Option::getOption('contact_us'));
            $view->with('about_website', Option::getOption('about_website'));
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
