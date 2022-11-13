<?php

/* Template Name: Index */
$GLOBALS['templateName'] = "index";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';
$project_str = get_locale() === 'fr_FR' ? 'Projet' : 'Project';
$program_str = get_locale() === 'fr_FR' ? 'Programme' : 'Program';
$client_str = get_locale() === 'fr_FR' ? 'MOA' : 'Client';
$status_str = get_locale() === 'fr_FR' ? 'Statut' : 'Status';
$location_str = get_locale() === 'fr_FR' ? 'Lieu' : 'Location';
$year_str = get_locale() === 'fr_FR' ? 'Année' : 'Year';
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
    <table id="worksList">
      <thead>
        <tr>
	  <th class="name" data-type="string"><?= $project_str ?></th>
	  <th class="program" data-type="string"><?= $program_str ?></th>
	  <th class="client" data-type="string"><?= $client_str ?></th>
	  <th class="status" data-type="string"><?= $status_str ?></th>
	  <th class="location" data-type="string"><?= $location_str ?></th>
	  <th class="year" data-type="number"><?= $year_str ?></th>
	</tr>
      </thead>
      <?php
      if ($worksList->have_posts()) : ?>
        <tbody>
          <?php while ($worksList->have_posts()) :
            $worksList->the_post();
            $date = get_field("work_date", $post->ID, false);// Forces ACF to give us date in raw format: yyyymmdd
            $dateTime = DateTime::createFromFormat('Ymd', $date);
            $year = $dateTime ? $dateTime->format('Y') : '';
	    $cat_buffer = array_map(function($term) {return $term->name;}, wp_get_object_terms($post->ID, 'workfilter'));
	    $status_buffer = array_map(function($term) {return $term->name;}, wp_get_object_terms($post->ID, 'workfiltercondition'));
          ?>
            <tr <?php if (has_post_thumbnail()) { echo 'onclick="window.location=\''. get_permalink() .'\';"';  } ?>>
              <td class="name"><?= get_the_title(); ?></td>
              <td class="program"><?= implode(', ', $cat_buffer); ?></td>
              <td class="client"><?= get_field('work_client'); ?></td>
              <td class="status"><?= implode(', ', $status_buffer); ?></td>
              <td class="location"><?= get_field('work_place'); ?></td>
              <td class="year"><?= $year ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      <?php endif;
      wp_reset_postdata(); ?>
    </table>
  </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer();
