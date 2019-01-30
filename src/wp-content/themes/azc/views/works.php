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

        $argsCondition = array(
            'taxonomy' => 'workfiltercondition',
            'title_li' => __('')
        );

        ?>

        <ul class="categories-filters navbar-subnav">
            <?php wp_list_categories($args); ?>
        </ul>

        <ul class="categories-filters second-categories-list navbar-subnav">
            <?php wp_list_categories($argsCondition); ?>
        </ul>

        <?php

        /***** Loop to display works list *****/

        $works = new \WP_Query(array(
            'post_type' => 'postwork',
            'post_status' => 'publish',
            'posts_per_page' => '50',
            'orderby' => 'title',
            'order' => 'DESC',
        ));

        if ( $works->have_posts() ): ?>
            <div class="container-fluid">
                <div class="works-list">
                    <?php while ( $works->have_posts() ) : $works->the_post(); ?>
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
        wp_reset_postdata();
        ?>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-black"); ?>


