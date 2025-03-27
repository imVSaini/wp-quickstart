<?php
/*
 * Plugin Name: Testimonials
 * Description: Effortlessly showcase glowing testimonials on your WordPress site with our user-friendly testimonial plugin.
 * Author: Vaibhav Kumar Saini
 * Author URI: https://vaibhavsaini.in/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires PHP: 7.4
 */

function framesync_register_cpt_testimonial()
{

    /**
     * Post Type: Testimonial.
     */

    $labels = [
        "name" => __("Testimonials", "framesync"),
        "singular_name" => __("Testimonial", "framesync"),
        "menu_name" => __("Testimonials", "framesync"),
        "all_items" => __("All Testimonials", "framesync"),
        "add_new" => __("Add new", "framesync"),
        "edit_item" => __("Edit Testimonial", "framesync"),
        "new_item" => __("New Testimonial", "framesync"),
        "view_item" => __("View Testimonial", "framesync"),
        "view_items" => __("View Testimonials", "framesync"),
        "search_items" => __("Search Testimonials", "framesync"),
        "not_found" => __("No testimonials found", "framesync"),
        "not_found_in_trash" => __("No testimonials found in trash", "framesync"),
        "parent" => __("Parent Testimonial:", "framesync"),
        "remove_featured_image" => __("Remove featured image for this testimonial", "framesync"),
        "use_featured_image" => __("Use as featured image for this testimonial", "framesync"),
        "archives" => __("Testimonial archives", "framesync"),
        "insert_into_item" => __("Insert into testimonial", "framesync"),
        "uploaded_to_this_item" => __("Upload to this testimonial", "framesync"),
        "filter_items_list" => __("Filter testimonials list", "framesync"),
        "items_list_navigation" => __("Testimonials list navigation", "framesync"),
        "items_list" => __("Testimonials list", "framesync"),
        "attributes" => __("Testimonials attributes", "framesync"),
        "name_admin_bar" => __("Testimonial", "framesync"),
        "item_published" => __("Testimonial published", "framesync"),
        "item_published_privately" => __("Testimonial published privately.", "framesync"),
        "item_reverted_to_draft" => __("Testimonial reverted to draft.", "framesync"),
        "item_scheduled" => __("Testimonial scheduled", "framesync"),
        "item_updated" => __("Testimonial updated.", "framesync"),
        "parent_item_colon" => __("Parent Testimonial:", "framesync"),
    ];

    $args = [
        "label" => __("Testimonials", "framesync"),
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
        "capability_type" => "testimonial",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "testimonial", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-twitch",
        "supports" => ["title", "custom-fields", "revisions", "author", "post-formats"],
        "show_in_graphql" => false,
    ];

    register_post_type("testimonial", $args);
}

function framesync_register_cpt_testimonial_taxes_tag() {

    /**
     * Taxonomy: Tags.
     */

    $labels = [
        "name" => __("Tags", "framesync"),
        "singular_name" => __("Testimonial Tag", "framesync"),
        "all_items" => __("All Tags", "framesync"),
        "edit_item" => __("Edit Tag", "framesync"),
        "view_item" => __("View Tag", "framesync"),
        "update_item" => __("Update Tag", "framesync"),
        "add_new_item" => __("Add New Tag", "framesync"),
        "new_item_name" => __("New Tag Name", "framesync"),
        "parent_item" => __("Parent Tag", "framesync"),
        "search_items" => __("Search Tags", "framesync"),
        "not_found" => __("No tags found.", "framesync"),
        "back_to_items" => __("Back to Tags", "framesync"),
    ];


    $args = [
        "label" => __("Tags", "framesync"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'testimonial-tag', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "testimonial-tag",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("testimonial-tag", ["testimonial"], $args);
}

function framesync_register_cpt_testimonial_taxes_category() {

    /**
     * Taxonomy: Categories.
     */

    $labels = [
        "name" => __("Categories", "framesync"),
        "singular_name" => __("Testimonial Category", "framesync"),
        "not_found" => __("No category found.", "framesync"),
    ];


    $args = [
        "label" => __("Categories", "framesync"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'testimonial-category', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "testimonial-category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("testimonial-category", ["testimonial"], $args);
}

function framesync_register_cpt_testimonial_taxes_location() {

    /**
     * Taxonomy: Location.
     */

    $labels = [
        "name" => __("Locations", "framesync"),
        "singular_name" => __("Testimonial Location", "framesync"),
        "all_items" => __("All Locations", "framesync"),
        "edit_item" => __("Edit Location", "framesync"),
        "view_item" => __("View Location", "framesync"),
        "update_item" => __("Update Location", "framesync"),
        "add_new_item" => __("Add New Location", "framesync"),
        "new_item_name" => __("New Location Name", "framesync"),
        "parent_item" => __("Parent Location", "framesync"),
        "search_items" => __("Search Locations", "framesync"),
        "not_found" => __("No location found.", "framesync"),
        "back_to_items" => __("Back to Locations", "framesync"),
    ];


    $args = [
        "label" => __("Locations", "framesync"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'testimonial-location', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "testimonial-location",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("testimonial-location", ["testimonial"], $args);
}

add_action('init', 'framesync_register_cpt_testimonial_taxes_category');
add_action('init', 'framesync_register_cpt_testimonial_taxes_tag');
add_action('init', 'framesync_register_cpt_testimonial_taxes_location');
add_action('init', 'framesync_register_cpt_testimonial');

/**
 * Add duplicate post link after edit for custom post type
 */
function add_testimonial_duplicate_post_link_after_edit($actions, $post) {
    if ($post->post_type == 'testimonial') {
        $duplicate_link = wp_nonce_url(admin_url('admin-post.php?action=duplicate_post&post_id=' . $post->ID), 'duplicate-post_' . $post->ID);
        $actions['duplicate'] = '<a href="' . $duplicate_link . '" title="Copy this Testimonial" rel="permalink">Copy</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'add_testimonial_duplicate_post_link_after_edit', 10, 2);
add_filter('page_row_actions', 'add_testimonial_duplicate_post_link_after_edit', 10, 2);

// Handle custom post type duplication
function duplicate_custom_post_type_testimonial_post() {
    if (isset($_GET['action']) && $_GET['action'] === 'duplicate_post' && isset($_GET['post_id']) && wp_verify_nonce($_GET['_wpnonce'], 'duplicate-post_' . $_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $post = get_post($post_id);
        $uuid = wp_generate_uuid4();
        
        if (!empty($post)) {
            $new_post = array(
                'post_title' => $post->post_title . ' Copy - ' . $post->ID + 1,
                'post_content' => $post->post_content,
                'post_status' => 'draft', // $post->post_status
                'post_type' => $post->post_type
            );
            
            $new_post_id = wp_insert_post($new_post);
            
            if ($new_post_id) {
                // Duplicate post meta
                $post_meta = get_post_meta($post_id);
                foreach ($post_meta as $meta_key => $meta_values) {
                    foreach ($meta_values as $meta_value) {
                        add_post_meta($new_post_id, $meta_key, $meta_value);
                    }
                }
                
                // Optionally, you can redirect to the post listing page
                wp_redirect(admin_url('edit.php?post_type=' . $post->post_type));
                exit;
            }
        }
    }
}

add_action('admin_post_duplicate_post', 'duplicate_custom_post_type_testimonial_post');

function add_testimonial_columns($columns) {
    /**
     * Add "Category" column to testimonial list.
     * Add "Category" column after "Title" column.
     */
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ('title' === $key) {
            $new_columns['testimonial-category'] = __('Category', 'framesync');
            $new_columns['testimonial-tag'] = __('Tags', 'framesync');
            $new_columns['testimonial-location'] = __('Locations', 'framesync');
        }
    }
    return $new_columns;
}

add_filter('manage_testimonial_posts_columns', 'add_testimonial_columns');

function display_testimonial_columns($column, $post_id) {
    /**
     * Display columns hierarchy for each testimonial.
     */
    if ('testimonial-category' === $column) {
        $terms = get_the_terms($post_id, 'testimonial-category');
        if (!empty($terms)) {
            $categories = array();
            foreach ($terms as $term) {
                if ($term->parent) {
                    // Category has a parent, display parent category and immediate child category
                    $parent = get_term($term->parent, 'testimonial-category');
                    if (!is_wp_error($parent) && !empty($parent)) {
                        $categories[] = esc_html($parent->name) . ' » ' . esc_html($term->name);
                    } else {
                        $categories[] = esc_html($term->name);
                    }
                } else {
                    // Category has no parent, display category name only
                    $categories[] = esc_html($term->name);
                }
            }
            echo implode('<br>', $categories);
        } else {
            echo '-';
        }
    } elseif ('testimonial-location' === $column) {
        $terms = get_the_terms($post_id, 'testimonial-location');

        if (!empty($terms)) {
            $locations = array();
            foreach ($terms as $term) {
                if ($term->parent) {
                    // Category has a parent, display parent category and immediate child category
                    $parent = get_term($term->parent, 'testimonial-location');
                    if (!is_wp_error($parent) && !empty($parent)) {
                        $locations[] = esc_html($parent->name) . ' » ' . esc_html($term->name);
                    } else {
                        $locations[] = esc_html($term->name);
                    }
                } else {
                    // Category has no parent, display category name only
                    $locations[] = esc_html($term->name);
                }
            }
            echo implode('<br>', $locations);
        } else {
            echo '-';
        }

    } elseif ('testimonial-tag' === $column) {
        $terms = get_the_terms($post_id, 'testimonial-tag');

        if (!empty($terms)) {
            $tags = array();
            foreach ($terms as $term) {
                $tags[] = esc_html($term->name);
            }
            echo implode(',&nbsp;', $tags);
        } else {
            echo '-';
        }
    }
}

add_action('manage_testimonial_posts_custom_column', 'display_testimonial_columns', 10, 2);

function add_testimonial_columns_filter_for_category() {

    /**
     * Add filter dropdown for testimonial columns.
     */

    global $typenow;
    if ('testimonial' === $typenow) {
        $taxonomy = 'testimonial-category';
        $current_taxonomy = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $terms = get_terms($taxonomy, array('hide_empty' => false));
        if (!empty($terms)) {
            echo '<select name="' . esc_attr($taxonomy) . '" id="' . esc_attr($taxonomy) . '">';
            echo '<option value="">' . __('All Categories', 'framesync') . '</option>';
            foreach ($terms as $term) {
                echo '<option value="' . esc_attr($term->slug) . '" ' . selected($current_taxonomy, $term->slug, false) . '>' . esc_html($term->name) . '</option>';
            }
            echo '</select>';
        }
    }
}

add_action('restrict_manage_posts', 'add_testimonial_columns_filter_for_category');

function add_testimonial_columns_filter_for_location() {

/**
 * Add filter dropdown for testimonial columns location.
 */

    global $typenow;
    if ('testimonial' === $typenow) {
        $taxonomy = 'testimonial-location';
        $current_taxonomy = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $terms = get_terms($taxonomy, array('hide_empty' => false));
        if (!empty($terms)) {
            echo '<select name="' . esc_attr($taxonomy) . '" id="' . esc_attr($taxonomy) . '">';
            echo '<option value="">' . __('All Locations', 'arsaengineer') . '</option>';
            foreach ($terms as $term) {
                echo '<option value="' . esc_attr($term->slug) . '" ' . selected($current_taxonomy, $term->slug, false) . '>' . esc_html($term->name) . '</option>';
            }
            echo '</select>';
        }
    }
}

add_action('restrict_manage_posts', 'add_testimonial_columns_filter_for_location');

function handle_testimonial_columns_filter_for_category($query) {
    /**
     * Handle testimonial columns filter.
     */
    global $pagenow;
    $taxonomy = 'testimonial-category';
    if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'testimonial' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
        $query->query_vars['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $_GET[$taxonomy],
            ),
        );
    }
    return $query;
}

add_filter('parse_query', 'handle_testimonial_columns_filter_for_category');

function handle_testimonial_columns_filter_for_location($query) {
    /**
     * Handle testimonial columns filter.
     */
    global $pagenow;
    $taxonomy = 'testimonial-location';
    if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'testimonial' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
        $query->query_vars['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $_GET[$taxonomy],
            ),
        );
    }
    return $query;
}

add_filter('parse_query', 'handle_testimonial_columns_filter_for_location');