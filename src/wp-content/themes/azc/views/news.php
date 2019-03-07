<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

get_header(); ?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">

    <?php

    /***** Loop to display news list *****/
    
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    $news = new \WP_Query(array(
        'post_type' => 'postnews',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'paged' => $paged,
    ));
    
    $id = get_the_ID();

    if ( $news->have_posts() ): ?>
        <ul class="news-list">
        <?php while ( $news->have_posts() ) : $news->the_post(); ?>
            <div class="container-fluid post-news">
                <div class="row padb-15">
                    <div class="owl-carousel owl-theme col-lg-6 col-12">
                        <?php while( have_rows('slider_all_pictures') ): the_row();
                            $image = get_sub_field('slider_one_picture', $id); ?>
                            <div class="item">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h2><?php echo get_the_title(); ?></h2>
                        <div><?php echo get_the_date('y/m/d'); ?></div>
                        <div class="col-xl-6 col-12 news-text news-resize">
                            <div class="bloc_text_news">
                                <p><?php echo get_the_content(); ?></p>
                            </div>
                        </div>
                        <p class="news-more hide">+</p>
                        <p class="news-less hide">-</p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </ul>
    <?php endif;
    wp_reset_postdata();
    ?>
        
    <div class="news-pagination">
        <?php
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $news->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => false,
                'prev_text'    => false,
                'add_args'     => false,
                'add_fragment' => '',
            ) );
        ?>
    </div>
    <div class="row">
        <a href="#primary" class="col-12 text-uppercase text-right haut font-weight-bold">Haut</a>
    </div>
    

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-white"); ?>


