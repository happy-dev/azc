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
            if ( !is_front_page() && !is_home() ) { ?>
                <div class="menu-fixed">
                <?php if (has_nav_menu('primary_navigation')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary_navigation',
                        'container' => null,
                        'menu_class' => 'navbar-nav',
                    ));
                }
                ?>
                </div>
                <div class="menu-single-work">
                    <div class="text-uppercase menu-show">Menu</div>
                    <div class="menu-hide hide"><img src="<?php echo get_template_directory_uri(); ?>/img/cancel.png"/></div>
                    <div class="menu-fixed-single hide">            
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary_navigation',
                            'container' => null,
                            'menu_class' => 'navbar-nav',
                        ));
                        ?>
                    </div>
                </div>
        <?php } ?>
