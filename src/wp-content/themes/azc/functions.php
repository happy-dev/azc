<?php
function enqueue_styles() {

    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');

add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
    'default-color' => 'ffffff',
)));

?>