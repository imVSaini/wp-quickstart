<?php
/*
 * Plugin Name: Projects
 * Description: Effortlessly display your projects! Utilize Vaeris Fields plugin to showcase projects with custom fields on your WordPress site.
 * Author: Vaibhav Saini
 * Author URI: https://www.linkedin.com/in/vaibhavsaini07/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires PHP: 7.4
 */

if (!function_exists('framesync_register_cpt_project')) {

    function framesync_register_cpt_project() {

        /**
         * Post Type: Project.
         */

        $labels = [
            "name" => __("Projects", "framesync"),
            "singular_name" => __("Project", "framesync"),
            "menu_name" => __("Projects", "framesync"),
            "all_items" => __("All Projects", "framesync"),
            "add_new" => __("Add new", "framesync"),
            "edit_item" => __("Edit Project", "framesync"),
            "new_item" => __("New Project", "framesync"),
            "view_item" => __("View Project", "framesync"),
            "view_items" => __("View Projects", "framesync"),
            "search_items" => __("Search Projects", "framesync"),
            "not_found" => __("No Projects found", "framesync"),
            "not_found_in_trash" => __("No Projects found in trash", "framesync"),
            "parent" => __("Parent Project:", "framesync"),
            "remove_featured_image" => __("Remove featured image for this Project", "framesync"),
            "use_featured_image" => __("Use as featured image for this Project", "framesync"),
            "archives" => __("Project archives", "framesync"),
            "insert_into_item" => __("Insert into Project", "framesync"),
            "uploaded_to_this_item" => __("Upload to this Project", "framesync"),
            "filter_items_list" => __("Filter Projects list", "framesync"),
            "items_list_navigation" => __("Projects list navigation", "framesync"),
            "items_list" => __("Projects list", "framesync"),
            "attributes" => __("Projects attributes", "framesync"),
            "name_admin_bar" => __("Project", "framesync"),
            "item_published" => __("Project published", "framesync"),
            "item_published_privately" => __("Project published privately.", "framesync"),
            "item_reverted_to_draft" => __("Project reverted to draft.", "framesync"),
            "item_scheduled" => __("Project scheduled", "framesync"),
            "item_updated" => __("Project updated.", "framesync"),
            "parent_item_colon" => __("Parent Project:", "framesync"),
        ];

        $args = [
            "label" => __("Projects", "framesync"),
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
            "capability_type" => "project",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => false,
            "rewrite" => ["slug" => "projects", "with_front" => true],
            "query_var" => true,
            "menu_icon" => "dashicons-screenoptions",
            "supports" => ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
            "taxonomies" => ["project-category", "project-location"],
            "show_in_graphql" => false,
        ];

        register_post_type("project", $args);
    }

    function framesync_register_taxes_tag() {

        /**
         * Taxonomy: Tags.
         */

        $labels = [
            "name" => __("Tags", "framesync"),
            "singular_name" => __("Project Tag", "framesync"),
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
            "rewrite" => ['slug' => 'project-tag', 'with_front' => true,],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "project-tag",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];

        register_taxonomy("project-tag", ["project"], $args);
    }

    function framesync_register_taxes_category() {

        /**
         * Taxonomy: Categories.
         */

        $labels = [
            "name" => __("Categories", "framesync"),
            "singular_name" => __("Project Category", "framesync"),
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
            "rewrite" => ['slug' => 'project-category', 'with_front' => true,],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "project-category",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];

        register_taxonomy("project-category", ["project"], $args);
    }

    function framesync_register_taxes_location() {

        /**
         * Taxonomy: Location.
         */

        $labels = [
            "name" => __("Locations", "framesync"),
            "singular_name" => __("Project Location", "framesync"),
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
            "rewrite" => ['slug' => 'project-location', 'with_front' => true,],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "project-location",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => true,
            "sort" => false,
            "show_in_graphql" => false,
        ];

        register_taxonomy("project-location", ["project"], $args);
    }

    add_action('init', 'framesync_register_taxes_category');
    add_action('init', 'framesync_register_taxes_tag');
    add_action('init', 'framesync_register_taxes_location');
    add_action('init', 'framesync_register_cpt_project');

    /**
     * Add duplicate post link after edit for custom post type
     */
    function add_duplicate_post_link_after_edit($actions, $post) {
        if ($post->post_type == 'project') {
            $duplicate_link = wp_nonce_url(admin_url('admin-post.php?action=duplicate_post&post_id=' . $post->ID), 'duplicate-post_' . $post->ID);
            $actions['duplicate'] = '<a href="' . $duplicate_link . '" title="Copy this project" rel="permalink">Copy</a>';
        }
        return $actions;
    }
    add_filter('post_row_actions', 'add_duplicate_post_link_after_edit', 10, 2);
    add_filter('page_row_actions', 'add_duplicate_post_link_after_edit', 10, 2);

    // Handle custom post type duplication
    function duplicate_custom_post_type_post() {
        if (isset($_GET['action']) && $_GET['action'] === 'duplicate_post' && isset($_GET['post_id']) && wp_verify_nonce($_GET['_wpnonce'], 'duplicate-post_' . $_GET['post_id'])) {
            $post_id = $_GET['post_id'];
            $post = get_post($post_id);
            // $uuid = wp_generate_uuid4();

            if (!empty($post)) {
                $new_post = array(
                    'post_title' => $post->post_title . ' — ' . $post_id,
                    'post_content' => $post->post_content,
                    'post_status' => 'draft', // $post->post_status
                    'post_type' => $post->post_type
                );

                $new_post_id = wp_insert_post($new_post);

                if ($new_post_id) {
                    // Get the taxonomy terms for the original post.
                    $taxonomies = get_post_taxonomies($post_id);

                    // Loop through the taxonomies and add the same terms to the new post.
                    foreach ($taxonomies as $taxonomy) {
                        $terms = wp_get_post_terms($post_id, $taxonomy);
                        $term_ids = array();
                    
                        foreach ($terms as $term) {
                            $term_ids[] = $term->term_id;
                        }
                    
                        wp_set_post_terms($new_post_id, $term_ids, $taxonomy);
                    }

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
    add_action('admin_post_duplicate_post', 'duplicate_custom_post_type_post');

    function add_project_columns($columns) {
        /**
         * Add "Category" column to project list.
         * Add "Category" column after "Title" column.
         */
        $new_columns = array();
        foreach ($columns as $key => $value) {
            $new_columns[$key] = $value;
            if ('title' === $key) {
                $new_columns['project-category'] = __('Category', 'framesync');
                $new_columns['project-tag'] = __('Tags', 'framesync');
                $new_columns['project-location'] = __('Locations', 'framesync');
            }
        }
        return $new_columns;
    }

    add_filter('manage_project_posts_columns', 'add_project_columns');

    function display_project_columns($column, $post_id) {
        /**
         * Display columns hierarchy for each project.
         */
        if ('project-category' === $column) {
            $terms = get_the_terms($post_id, 'project-category');
            if (!empty($terms)) {
                $categories = array();
                foreach ($terms as $term) {
                    if ($term->parent) {
                        // Category has a parent, display parent category and immediate child category
                        $parent = get_term($term->parent, 'project-category');
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
        } elseif ('project-location' === $column) {
            $terms = get_the_terms($post_id, 'project-location');
    
            if (!empty($terms)) {
                $locations = array();
                foreach ($terms as $term) {
                    if ($term->parent) {
                        // Category has a parent, display parent category and immediate child category
                        $parent = get_term($term->parent, 'project-location');
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

        } elseif ('project-tag' === $column) {
            $terms = get_the_terms($post_id, 'project-tag');

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

    add_action('manage_project_posts_custom_column', 'display_project_columns', 10, 2);

    function add_project_columns_filter_for_category() {

        /**
         * Add filter dropdown for project columns.
         */

        global $typenow;
        if ('project' === $typenow) {
            $taxonomy = 'project-category';
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

    add_action('restrict_manage_posts', 'add_project_columns_filter_for_category');

    function add_project_columns_filter_for_location() {

    /**
     * Add filter dropdown for project columns location.
     */

        global $typenow;
        if ('project' === $typenow) {
            $taxonomy = 'project-location';
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

    add_action('restrict_manage_posts', 'add_project_columns_filter_for_location');

    function handle_project_columns_filter_for_category($query) {
        /**
         * Handle project columns filter.
         */
        global $pagenow;
        $taxonomy = 'project-category';
        if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'project' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
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

    add_filter('parse_query', 'handle_project_columns_filter_for_category');

    function handle_project_columns_filter_for_location($query) {
        /**
         * Handle project columns filter.
         */
        global $pagenow;
        $taxonomy = 'project-location';
        if ('edit.php' === $pagenow && isset($query->query_vars['post_type']) && 'project' === $query->query_vars['post_type'] && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
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

    add_filter('parse_query', 'handle_project_columns_filter_for_location');
}
