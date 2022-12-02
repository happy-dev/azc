<?php

/**
 * Declare the 'AZC sections' post type
 */
add_action('init', function () {
    register_post_type('azcsection', array(
        'label' => __('AZC sections'),
        'description' => __('AZC sections'),
        'labels' => array(
            'name' => _x('AZC sections', 'Post Type General Name'),
            'singular_name' => _x('AZC sections', 'Post Type Singular Name'),
            'menu_name' => __('AZC'),
            'all_items' => __('All posts'),
            'view_item' => __('See posts'),
            'add_new_item' => __('Add a new post'),
            'add_new' => __('Add'),
            'edit_item' => __('Edit the post'),
            'update_item' => __('Update the post'),
            'search_items' => __('Search a new post'),
            'not_found' => __('Not found'),
            'not_found_in_trash' => __('Not found in trash'),
    ),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields',),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
    ));
});
