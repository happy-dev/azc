<?php

/* Template Name: AZC 1 column */

$GLOBALS['templateName'] = "azc";

get_header();
?>

<section id="primary" class="content-area mt-navb">
  <main id="main" class="site-main">
    <div id="accordion" class="container-fluid"><?php
      $args = array(
	'post_type' => 'azcsection',
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

