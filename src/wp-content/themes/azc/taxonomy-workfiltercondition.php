<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        /***** Loop to display works list by workfilter's term *****/

        $query = new \WP_Query(array(
            'post_type' => 'postwork',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'workfilter',
                    'field' => 'term_id',
                    'terms' => '9',
                ),
                array(
                    'taxonomy' => 'workfiltercondition',
                    'field' => 'term_id',
                    'terms' => get_queried_object_id(),
                )
            )
        ));

        if ( $query->have_posts() ): ?>
            <div class="container-fluid">
                <div class="works-list">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="works-item">
                            <a href="<?php echo get_permalink(); ?>">
                                <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" />
                                <div class="d-flex justify-content-between works-info">
                                    <div>
                                        <h2><?php echo get_the_title(); ?></h2>
                                        <p><?php echo the_field('work_place'); ?></p>
                                    </div>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/add.png" alt="" />
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="row">
                    <a href="#primary" class="col-12 text-uppercase text-right haut font-weight-bold">Haut</a>
                </div>
            </div>
        <?php endif;
        wp_reset_postdata(); ?>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
