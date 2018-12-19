<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
    <body>
    <?php
        if (has_nav_menu('primary_navigation'))
        {
            wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'container'       => null,
            'menu_class' => 'navbar-nav',
            ]);
        }
    ?>