<?php

$GLOBALS['templateName'] = "singleWorks";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';
$previous_str = get_locale() === 'fr_FR' ? 'Précédent' : 'Previous';
$next_str = get_locale() === 'fr_FR' ? 'Suivant' : 'Next';

$is_mosaic = get_field("work_mosaic") == 1;// Is the project on the PROJECTS page?

if ($is_mosaic) {// If project on PROJECTS page, we display prev/next links
  $workID = get_the_ID();// ID of the project bing displayed
  $worksList = new WP_Query([
    'post_type' => 'postwork',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_key' => 'work_mosaic',
    'meta_value' => 1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
  ]);
  
  $first_pass = true;
  $is_first_post = false;// Current post is first of loop
  $posts_IDs = array();
  
  if ($worksList->have_posts()) {
    while ($worksList->have_posts()) {
      $worksList->the_post();
  
      if (has_post_thumbnail()) {// If project detailed
        array_push($posts_IDs, $post->ID);
      }
    }
  }
  wp_reset_postdata();
  
  if ($posts_IDs[0] == $workID) {// Current post == first of the loop
    $previousID = $posts_IDs[count($posts_IDs)-1];
    $nextID = $posts_IDs[1];
  }
  elseif ($posts_IDs[count($posts_IDs)-1] == $workID) {// Currnt post == last of the loop
    $previousID = $posts_IDs[count($posts_IDs)-2];
    $nextID = $posts_IDs[0];
  }
  else {
    $idx = 0;
  
    while($posts_IDs[$idx] != $workID) {
      $idx++;
    } 
  
    $previousID = $posts_IDs[$idx-1];
    $nextID = $posts_IDs[$idx+1];
  }
}

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php if( have_rows('slider_all_pictures') ): 
      $slideIndex = 0; 
      ?>
      <div id="work-text" class="work-text desktop">
        <div class="work-exponation">
	  <div class="structured-text"><?= the_field('work_text') ?></div>
	  <div id="read-more">Lire <span class="more">plus</span><span class="less">moins</span></div>
          <div class="relative-container">
	    <div class="storytelling"><?= the_field('work_storytelling') ?></div>
	  </div>
        </div>
      </div>

      <div id="carousel-work-mobile" class="work-single mobile">
          <div class="inner">
              <?php while( have_rows('slider_all_pictures') ): the_row();
              $image = get_sub_field('slider_one_picture'); 
              $slideIndex++;
              ?>
	      <div class="image" data-index="<?= $slideIndex?>"/>
		<?php if ( $image["subtype"] != 'gif' ): ?>
                  <img src="<?= $image['sizes']['large']; ?>" alt="<?= $image['alt']; ?>" />
		<?php else: ?>
                  <img src="<?= $image['sizes']; ?>" alt="<?= $image['alt']; ?>" />
		<?php endif; ?>
              </div>
              <?php endwhile; ?>
          </div>
      </div>

      <div id="carousel-work-desktop" class="carousel work-single desktop" data-interval="false">
          <div class="carousel-inner inner">
	      <?php 
	        $active = "active";
                $slideIndex = 0;
      	        while( have_rows('slider_all_pictures') ): the_row();
                $image = get_sub_field('slider_one_picture'); 
                $slideIndex++;
              ?>
	      <div class="image carousel-item <?= $active ?>" data-index="<?= $slideIndex?>"/>
		<?php if ( $image["subtype"] != 'gif' ): ?>
                  <img src="<?= $image['sizes']['large']; ?>" alt="<?= $image['alt']; ?>" />
		<?php else: ?>
                  <img src="<?= $image['sizes']; ?>" alt="<?= $image['alt']; ?>" />
		<?php endif; ?>
              </div>
	      <?php 
	        $active = "";
	        endwhile; 
	      ?>
          </div>

          <a class="carousel-control-prev" href="#carousel-work-desktop" role="button" data-slide="prev"> </a>
          <a class="carousel-control-next" href="#carousel-work-desktop" role="button" data-slide="next"> </a>
      </div>

      <div class="img-work-caract d-flex justify-content-center">
        <p><?= get_the_title() ?>, <?= get_field('work_place') ?></p>
        <div class="counter mobile"> <span id="currentIndexMobile">1</span>/<span class="total"><?= $slideIndex ?></span></div>
        <div class="counter desktop"> <span id="currentIndexDesktop">1</span>/<span class="total"><?= $slideIndex ?></span></div>
      </div>

      <div class="work-text mobile">
        <div class="work-exponation">
          <?= the_field('work_text') ?> <?= the_field('work_storytelling') ?>
        </div>
      </div>
      <?php endif; ?>
      
      <div class="prev-next">
        <?php if ($is_mosaic) : // If project on PROJECTS page, we display prev/next links ?>
        <a href="<?= get_permalink( $previousID ) ?>" class="text-black"><?= $previous_str ?></a>
        <?php else : ?>
        <a href="<?= site_url() ?>/index-azc" class="text-black">INDEX</a>
        <?php endif; ?>

        <?php if ($is_mosaic) : // If project on PROJECTS page, we display prev/next links ?>
        <a href="<?= get_permalink( $nextID ) ?>" class="text-black"><?= $next_str ?></a>
        <?php endif; ?>
      </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
