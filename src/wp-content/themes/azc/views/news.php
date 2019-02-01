<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

get_header(); ?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">

    <?php

    /***** Loop to display news list *****/

    $news = new \WP_Query(array(
        'post_type' => 'postnews',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));

    if ( $news->have_posts() ): ?>
        <ul class="news-list">
            <?php while ( $news->have_posts() ) : $news->the_post(); ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel owl-theme col-lg-6 col-12">
                            <?php while( have_rows('slider_all_pictures') ): the_row();
                                $image = get_sub_field('slider_one_picture'); ?>
                                <div class="item">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="col-lg-6 col-12">
                            <?php echo '<li>'.get_the_title().'</li>' ;?> 
                            <p> <?php echo the_field('single-text') ;?></p>                        
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </ul>
    <?php endif;
    wp_reset_postdata();

    ?>
    

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-black"); ?>


