<?php

function azc_register_css() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/resources/assets/styles/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
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

$args = array(
    'default-color' => '000000',
);
add_theme_support( 'custom-background', $args );


/*
 * Require custom post types
 */
require 'resources/post-types/post-index.php';

?>