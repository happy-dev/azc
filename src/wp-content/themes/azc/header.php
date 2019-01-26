<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title(); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php wp_head(); ?>
</head>
    <body id="<?php echo $GLOBALS['templateName']; ?>">
        <?php

        if ( !is_front_page() && !is_home() ) {
            if (has_nav_menu('primary_navigation'))?>
            <div class="menu-fixed">
            <?php
            {
                wp_nav_menu(array(
                    'theme_location' => 'primary_navigation',
                    'container' => null,
                    'menu_class' => 'navbar-nav',
                ));
            }
            ?>
            </div>
            <div class="menu-mobile">
                <div class="text-uppercase">Menu</div>
            
            <?php
            {
                wp_nav_menu(array(
                    'theme_location' => 'primary_navigation',
                    'container' => null,
                    'menu_class' => 'navbar-nav',
                ));
            }
            ?>
            </div>
        <?php
        
        }
        ?>
