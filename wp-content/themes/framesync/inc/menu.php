<?php

/**
 * Dynamic Navigation with shortcode Compatibility File.
 *
 * @package framesync
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('framesync_menu')) {

    function framesync_menu($atts, $content = null)
    {

        extract(shortcode_atts(
            array(
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'menu-list',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'depth'           => 0,
                'add_li_class'    => 'menu-item',
                'walker'          => '',
                'theme_location'  => ''
            ),
            $atts
        ));

        
        return wp_nav_menu(array(
            'menu'            => $menu,
            'container'       => $container,
            'container_class' => $container_class,
            'container_id'    => $container_id,
            'menu_class'      => $menu_class,
            'menu_id'         => $menu_id,
            'echo'            => false,
            'fallback_cb'     => $fallback_cb,
            'before'          => $before,
            'after'           => $after,
            'link_before'     => $link_before,
            'link_after'      => $link_after,
            'depth'           => $depth,
            'walker'          => $walker,
            'theme_location'  => $theme_location
        ));
    }
}

add_shortcode("wp_menu", "framesync_menu");

if (!function_exists('add_active_class_to_menu')) {
    
    function add_active_class_to_menu($classes, $item) {
        if (in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes)) {
            $classes[] = 'current-active';
        }
        return $classes;
    }

}

add_filter('nav_menu_css_class', 'add_active_class_to_menu', 10, 2);