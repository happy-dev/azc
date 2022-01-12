<?php

/* Template Name: Home */
$GLOBALS['templateName'] = "home";

get_header();

$bckg = get_field('home_img')['url'] ?? '';

?>

<div class="container-fluid home-content keepcalm text-uppercase" style="background: #fff url(<?= $bckg ?>) no-repeat;background-size: cover;">
  <div class="azc-home">
    <a class="text-white" href="<?= site_url() ?>/projets">AZC</a>
  </div>

<!-- new widget area -->
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <div id="header-widget-area" class="nwa-header-widget widget-area" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>
    </div>
<?php endif; ?>
<!-- end new widget area -->

<?php get_footer(); ?>
