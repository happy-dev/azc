<?php

/* Template Name: Works */

function get_works(string $var1, string $var2): WP_Query {
  $base_arg = [
    'post_type' => 'postwork',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'meta_query' => [
      [
        'key' => 'work_mosaic',
        'compare' => '=',
        'value' => '1'
      ]
    ]
  ];


  $opts = [];
  if ($var1 !== '' && $var2 === '') {
    $opts = [
      'tax_query' => [
        [
          'taxonomy' => 'workfilter',
          'field' => 'slug',
          'terms' => $var1,
        ]
      ],
    ];
  } else if ($var1 === '' && $var2 !== '') {
    $opts = [
      'tax_query' => [
        [
          'taxonomy' => 'workfiltercondition',
          'field' => 'slug',
          'terms' => $var2,
        ]
      ]
    ];
  }
  return new WP_Query(array_merge($base_arg, $opts));
}

$GLOBALS['templateName'] = "works";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

// XSS/SQL injections preventing of the poors.
$var1 = filter_var($_GET['var1'] ?? '', FILTER_SANITIZE_STRING);
$var2 = filter_var($_GET['var2'] ?? '', FILTER_SANITIZE_STRING);
$works = get_works($var1, $var2);
$terms = get_terms('workfilter');
$terms2 = get_terms('workfiltercondition');

get_header();

$title = get_the_title();
?>

<section id="primary" class="content-area mt-navb-works">
  <main id="main" class="site-main">
    <section id="works-mosaic">
      <!--- Loop to display works list --->
      <?php if ($works->have_posts()) : ?>
        <div class="container-fluid p-20 mb-5">
	<div class="grid <?= $title ?>">
            <?php while ($works->have_posts()) : $works->the_post(); ?>
              <div class="grid-item">
                <a href="<?= get_permalink(); ?>">
		  <?php 
  		    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "medium-width" );
		    list( $src, $width, $height ) = $img;

		    if ($height > $width)
		      the_post_thumbnail('medium-width', array('class' => 'portrait')); 
		    else
		      the_post_thumbnail('medium-width', array('class' => 'landscape')); 

		  ?>
                  <div class="d-flex justify-content-between works-info">
                    <div>
                      <p><?= get_the_title(); ?>, <?= get_field('work_place'); ?></p>
		      <?php $cat_buffer = array_map(function($term) {return $term->name;}, wp_get_object_terms($post->ID, 'workfilter')); ?>
		      <p><?= implode(', ', $cat_buffer); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif;
      wp_reset_postdata();
      ?>
    </section>

    <div class="row haut justify-content-end text-uppercase text-right p-20">
      <a href="#primary" class="text-black"><?= $top_string ?></a>
    </div>
  </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
