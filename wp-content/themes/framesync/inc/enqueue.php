<?php

/**
 * Enqueue Scripts & Styles Compatibility File.
 *
 * @package framesync
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('theme_scripts')) {

    function theme_scripts() {
        // Get the theme data.
        $PREFIX_PATH       = '/dist';
        $the_theme         = wp_get_theme();
        $theme_version     = $the_theme->get('Version');

        if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
            // Load unminified scripts if SCRIPT_DEBUG is defined and true
            $theme_styles  = $PREFIX_PATH . "/css/theme.bundle.css";
            $theme_scripts = $PREFIX_PATH . "/js/theme.bundle.js";
        } else {
            // Import mix_manifest Config file
            require_once get_theme_file_path('/inc/manifest.php');
            // Production environment
            $manifest = load_mix_manifest_file($PREFIX_PATH);
            if ($manifest) {
                // Load minified scripts if SCRIPT_DEBUG is not defined or false
                $theme_styles  = $PREFIX_PATH . $manifest["/css/theme.bundle.min.css"];
                $theme_scripts = $PREFIX_PATH . $manifest["/js/theme.bundle.min.js"];
            }
        }

        // Core theme@1.0.0 stylesheet.
        wp_enqueue_style('wp-theme', get_template_directory_uri() . $theme_styles, array(), $theme_version, 'all');

        /* ================================================================================================================================ */
        /* ================================================================================================================================ */

        // jquery latest
        wp_enqueue_script('jquery');

        // Core theme@1.0.0
        wp_enqueue_script('wp-theme', get_template_directory_uri() . $theme_scripts, array('jquery'), $theme_version, true);
        wp_script_add_data( 'wp-theme', 'defer', true );
        wp_localize_script('wp-theme', 'themes', [
            'ROOT_URI' => get_template_directory_uri(),
        ]);
    }
} // End of if function_exists( 'theme_scripts' ).

add_action('wp_enqueue_scripts', 'theme_scripts');
