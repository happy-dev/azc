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

/*  PHP function to display posts pagination in Index Page */

function pagination($pages = '', $range = 2) {
    $morepages = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }
    if(1 != $pages) {
        echo '<div class="pagination">';

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $morepages )) {
                echo ($paged == $i)? '<a href="'.get_pagenum_link($i).'" class="page-numbers">'.$i.'</a>':'<a href="'.get_pagenum_link($i).'" class="page-numbers">'.$i.'</a>';
            }
        }

        echo '</div>';
    }
}

/*  Widget */

/**
 * Register our sidebars and widgetized areas.
 *
 */
function alphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'alphabet_widgets_init' );

/*
 * Require custom post types
 */

require 'resources/post-types/post-work.php';
require 'resources/post-types/post-news.php';
require 'resources/post-types/post-index.php';

?>