<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Customize excerpt length
 */
add_filter('excerpt_length', function () {
    return 25; // Adjust this number to control the word count
});


/**
 * Add "..." to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ;
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
 * @param string $path The default path
 * @return string
 */
function my_acf_json_save_point($path) {
    // Get current field group being saved
    $field_group = false;
    if (!empty($_POST['acf_field_group'])) {
        $field_group = $_POST['acf_field_group'];
    }

    // Default path
    $custom_path = get_stylesheet_directory() . '/resources/acf-json';

    if ($field_group && isset($field_group['title'])) {
        if ($field_group['title'] === 'Homepage Builder') {
            $custom_path = get_stylesheet_directory() . '/resources/acf-json/homepage-builder';
        } elseif ($field_group['title'] === 'Footer Options') {
            $custom_path = get_stylesheet_directory() . '/resources/acf-json/footer-options';
        } elseif ($field_group['title'] === 'Introduction Text') {
            $custom_path = get_stylesheet_directory() . '/resources/acf-json/introduction-text';
        }
    }

    // Create directory if it doesn't exist
    if (!file_exists($custom_path)) {
        wp_mkdir_p($custom_path);
    }

    return $custom_path;
}
add_filter('acf/settings/save_json', __NAMESPACE__ . '\\my_acf_json_save_point');

// Homepage Builder