<?php

/* Template Name: Home */
$GLOBALS['templateName'] = "home";
get_header();?>

<div class="container-fluid home-content keepcalm text-uppercase home-desktop" style="background: #fff url(<?php $bckg = get_field('home_img'); echo $bckg['url']; ?>) no-repeat;background-size: cover;">
	<div class="enter-button azc-home">
		<a class="text-white">AZC</a>
	</div>
	<div class="works-home hide">
		<a class="text-black" href="works">works</a>
	</div>
	<div class="news-home hide" style="background-color:<?php the_field('news_color'); ?>">
		<a class="text-white" href="news">news</a>
	</div>
	<div class="index-home hide" style="background-color:<?php the_field('index_color'); ?>">
		<a class="text-white" href="index">index</a>
	</div>
</div>
<div class="home-content-mobile">
	<img src="<?php echo get_template_directory_uri(); ?>/img/main.png" class="hand"/>
	<div id="carouselhome" class="carousel slide" data-ride="carousel" data-interval="false">
		<div class="carousel-inner">
			<div class="carousel-item active" style="background: #fff url(<?php $bckg = get_field('home_img'); echo $bckg['url']; ?>) no-repeat;background-size: cover;">
				<a class="text-white"href="azc">AZC</a>
			</div>
			<div class="carousel-item works-home-mobile">
				<a class="text-black" href="works">works</a>
			</div>
			<div class="carousel-item news-home-mobile" style="background-color:<?php the_field('news_color'); ?>">
				<a class="text-white" href="news">news</a>
			</div>
			<div class="carousel-item index-home-mobile" style="background-color:<?php the_field('index_color'); ?>">
				<a class="text-white" href="index">index</a>
			</div>

		</div>
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