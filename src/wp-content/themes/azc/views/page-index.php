<?php

/* Template Name: Page Index */

get_header();

$postsIndex = new \WP_Query([
    'post_type' => 'postindex',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'DESC',
]);

?>

<ul class="">
    <?php
    if ( $postsIndex->have_posts() ):
        while ( $postsIndex->have_posts() ) : $postsIndex->the_post(); ?>
        <a href=" <?php echo get_permalink();?> ">
            <?php echo the_title(); ?>
        </a>
        <?php endwhile;
    endif;
    ?>
</ul>

<?php get_footer(); ?>
