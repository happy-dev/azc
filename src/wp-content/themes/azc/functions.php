<?php

function azc_register_css() {
    wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/resources/assets/styles/bootstrap.min.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'azc_register_css' );

function azc_register_js() {
    wp_enqueue_script('jquery.bootstrap.min', get_template_directory_uri() . '/resources/assets/scripts/bootstrap.min.js', 'jquery');
    wp_enqueue_script( 'script', get_template_directory_uri() . '/resources/assets/scripts/script.js', array('jquery'), null, true);
    wp_enqueue_script('owl.js', get_template_directory_uri() . '/resources/assets/scripts/owl.carousel.js');
    wp_enqueue_script('owl-navigation.js', get_template_directory_uri() . '/resources/assets/scripts/owl.navigation.js');
}
add_action( 'init', 'azc_register_js' );

function register_primany_menu() {
    register_nav_menu('primary_navigation',__( 'Primary navigation' ));
}
add_action( 'init', 'register_primany_menu' );

add_theme_support( 'post-thumbnails', array( 'postwork', 'postnews', 'postindex'));

/*
 * Require custom post types
 */

require 'resources/post-types/post-work.php';
require 'resources/post-types/post-news.php';
require 'resources/post-types/post-index.php';

?>