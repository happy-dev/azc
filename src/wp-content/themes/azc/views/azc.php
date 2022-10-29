<?php

/* Template Name: AZC 1 column */

$GLOBALS['templateName'] = "azc";

get_header();
?>

<section id="primary" class="content-area mt-navb">
  <main id="main" class="site-main">
    <div class="agency">
      <h2>ATELIER ZÜNDEL CRISTEA</h2>
      <h2>15/17 rue Vulpian</h2>
      <h2>75013 Paris</h2>
      <h2><a href="tel:+33155252494">+ 33 1 55 25 24 94</a></h2>
      <section><?php the_content() ?></section>
    </div>
    <div id="accordion" class="container-fluid"><?php
      $args = array(
	'post_type' => 'azcsection',
	'orderby' => 'menu_order',
	'order' => 'ASC',
      );
      $azc_query = new WP_Query($args);

      if( $azc_query->have_posts() ):
        while( $azc_query->have_posts() ): $azc_query->the_post() ?>
	  <div class="accordion-element">
            <h2><?php the_title() ?></h2>
            <section><?php the_content() ?></section>
          </div>
        <?php endwhile; ?>
       <?php endif; ?>
    </div>
  </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer();
