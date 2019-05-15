<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

get_header(); ?>

<section id="primary" class="content-area mt-navb" style="background-color:<?php the_field('bckg_news_color'); ?>">
    <main id="main" class="site-main">

        <?php

        /***** Loop to display news list *****/

        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

        $news = new \WP_Query(array(
            'post_type' => 'postnews',
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => 8,
            'paged' => $paged,
        ));

        $id = get_the_ID();

        if ( $news->have_posts() ): ?>
            <ul class="news-list">
            <?php while ( $news->have_posts() ) : $news->the_post(); ?>
                <div class="container-fluid post-news">
                    <div class="row padb-15">
                        <div class="col-lg-6 col-12 p-20">                          
                            <?php 
                            $url = get_field('news_url');
                            if( !empty($url) ): ?>
                                <a href="<?php echo $url; ?>">
                            <?php endif;    
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } ; 
                            if( !empty($url) ): ?>
                            </a>
                        <?php endif; 
                            ?>
                        </div>
                        <div class="col-lg-6 col-12 p-20">
                            <h2><?php echo get_the_title(); ?></h2>
                            <?php /* $lang = get_bloginfo("language");
                            if ( $lang == 'fr-FR' ) { ?>
                                <div><?php echo get_the_date('d.m.y'); ?></div>
                            <?php }
                            else if ( $lang == 'en-GB' ) { ?>
                                <div><?php echo get_the_date('m.d.y'); ?></div>
                            <?php } */ ?>
                            <div class="col-xl-6 col-12 news-text p-0">
                                <div class="bloc_text_news">
                                    <p><?php echo get_the_content(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </ul>
        <?php endif;
        wp_reset_postdata();
        ?>
        <div class="container-fluid p-20">
            <div class="row haut justify-content-end text-uppercase text-right">                
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
                <a href="#primary" class="">Haut</a>
            </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>


