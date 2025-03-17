<?php

namespace App\Providers;

use App\NaviMenuFields;
use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Register NaviMenuFields when Navi is available
        if (class_exists('App\\NaviMenuFields')) {
            $this->app->resolving('navi', function ($navi) {
                return new \App\NaviMenuFields($navi);
            });
        }
    }
}
