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
            'show_option_all' => 'All',
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

<?php get_footer("bg-black"); ?>


