<?php

/* Template Name: Index */
$GLOBALS['templateName'] = "index";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

$worksList = new WP_Query([
  'post_type' => 'postwork',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'meta_key' => 'work_date',
  'orderby' => 'meta_value',
  'order' => 'DESC',
]);

get_header();
?>

<section id="primary" class="content-area mt-navb-works">
  <main id="main" class="site-main">
    <section id="works-list">
      <?php
      $prevYear = '';
      if ($worksList->have_posts()) : ?>
        <div class="container-fluid p-20 mb-5">
          <?php while ($worksList->have_posts()) :
            $worksList->the_post();
            // Force Advanced custom field to give us date in raw format: yyyymmdd
            $date = get_field("work_date", $post->ID, false);
            $dateTime = DateTime::createFromFormat('Ymd', $date);
            $year = $dateTime ? $dateTime->format('Y') : '';
            if ($prevYear !== $year && $year !== '') : ?>
              <div class="work-list-year"><?= $year ?></div>
            <?php endif;

            $prevYear = $year;
            $workfilterTerms = wp_get_object_terms( $post->ID,  'workfilter' );
            $workfilterconditionTerms = wp_get_object_terms( $post->ID,  'workfiltercondition' );
            ?>
            <div class="works-item" id="<?= get_the_id(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?= get_permalink(); ?>">
                <?php endif; ?>
                <div class="d-flex justify-content-between works-info">
                  <h2><?= get_the_title(); ?></h2>
                  <div class="w25">
                    <?php foreach ($workfilterTerms as $workfilterTerm): ?>
                    <?= $workfilterTerm->name . ', ' ?>
                    <?php endforeach; ?>
                  </div>

                  <div class="w25">
                    <?php foreach ($workfilterconditionTerms as $workfilterconditionTerm) : ?>
                      <?= $workfilterconditionTerm->name . ', ' ?>
                    <?php endforeach; ?>
                  </div>

                  <div class="w25"><?= get_field('work_place'); ?></div>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                  <div class="add-list">
                    <img src="<?= get_template_directory_uri(); ?>/img/add.png" alt="" />
                  </div>
                  </a>
              <?php endif ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif;
      wp_reset_postdata(); ?>
    </section>
    <div class="row haut justify-content-end text-uppercase text-right p-20">
      <a href="#primary" class="text-black"><?= $top_string ?></a>
    </div>
  </main><!-- .site-main -->
</section><!-- .content-area -->
