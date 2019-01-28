<?php

/**
 * Declare the 'Work' post type
 */
add_action('init', function () {
    register_taxonomy('workfilter', 'postwork', array(
        'label' => __('Categories', 'work'),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));

    register_taxonomy('workfiltercondition', 'postwork', array(
        'label' => __('Conditions', 'work'),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));

    register_post_type('postwork', array(
        'label' => __('Posts works'),
        'description' => __('Posts works'),
        'labels' => array(
            'name' => _x('Posts works', 'Post Type General Name'),
            'singular_name' => _x('Post works', 'Post Type Singular Name'),
            'menu_name' => __('Post Works'),
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
