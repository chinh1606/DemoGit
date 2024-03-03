<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Trieu\Trieu;

class TrieuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton("Trieu", function(){
            return new Trieu();
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
