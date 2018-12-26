<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

get_header();?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php

        /***** Loop to display works list *****/

        $works = new \WP_Query([
            'post_type' => 'work',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'DESC',
        ]);

        if ( $works->have_posts() ): ?>
            <div class="container">
                <ul class="works-list row">
                    <?php while ( $works->have_posts() ) : $works->the_post(); ?>
                        <li class="col-sm-3">
                            <a href="<?php echo get_permalink(); ?>">

                                <span><?php echo get_the_title(); ?></span>

                                <?php if( have_rows('work_all_pictures') ):
                                    $i = 0;
                                    while( have_rows('work_all_pictures') ): the_row();
                                        $i++;
                                        $image = get_sub_field('work_one_picture'); ?>
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

