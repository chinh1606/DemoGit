<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Slug\Slug;

class SlugServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('Slug', function () {
            return new Slug();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
