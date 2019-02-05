<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        /***** Loop to display works list by workfilter's term *****/

        $query = new \WP_Query(array(
            'post_type' => 'postindex',
            'tax_query' => array(
                array(
                    'taxonomy' => 'indexcategory',
                    'field' => 'term_id',
                    'terms' => get_queried_object_id(),
                )
            )
        ));

        if ( $query->have_posts() ): ?>

            <ul class="postindex-list">

                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li>
                        <a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?></a>
                        <br />
                        <span>par <?php echo get_the_author(); ?></span>
                        <p><?php echo get_the_content(); ?></p>
                    </li>
                <?php endwhile; ?>

            </ul>

        <?php endif;
        wp_reset_postdata(); ?>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
