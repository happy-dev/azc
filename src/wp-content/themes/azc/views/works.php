<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

get_header();?>

<section id="primary" class="content-area mt-navb-works">
    <main id="main" class="site-main">

        <?php

        /***** Loop to display filters list *****/

        $args = array(
            'taxonomy' => 'workfilter',
            'title_li' => __('')
        );
        ?>

        <ul class="categories-filters">
            <?php wp_list_categories($args); ?>
        </ul>

        <?php

        /***** Loop to display works list *****/

        $works = new \WP_Query(array(
            'post_type' => 'postwork',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'DESC',
        ));

        if ( $works->have_posts() ): ?>
            <div class="container-fluid">
                <ul class="works-list row">
                    <?php while ( $works->have_posts() ) : $works->the_post(); ?>
                        <li class="col-sm-3">
                            <a href="<?php echo get_permalink(); ?>">
                                <span><?php echo get_the_title(); ?></span>
                                <br />
                                <span><?php echo the_field('work_place'); ?></span>
                                <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" />
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

<?php get_footer("bg-black"); ?>


