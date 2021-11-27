<?php

/* Template Name: Works */

function get_works(string $var1, string $var2): WP_Query {
  $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
  $base_arg = [
    'post_type' => 'postwork',
    'post_status' => 'publish',
    'posts_per_page' => '50',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 100,
    'paged' => $paged,
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
?>

<section id="primary" class="content-area mt-navb-works">
  <main id="main" class="site-main">
    <section id="works-mosaic">
      <!--- Loop to display works list --->
      <?php if ($works->have_posts()) : ?>
        <div class="container-fluid p-20 mb-5">
          <div class="grid">
            <?php while ($works->have_posts()) : $works->the_post(); ?>
              <div class="grid-item">
                <a href="<?= get_permalink(); ?>">
                  <?php the_post_thumbnail('medium-width'); ?>
                  <div class="d-flex justify-content-between works-info">
                    <div>
                      <h2><?= get_the_title(); ?></h2>
                      <p><?= get_field('work_place'); ?></p>
                    </div>
                    <img src="<?= get_template_directory_uri(); ?>/img/add.png" alt="" />
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
