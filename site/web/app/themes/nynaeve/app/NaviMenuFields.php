<?php

namespace App;

use Log1x\Navi\Navi;

class NaviMenuFields
{
    /**
     * The Navi instance.
     *
     * @var \Log1x\Navi\Navi
     */
    protected $navi;

    /**
     * Create a new NaviMenuFields instance.
     *
     * @param  \Log1x\Navi\Navi  $navi
     * @return void
     */
    public function __construct(Navi $navi)
    {
        $this->navi = $navi;

        $this->registerFilters();
    }

    /**
     * Register the filters.
     *
     * @return void
     */
    protected function registerFilters()
    {
        add_filter('wp_nav_menu_objects', [$this, 'addFieldsToMenuItems']);
    }

    /**
     * Add fields to menu items.
     *
     * @param  array  $items
     * @return array
     */
    public function addFieldsToMenuItems($items)
    {
        foreach ($items as $item) {
            $item->category = get_field('category', $item);
            $item->description = get_field('description', $item);
            $item->featured_image = get_field('featured_image', $item);
            $item->featured_text = get_field('featured_text', $item);
        }

        return $items;
    }
}