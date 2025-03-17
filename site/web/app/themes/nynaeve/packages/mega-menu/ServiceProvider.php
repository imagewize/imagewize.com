<?php

namespace App\Packages\MegaMenu;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Roots\Acorn\View\Composer;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register package views path
        $this->loadViewsFrom(__DIR__ . '/views', 'mega-menu');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the mega menu blade component
        $this->app['blade.compiler']->component('mega-menu::mega-menu', 'mega-menu');
        
        // Only register ACF fields if using a menu
        $this->registerConditionalFields();
    }
    
    /**
     * Register fields only when they're needed
     * 
     * @return void
     */
    protected function registerConditionalFields()
    {
        // Check if we're in admin or if a menu item is being edited
        if (is_admin()) {
            add_action('acf/init', function () {
                if (!function_exists('acf_add_local_field_group')) {
                    return;
                }
                
                // If in nav menu screen, register the fields
                $screen = get_current_screen();
                if ($screen && $screen->id === 'nav-menus') {
                    $this->registerMenuFields();
                }
                
                // Or if we're previewing a menu in the site
                if (function_exists('get_field') && get_field('use_megamenu', 'option')) {
                    $this->registerMenuFields();
                }
            });
        }
    }

    /**
     * Register menu fields for mega menu
     *
     * @return void
     */
    protected function registerMenuFields()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        $menuFields = new MenuFields();
        acf_add_local_field_group($menuFields->fields());
    }
}
