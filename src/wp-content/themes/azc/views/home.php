<?php

/* Template Name: Home */
$GLOBALS['templateName'] = "home";

get_header();

$bckg = get_field('home_img')['url'] ?? '';
$news_color = get_field('news_color');
$index_color = get_field('index_color');

?>

<div class="container-fluid home-content keepcalm text-uppercase home-desktop" style="background: #fff url(<?= $bckg ?>) no-repeat;background-size: cover;">
  <div class="enter-button azc-home">
    <a class="text-white">AZC</a>
  </div>

  <div class="works-home hide">
    <a class="text-black" href="works">works</a>
  </div>

  <div class="news-home hide" style="background-color:<?= $news_color ?>">
    <a class="text-white" href="news">news</a>
  </div>

  <div class="index-home hide" style="background-color:<?= $index_color ?>">
    <a class="text-white" href="index">index</a>
  </div>
</div>

<div class="home-content-mobile">
  <img src="<?= get_template_directory_uri(); ?>/img/main.png" class="hand"/>
  <div id="carouselhome" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active" style="background: #fff url(<?= $bckg ?>) no-repeat;background-size: cover;">
        <a class="text-white"href="azc">AZC</a>
      </div>

      <div class="carousel-item works-home-mobile">
        <a class="text-black" href="works">works</a>
      </div>

      <div class="carousel-item news-home-mobile" style="background-color:<?= $news_color ?>">
        <a class="text-white" href="news">news</a>
      </div>

      <div class="carousel-item index-home-mobile" style="background-color:<?= $index_color ?>">
        <a class="text-white" href="index">index</a>
      </div>
    </div>
  </div>

</div>

<!-- new widget area -->
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <div id="header-widget-area" class="nwa-header-widget widget-area" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>
    </div>
<?php endif; ?>
<!-- end new widget area -->

<?php get_footer(); ?>