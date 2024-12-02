<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Remove the default widgets editor depenedencies check.
 *
 * @return void
 */
remove_filter('admin_head', 'wp_check_widget_editor_deps');

/**
 * Set ACF JSON Save Path Location
 *
 * @return string
 */
function my_acf_json_save_point($path) {
    return get_stylesheet_directory() . '/resources/acf-json';
}
add_filter('acf/settings/save_json', __NAMESPACE__ . '\\my_acf_json_save_point');