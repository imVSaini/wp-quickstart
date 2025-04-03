<?php
/*
 * Plugin Name: Clienteles
 * Description: Easily highlight your satisfied clients! Showcase client logos beautifully with our intuitive WordPress plugin.
 * Author: Vaibhav Saini
 * Author URI: https://www.linkedin.com/in/vaibhavsaini07/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires PHP: 7.4
 */

if (!function_exists('framesync_register_cpt_clientele')) {

    function framesync_register_cpt_clientele() {

        /**
         * Post Type: Clientele.
         */

        $labels = [
            "name" => __("Clienteles", "framesync"),
            "singular_name" => __("Clientele", "framesync"),
            "menu_name" => __("Clienteles", "framesync"),
            "all_items" => __("All Clienteles", "framesync"),
            "add_new" => __("Add new", "framesync"),
            "edit_item" => __("Edit Clientele", "framesync"),
            "new_item" => __("New Clientele", "framesync"),
            "view_item" => __("View Clientele", "framesync"),
            "view_items" => __("View Clienteles", "framesync"),
            "search_items" => __("Search Clienteles", "framesync"),
            "not_found" => __("No clienteles found", "framesync"),
            "not_found_in_trash" => __("No clienteles found in trash", "framesync"),
            "parent" => __("Parent Clientele:", "framesync"),
            "remove_featured_image" => __("Remove featured image for this clientele", "framesync"),
            "use_featured_image" => __("Use as featured image for this clientele", "framesync"),
            "archives" => __("Clientele archives", "framesync"),
            "insert_into_item" => __("Insert into clientele", "framesync"),
            "uploaded_to_this_item" => __("Upload to this clientele", "framesync"),
            "filter_items_list" => __("Filter clienteles list", "framesync"),
            "items_list_navigation" => __("Clienteles list navigation", "framesync"),
            "items_list" => __("Clienteles list", "framesync"),
            "attributes" => __("Clienteles attributes", "framesync"),
            "name_admin_bar" => __("Clientele", "framesync"),
            "item_published" => __("Clientele published", "framesync"),
            "item_published_privately" => __("Clientele published privately.", "framesync"),
            "item_reverted_to_draft" => __("Clientele reverted to draft.", "framesync"),
            "item_scheduled" => __("Clientele scheduled", "framesync"),
            "item_updated" => __("Clientele updated.", "framesync"),
            "parent_item_colon" => __("Parent Clientele:", "framesync"),
        ];

        $args = [
            "label" => __("Clienteles", "framesync"),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "clientele",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => false,
            "rewrite" => ["slug" => "clientele", "with_front" => true],
            "query_var" => true,
            "menu_icon" => "dashicons-buddicons-buddypress-logo",
            'menu_position'=> 30,
            "supports" => ["title", "custom-fields", "revisions", "author", "post-formats"],
            "show_in_graphql" => false,
        ];

        register_post_type("clientele", $args);
    }

    add_action('init', 'framesync_register_cpt_clientele');
}
