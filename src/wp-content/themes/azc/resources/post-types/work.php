<?php

/**
 * Declare the 'author' post type
 */
add_action('init', function () {
    register_taxonomy('workfilter', 'work', [
        'label' => __('Filters', 'newco'),
        'hierarchical' => false,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ]);
    register_post_type('work', [
        'label' => __('Works'),
        'description' => __('Works'),
        'labels' => [
            'name' => _x('Works', 'Post Type General Name'),
            'singular_name' => _x('Work', 'Post Type Singular Name'),
            'menu_name' => __('Works'),
            'all_items' => __('All works'),
            'view_item' => __('See works'),
            'add_new_item' => __('Add a new work'),
            'add_new' => __('Add'),
            'edit_item' => __('Edit the work'),
            'update_item' => __('Update the work'),
            'search_items' => __('Search a new work'),
            'not_found' => __('Not found'),
            'not_found_in_trash' => __('Not found in trash'),
        ],
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields',],
        'rewrite' => array( 'slug' => 'work' ),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
    ]);
});
