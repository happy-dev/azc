<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <ul class="categories-filters navbar-subnav">
            <?php
            //This one is to display All in your category.
            // Do not use show_option_all parameter since it includes all categories not just one your displaying
            $args= array(
                'include'          =>   3, //Put here ID of your category
                'title_li'          => __('')
            );
            wp_list_categories( $args );
            ?>
            <?php
            //This one displays subcategories of your category
            $args= array(
                'child_of'          =>   3, //Put here parent category
                'title_li'          => __('')
            );
            wp_list_categories( $args );
            ?>
        </ul>

        <?php
        /***** Loop to display works list by workfilter's term *****/

        $query = new \WP_Query(array(
            'post_type' => 'postwork',
            'tax_query' => array(
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
