<?php

/* Template Name: AZC 1 column */

$GLOBALS['templateName'] = "azc-1-column";
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

get_header();
?>

<section id="primary" class="content-area mt-navb">
  <main id="main" class="site-main">
    <div class="container-fluid">
      <?php
      while ( have_posts() ) :
      	the_post();
      	the_content();
      endwhile; // End of the loop.
      ?>
    </div>
  </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>

