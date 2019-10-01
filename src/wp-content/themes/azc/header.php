<?php

$nav_data = [
  'theme_location' => 'primary_navigation',
  'container' => null,
  'menu_class' => 'navbar-nav',
];
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="prefetch" href="<?= get_template_directory_uri() ?>/img/pinterest-white.png">
  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
</head>

<body id="<?= $GLOBALS['templateName']; ?>">
  <?php if (!is_front_page() && !is_home()): ?>
    <div class="menu-fixed">
      <?php if (has_nav_menu('primary_navigation')): ?>
        <?php wp_nav_menu($nav_data); ?>
      <?php endif; ?>
    </div>

    <div class="menu-single-work">
      <div class="text-uppercase menu-show">Menu</div>
      <div class="menu-hide hide"><img src="<?= get_template_directory_uri(); ?>/img/cancel.png" /></div>
      <div class="menu-fixed-single hide">
        <?php wp_nav_menu($nav_data); ?>
      </div>
    </div>
  <?php endif; ?>