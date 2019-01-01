<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

get_header(); ?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">

    <?php

    /***** Loop to display news list *****/

    $news = new \WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'DESC',
    ]);

    if ( $news->have_posts() ): ?>
        <ul class="news-list">
            <?php while ( $news->have_posts() ) : $news->the_post();
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
            endwhile; ?>
        </ul>
    <?php endif;
    wp_reset_postdata();

    ?>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-black"); ?>


