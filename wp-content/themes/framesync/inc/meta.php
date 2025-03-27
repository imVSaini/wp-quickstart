<?php

/**
 * Meta Tags Compatibility File.
 *
 * @package framesync
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('framestrap_dynamic_meta_tags')) {

    function framestrap_dynamic_meta_tags() {
        global $post;

        // Retrieve meta fields and ensure they exist before trimming.
        $meta_title = get_field('meta_title') ? trim(get_field('meta_title')) : '';
        $meta_desc = get_field('meta_description') ? trim(get_field('meta_description')) : '';

        // Return an associative array with title and description.
        return array(
            'title' => esc_html($meta_title),
            'description' => esc_html($meta_desc)
        );
    }
}