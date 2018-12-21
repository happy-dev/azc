<?php get_header(); ?>

<div class="container-fluid home-content montserrat text-uppercase">
	<div class="enter-button">
		<p class="text-white">AZC</p>
	</div>
	<div class="azc-home hide">
		<a class="text-white" href="">AZC</a>
	</div>
	<div class="works-home hide">
		<a class="text-black" href="<?php echo get_permalink( get_page_by_path( 'works' ) ) ?>">works</a>
	</div>
	<div class="news-home hide">
		<a class="text-white custom-background" href="<?php echo get_permalink( get_page_by_path( 'news' ) ) ?>">news</a>
	</div>
	<div class="index-home hide">
		<a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'index' ) ) ?>">index</a>
	</div>
</div>

<?php get_footer(); ?>