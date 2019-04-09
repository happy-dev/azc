<?php

/* Template Name: Home */
$GLOBALS['templateName'] = "home";
get_header();?>

<div class="container-fluid home-content keepcalm text-uppercase" style="background: #fff url(<?php $bckg = get_field('home_img'); echo $bckg['url']; ?>) no-repeat;background-size: cover;">
	<div class="enter-button azc-home">
		<a class="text-white">AZC</a>
	</div>
	<div class="works-home hide">
		<a class="text-black" href="works">works</a>
	</div>
	<div class="news-home hide" style="background-color:<?php the_field('news_color'); ?>">
		<a class="text-white" href="news">news</a>
	</div>
	<div class="index-home hide">
		<a class="text-white" href="index">index</a>
	</div>
</div>

    <!-- ajout de ma nouvelle widget area -->
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <div id="header-widget-area" class="nwa-header-widget widget-area" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>
    </div>
<?php endif; ?>
    <!-- fin nouvelle widget area -->

<?php get_footer(); ?>