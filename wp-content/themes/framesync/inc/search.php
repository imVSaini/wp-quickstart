<?php
/**
 * Search API Route
 *
 * @package framesync
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('rest_api_init', 'framesync_search');

function framesync_search() {
    register_rest_route('framesyncbot/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'framesync_search_results'
    ));
}

function framesync_search_results($param) {
    $search_results = array();

    $args = array(
        'post_type' => array('post', 'page'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        's' => sanitize_text_field($param['q']),
        'orderby' => 'title',
        'order' => 'ASC'
    );

    $search_query = new WP_Query( $args );

    while ($search_query->have_posts()) {
        $search_query->the_post();

        array_push($search_results, array(
            'type' => get_post_type(),
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
    }

    wp_reset_postdata();
    return $search_results;
}