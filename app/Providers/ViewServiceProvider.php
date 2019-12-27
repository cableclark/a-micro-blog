<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Image;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(
            'posts.includes.sidebar', function ($view) {
                $view->with('latests_posts', Post::all()->sortByDesc("created_at"));    
            }
        );

        view()->composer(
            'admin.post.form', function ($view) {
                $view->with('images', Image::all()->sortByDesc("created_at"));    
            }
        );
    }
}
