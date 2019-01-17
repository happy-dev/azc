<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">


        <ul class="categories-filters">
            <?php
            //This one is to display All in your category.
            // Do not use show_option_all parameter since it includes all categories not just one your displaying
            $args= array(
                'include'          =>   2, //Put here ID of your category
                'title_li'          => __('')
            );
            wp_list_categories( $args );
            ?>
            <?php
            //This one displays subcategories of your category
            $args= array(
                'child_of'          =>   2, //Put here parent category
                'title_li'          => __('')
            );
            wp_list_categories( $args );
            ?>
        </ul>

    <?php
    /***** Loop to display works list by workfilter's term *****/

    $query = new \WP_Query([
        'post_type' => 'postwork',
        'tax_query' => array(
            array(
                'taxonomy' => 'workfilter',
                'field' => 'term_id',
                'terms' => get_queried_object_id(),
            )
        )
    ]);

    if ( $query->have_posts() ): ?>
            <div class="container-fluid">
                <ul class="works-list row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="col-sm-3">
                            <a href="<?php echo get_permalink(); ?>">
                                <span><?php echo get_the_title(); ?></span>
                                <?php if( have_rows('slider_all_pictures') ):
                                    $i = 0;
                                    while( have_rows('slider_all_pictures') ): the_row();
                                        $i++;
                                        $image = get_sub_field('slider_one_picture'); ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                                        <?php if( $i == 1 ): break; endif;
                                    endwhile;
                                endif; ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif;
        wp_reset_postdata();

        ?>


    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
