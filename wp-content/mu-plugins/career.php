<?php
/*
 * Plugin Name: Careers
 * Description: Easily manage your job listings! Use the Vaeris Careers plugin to add new openings directly to your WordPress site and attract top talent.
 * Author: Vaibhav Saini
 * Author URI: https://www.linkedin.com/in/vaibhavsaini07/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires PHP: 7.4
 */

function framesync_register_cpt_career()
{

    /**
     * Post Type: Career.
     */

    $labels = [
        "name" => __("Careers", "framesync"),
        "singular_name" => __("Career", "framesync"),
        "menu_name" => __("Careers", "framesync"),
        "all_items" => __("All Jobs", "framesync"),
        "add_new" => __("Add new", "framesync"),
        "edit_item" => __("Edit Job", "framesync"),
        "new_item" => __("New Job", "framesync"),
        "view_item" => __("View Job", "framesync"),
        "view_items" => __("View Jobs", "framesync"),
        "search_items" => __("Search Jobs", "framesync"),
        "not_found" => __("No job found", "framesync"),
        "not_found_in_trash" => __("No jobs found in trash", "framesync"),
        "parent" => __("Parent Career:", "framesync"),
        "remove_featured_image" => __("Remove featured image for this job", "framesync"),
        "use_featured_image" => __("Use as featured image for this job", "framesync"),
        "archives" => __("Career archives", "framesync"),
        "insert_into_item" => __("Insert into job", "framesync"),
        "uploaded_to_this_item" => __("Upload to this job", "framesync"),
        "filter_items_list" => __("Filter jobs list", "framesync"),
        "items_list_navigation" => __("Jobs list navigation", "framesync"),
        "items_list" => __("Jobs list", "framesync"),
        "attributes" => __("Jobs attributes", "framesync"),
        "name_admin_bar" => __("Career", "framesync"),
        "item_published" => __("Job published", "framesync"),
        "item_published_privately" => __("Job published privately.", "framesync"),
        "item_reverted_to_draft" => __("Job reverted to draft.", "framesync"),
        "item_scheduled" => __("Job scheduled", "framesync"),
        "item_updated" => __("Job updated.", "framesync"),
        "parent_item_colon" => __("Parent Career:", "framesync"),
    ];

    $args = [
        "label" => __("Careers", "framesync"),
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
        "capability_type" => "career",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "career", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-superhero",
        "supports" =>  ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
        "show_in_graphql" => false,
    ];

    register_post_type("career", $args);
}

function framesync_register_cpt_career_taxes_tag() {

    /**
     * Taxonomy: Tags.
     */

    $labels = [
        "name" => __("Tags", "framesync"),
        "singular_name" => __("Career Tag", "framesync"),
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
        "rewrite" => ['slug' => 'career-tag', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "career-tag",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("career-tag", ["career"], $args);
}

function framesync_register_cpt_career_taxes_category() {

    /**
     * Taxonomy: Job Types
     */

    $labels = [
        "name" => esc_html__("Job Types", "framesync"),
        "singular_name" => esc_html__("Job Type", "framesync"),
        "menu_name" => esc_html__("Job Types", "framesync"),
        "all_items" => esc_html__("All Job Types", "framesync"),
        "edit_item" => esc_html__("Edit Job Type", "framesync"),
        "view_item" => esc_html__("View Job Type", "framesync"),
        "update_item" => esc_html__("Update Job Type name", "framesync"),
        "add_new_item" => esc_html__("Add new Job Type", "framesync"),
        "new_item_name" => esc_html__("New Job Type name", "framesync"),
        "parent_item" => esc_html__("Parent Job Type", "framesync"),
        "parent_item_colon" => esc_html__("Parent Job Type:", "framesync"),
        "search_items" => esc_html__("Search Job Types", "framesync"),
        "popular_items" => esc_html__("Popular Job Types", "framesync"),
        "separate_items_with_commas" => esc_html__("Separate Job Types with commas", "framesync"),
        "add_or_remove_items" => esc_html__("Add or remove Job Types", "framesync"),
        "choose_from_most_used" => esc_html__("Choose from the most used Job Types", "framesync"),
        "not_found" => esc_html__("No Job Types found", "framesync"),
        "no_terms" => esc_html__("No Job Types", "framesync"),
        "items_list_navigation" => esc_html__("Job Types list navigation", "framesync"),
        "items_list" => esc_html__("Job Types list", "framesync"),
        "back_to_items" => esc_html__("Back to Job Types", "framesync"),
        "name_field_description" => esc_html__("The name is how it appears on your site.", "framesync"),
        "parent_field_description" => esc_html__("Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "framesync"),
        "slug_field_description" => esc_html__("The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "framesync"),
        "desc_field_description" => esc_html__("The description is not prominent by default; however, some themes may show it.", "framesync"),
    ];


    $args = [
        "label" => __("Job Types", "framesync"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'career-category', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "career-category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("career-category", ["career"], $args);
}

function framesync_register_cpt_career_taxes_location() {

    /**
     * Taxonomy: Location.
     */

    $labels = [
        "name" => __("Locations", "framesync"),
        "singular_name" => __("Career Location", "framesync"),
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
        "rewrite" => ['slug' => 'career-location', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "career-location",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("career-location", ["career"], $args);
}

add_action('init', 'framesync_register_cpt_career_taxes_category');
add_action('init', 'framesync_register_cpt_career_taxes_tag');
add_action('init', 'framesync_register_cpt_career_taxes_location');
add_action('init', 'framesync_register_cpt_career');

/**
 * Add duplicate post link after edit for custom post type
 */
function add_career_duplicate_post_link_after_edit($actions, $post) {
    if ($post->post_type == 'career') {
        $duplicate_link = wp_nonce_url(admin_url('admin-post.php?action=duplicate_post&post_id=' . $post->ID), 'duplicate-post_' . $post->ID);
        $actions['duplicate'] = '<a href="' . $duplicate_link . '" title="Copy this Job" rel="permalink">Copy</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'add_career_duplicate_post_link_after_edit', 10, 2);
add_filter('page_row_actions', 'add_career_duplicate_post_link_after_edit', 10, 2);

// Handle custom post type duplication
function duplicate_custom_post_type_career_post() {
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

add_action('admin_post_duplicate_post', 'duplicate_custom_post_type_career_post');

function add_career_columns($columns) {
    /**
     * Add "Job Types" column to career list.
     * Add "Job Types" column after "Title" column.
     */
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ('title' === $key) {
            $new_columns['career-category'] = __('Job Types', 'framesync');
            $new_columns['career-tag'] = __('Tags', 'framesync');
            $new_columns['career-location'] = __('Locations', 'framesync');
        }
    }
    return $new_columns;
}

add_filter('manage_career_posts_columns', 'add_career_columns');

function display_career_columns($column, $post_id) {
    /**
     * Display columns hierarchy for each career.
     */
    if ('career-category' === $column) {
        $terms = get_the_terms($post_id, 'career-category');
        if (!empty($terms)) {
            $categories = array();
            foreach ($terms as $term) {
                if ($term->parent) {
                    // Category has a parent, display parent category and immediate child category
                    $parent = get_term($term->parent, 'career-category');
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
    } elseif ('career-location' === $column) {
        $terms = get_the_terms($post_id, 'career-location');

        if (!empty($terms)) {
            $locations = array();
            foreach ($terms as $term) {
                if ($term->parent) {
                    // Category has a parent, display parent category and immediate child category
                    $parent = get_term($term->parent, 'career-location');
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

    } elseif ('career-tag' === $column) {
        $terms = get_the_terms($post_id, 'career-tag');

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

add_action('manage_career_posts_custom_column', 'display_career_columns', 10, 2);

function add_career_columns_filter_for_category() {

    /**
     * Add filter dropdown for career columns.
     */

    global $typenow;
    if ('career' === $typenow) {
        $taxonomy = 'career-category';
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

add_action('restrict_manage_posts', 'add_career_columns_filter_for_category');

function add_career_columns_filter_for_location() {

/**
 * Add filter dropdown for career columns location.
 */

    global $typenow;
    if ('career' === $typenow) {
        $taxonomy = 'career-location';
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

add_action('restrict_manage_posts', 'add_career_columns_filter_for_location');

function handle_career_columns_filter_for_category($query) {
    /**
     * Handle career columns filter.
     */
    global $pagenow;
    $taxonomy = 'career-category';
    if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'career' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
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

add_filter('parse_query', 'handle_career_columns_filter_for_category');

function handle_career_columns_filter_for_location($query) {
    /**
     * Handle career columns filter.
     */
    global $pagenow;
    $taxonomy = 'career-location';
    if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'career' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
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

add_filter('parse_query', 'handle_career_columns_filter_for_location');