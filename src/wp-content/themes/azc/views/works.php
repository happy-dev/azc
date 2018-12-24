<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

get_header();?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php

    /***** Loop to display works list *****/

    $works = new \WP_Query([
        'post_type' => 'work',
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'DESC',
    ]);

    if ( $works->have_posts() ): ?>
        <ul class="works-list">
            <?php while ( $works->have_posts() ) : $works->the_post();
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
            endwhile; ?>
        </ul>
    <?php endif;
    wp_reset_postdata();

    ?>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-black"); ?>

