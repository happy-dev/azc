<?php
/* Template Name: Works */
get_header();

if (has_nav_menu('primary_navigation'))
{
    wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'container'       => null,
        'menu_class' => 'navbar-nav navbar-home',
    ]);
}

get_footer(); ?>


