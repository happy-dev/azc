<?php

$GLOBALS['templateName'] = "singleWorks";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php if( have_rows('slider_all_pictures') ): 
      $slideIndex = 0; 
      $imgid = 0; 
      ?>
      <div id="carouselwork" class="work-single">
          <div class="inner">
              <?php while( have_rows('slider_all_pictures') ): the_row();
               $image = get_sub_field('slider_one_picture'); 
              $slideIndex++;
              ?>
	      <div class="image" data-index="<?= $slideIndex?>"/>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              </div>
              <?php endwhile; ?>
              <div class="img-work-caract d-flex justify-content-center">
                  <p><?php echo get_the_title(); ?> - </p>
		  <div class="counter"> <span id="current-index">1</span>/<span class="total"><?= $slideIndex ?></span>
              </div>
          </div>
          <a class="prev carousel-control" role="button" data-slide="prev"></a>
          <a class="next carousel-control" role="button" data-slide="next"></a>
      </div>
      <?php endif; ?>
      
      <div class="work-text onright">
          <div class="arrow">
              <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png"/>                
          </div>
          <div class="work-exponation">
              <h2><?php echo get_the_title(); ?></h2>
              <h2><?php echo the_field('work_place'); ?></h2>
              <p><?php echo the_field('work_text'); ?></p>
          </div>
      </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
