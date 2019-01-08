<?php

/**
 * Declare the 'News' post type
 */
add_action('init', function () {
    register_post_type('postnews', [
        'label' => __('Posts news'),
        'description' => __('Posts news'),
        'labels' => [
            'name' => _x('Posts news', 'Post Type General Name'),
            'singular_name' => _x('Post news', 'Post Type Singular Name'),
            'menu_name' => __('News'),
            'all_items' => __('All posts'),
            'view_item' => __('See posts'),
            'add_new_item' => __('Add a new post'),
            'add_new' => __('Add'),
            'edit_item' => __('Edit the post'),
            'update_item' => __('Update the post'),
            'search_items' => __('Search a new post'),
            'not_found' => __('Not found'),
            'not_found_in_trash' => __('Not found in trash'),
        ],
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields',],
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
    ]);
});
