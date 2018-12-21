<?php get_header(); ?>

<div class="container-fluid home-content keepcalm text-uppercase">
	<div class="enter-button">
		<p class="text-white">AZC</p>
	</div>
	<div class="azc-home hide">
		<a class="text-white" href="azc">AZC</a>
	</div>
	<div class="works-home hide">
<<<<<<< HEAD
		<a class="text-black" href="works">works</a>
	</div>
	<div class="news-home hide">
		<a class="text-white" href="news">news</a>
	</div>
	<div class="index-home hide">
		<a class="text-white" href="index">index</a>
=======
		<a class="text-black" href="<?php echo get_permalink( get_page_by_path( 'works' ) ) ?>">works</a>
	</div>
	<div class="news-home hide">
		<a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'news' ) ) ?>">news</a>
	</div>
	<div class="index-home hide">
		<a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'index' ) ) ?>">index</a>
>>>>>>> 82144e8a7c01bab51d4b6e26e1d5b371576cc1ad
	</div>
</div>

<?php get_footer(); ?>