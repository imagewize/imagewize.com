<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
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
        // Remove NaviMenuFields registration - it's now handled by MegaMenu package
        
        // Register global view composers
        $this->registerViewComposers();
    }

    /**
     * Register view composers.
     *
     * @return void
     */
    public function registerViewComposers()
    {
        // ...existing code...
    }

    /**
     * Register theme assets.
     *
     * @return void
     */
    public function registerAssets()
    {
        // ...existing code...
    }
}
