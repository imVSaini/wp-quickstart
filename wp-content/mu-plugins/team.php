<?php
/*
 * Plugin Name: Teams
 * Description: Boost team visibility! Showcase your team members elegantly on your WordPress site with our easy-to-use team plugin.
 * Author: Vaibhav Kumar Saini
 * Author URI: https://vaibhavsaini.in/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires PHP: 7.4
 */

if (!function_exists('framesync_register_cpt_team')) {

    function framesync_register_cpt_team()
    {

        /**
         * Post Type: Teams.
         */

        $labels = [
            "name" => esc_html__("Teams", "framesync"),
            "singular_name" => esc_html__("Team", "framesync"),
            "menu_name" => esc_html__("Teams", "framesync"),
            "all_items" => esc_html__("All Members", "framesync"),
            "add_new" => esc_html__("Add new", "framesync"),
            "add_new_item" => esc_html__("Add new Member", "framesync"),
            "edit_item" => esc_html__("Edit Member", "framesync"),
            "new_item" => esc_html__("New Member", "framesync"),
            "view_item" => esc_html__("View Member", "framesync"),
            "view_items" => esc_html__("View Members", "framesync"),
            "search_items" => esc_html__("Search Members", "framesync"),
            "not_found" => esc_html__("No members found", "framesync"),
            "not_found_in_trash" => esc_html__("No members found in trash", "framesync"),
            "parent" => esc_html__("Parent Member:", "framesync"),
            "featured_image" => esc_html__("Featured image for this Member", "framesync"),
            "set_featured_image" => esc_html__("Set featured image for this Member", "framesync"),
            "remove_featured_image" => esc_html__("Remove featured image for this Member", "framesync"),
            "use_featured_image" => esc_html__("Use as featured image for this Member", "framesync"),
            "archives" => esc_html__("Member archives", "framesync"),
            "insert_into_item" => esc_html__("Insert into Member", "framesync"),
            "uploaded_to_this_item" => esc_html__("Upload to this Member", "framesync"),
            "filter_items_list" => esc_html__("Filter Members list", "framesync"),
            "items_list_navigation" => esc_html__("Members list navigation", "framesync"),
            "items_list" => esc_html__("Members list", "framesync"),
            "attributes" => esc_html__("Members attributes", "framesync"),
            "name_admin_bar" => esc_html__("Member", "framesync"),
            "item_published" => esc_html__("Member published", "framesync"),
            "item_published_privately" => esc_html__("Member published privately.", "framesync"),
            "item_reverted_to_draft" => esc_html__("Member reverted to draft.", "framesync"),
            "item_scheduled" => esc_html__("Member scheduled", "framesync"),
            "item_updated" => esc_html__("Member updated.", "framesync"),
            "parent_item_colon" => esc_html__("Parent Member:", "framesync"),
        ];

        $args = [
            "label" => esc_html__("Teams", "framesync"),
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
            "capability_type" => "team",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => false,
            "rewrite" => ["slug" => "team", "with_front" => true],
            "query_var" => true,
            "menu_icon" => "dashicons-groups",
            "supports" => ["title", "custom-fields", "revisions", "author", "post-formats"],
            "show_in_graphql" => false,
        ];

        register_post_type("team", $args);
    }
} // End of if function_exists( 'framesync_register_cpt_team' ).

function framesync_register_cpt_team_taxes_tag() {

    /**
     * Taxonomy: Tags.
     */

    $labels = [
        "name" => __("Tags", "framesync"),
        "singular_name" => __("Team Tag", "framesync"),
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
        "rewrite" => ['slug' => 'team-tag', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "team-tag",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("team-tag", ["team"], $args);
}

function framesync_register_cpt_team_taxes_category() {

    /**
     * Taxonomy: Categories.
     */

    $labels = [
        "name" => __("Categories", "framesync"),
        "singular_name" => __("Team Category", "framesync"),
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
        "rewrite" => ['slug' => 'team-category', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "team-category",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("team-category", ["team"], $args);
}

function framesync_register_cpt_team_taxes_location() {

    /**
     * Taxonomy: Location.
     */

    $labels = [
        "name" => __("Locations", "framesync"),
        "singular_name" => __("Team Location", "framesync"),
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
        "rewrite" => ['slug' => 'team-location', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "team-location",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => false,
        "show_in_graphql" => false,
    ];

    register_taxonomy("team-location", ["team"], $args);
}

add_action('init', 'framesync_register_cpt_team_taxes_category');
add_action('init', 'framesync_register_cpt_team_taxes_tag');
add_action('init', 'framesync_register_cpt_team_taxes_location');
add_action('init', 'framesync_register_cpt_team');

/**
 * Add duplicate post link after edit for custom post type
 */
function add_team_duplicate_post_link_after_edit($actions, $post) {
    if ($post->post_type == 'team') {
        $duplicate_link = wp_nonce_url(admin_url('admin-post.php?action=duplicate_post&post_id=' . $post->ID), 'duplicate-post_' . $post->ID);
        $actions['duplicate'] = '<a href="' . $duplicate_link . '" title="Copy this team" rel="permalink">Copy</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'add_team_duplicate_post_link_after_edit', 10, 2);
add_filter('page_row_actions', 'add_team_duplicate_post_link_after_edit', 10, 2);

// Handle custom post type duplication
function duplicate_custom_post_type_team_post() {
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

add_action('admin_post_duplicate_post', 'duplicate_custom_post_type_team_post');

function add_team_columns($columns) {
    /**
     * Add "Category" column to team list.
     * Add "Category" column after "Title" column.
     */
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ('title' === $key) {
            $new_columns['team-category'] = __('Category', 'framesync');
            $new_columns['team-tag'] = __('Tags', 'framesync');
            $new_columns['team-location'] = __('Locations', 'framesync');
        }
    }
    return $new_columns;
}

add_filter('manage_team_posts_columns', 'add_team_columns');

function display_team_columns($column, $post_id) {
    /**
     * Display columns hierarchy for each team.
     */
    if ('team-category' === $column) {
        $terms = get_the_terms($post_id, 'team-category');
        if (!empty($terms)) {
            $categories = array();
            foreach ($terms as $term) {
                if ($term->parent) {
                    // Category has a parent, display parent category and immediate child category
                    $parent = get_term($term->parent, 'team-category');
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
    } elseif ('team-location' === $column) {
        $terms = get_the_terms($post_id, 'team-location');

        if (!empty($terms)) {
            $locations = array();
            foreach ($terms as $term) {
                if ($term->parent) {
                    // Category has a parent, display parent category and immediate child category
                    $parent = get_term($term->parent, 'team-location');
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

    } elseif ('team-tag' === $column) {
        $terms = get_the_terms($post_id, 'team-tag');

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

add_action('manage_team_posts_custom_column', 'display_team_columns', 10, 2);

function add_team_columns_filter_for_category() {

    /**
     * Add filter dropdown for team columns.
     */

    global $typenow;
    if ('team' === $typenow) {
        $taxonomy = 'team-category';
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

add_action('restrict_manage_posts', 'add_team_columns_filter_for_category');

function add_team_columns_filter_for_location() {

/**
 * Add filter dropdown for team columns location.
 */

    global $typenow;
    if ('team' === $typenow) {
        $taxonomy = 'team-location';
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

add_action('restrict_manage_posts', 'add_team_columns_filter_for_location');

function handle_team_columns_filter_for_category($query) {
    /**
     * Handle team columns filter.
     */
    global $pagenow;
    $taxonomy = 'team-category';
    if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'team' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
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

add_filter('parse_query', 'handle_team_columns_filter_for_category');

function handle_team_columns_filter_for_location($query) {
    /**
     * Handle team columns filter.
     */
    global $pagenow;
    $taxonomy = 'team-location';
    if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'team' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
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

add_filter('parse_query', 'handle_team_columns_filter_for_location');