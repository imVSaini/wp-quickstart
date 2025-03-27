<?php

/**
 * Mix Manifest Compatibility File
 *
 * @package framesync
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('load_mix_manifest_file')) {
    function load_mix_manifest_file($prefix_path)
    {
        $mix_manifest_path = get_template_directory() . $prefix_path . '/mix-manifest.json'; // Change this path based on your project setup.
        if (file_exists($mix_manifest_path)) {
            $manifest = json_decode(file_get_contents($mix_manifest_path), true);
            return $manifest;
        }
        return false;
    }
}