<?php

$GLOBALS['templateName'] = "singleWorks";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';
$previous_str = get_locale() === 'fr_FR' ? 'Projet précédent' : 'Previous project';
$next_str = get_locale() === 'fr_FR' ? 'Projet suivant' : 'Next project';
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

$workID = get_the_ID();

$worksList = new WP_Query([
  'post_type' => 'postwork',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'meta_key' => 'work_date',
  'orderby' => 'meta_value',
  'order' => 'DESC',
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
		  <div class="counter"> <span id="currentIndex">1</span>/<span class="total"><?= $slideIndex ?></span>
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

      <div class="container-fluid p-20">
        <div class="row haut justify-content-between text-uppercase">
	  <a href="<?= get_permalink( $previousID ) ?>" class="text-black"><?= $previous_str ?></a>
          <a href="#primary" class="text-black"><?= $top_string ?></a>
	  <a href="<?= get_permalink( $nextID ) ?>" class="text-black"><?= $next_str ?></a>
        </div>
      </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
