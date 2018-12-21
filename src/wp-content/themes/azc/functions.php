<?php

function azc_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/resources/assets/styles/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );	
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'azc_register_css' );

function azc_register_js() {
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/resources/assets/scripts/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
    wp_enqueue_script( 'script', get_template_directory_uri() . '/resources/assets/scripts/script.js', array('jquery'), null, true);
}
add_action( 'init', 'azc_register_js' );

function register_primany_menu() {
    register_nav_menu('primary_navigation',__( 'Primary navigation' ));
}
add_action( 'init', 'register_primany_menu' );



function my_callback_function() {
    // $background is the saved custom image, or the default image.

    // $color is the saved custom color.
    // A default has to be specified in style.css. It will not be printed here.
    $color = get_background_color();

    if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
        $color = false;
    }

    $style = $color ? "background-color: #$color;" : '';

    ?>
    <style type="text/css" id="custom-background-css">
        body.custom-background { <?php echo trim( $style ); ?> }
    </style>
    <?php
}

$args = array(
    'default-color' => 'e9e0d1',
    'wp-head-callback' => 'my_callback_function',
);

$args = apply_filters( 'shape_custom_background_args', $args );

if ( function_exists( 'wp_get_theme' ) ) {
    add_theme_support( 'custom-background', $args );
} else {
    define( 'BACKGROUND_COLOR', $args['default-color'] );
    add_custom_background();
}


/*
 * Require custom post types
 */
require 'resources/post-types/post-index.php';

?>