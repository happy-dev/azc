<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

get_header();?>

<section id="primary" class="content-area mt-navb-works">
    <main id="main" class="site-main">

        <?php

        /***** Loop to display filters list *****/

        ?>

        <ul class="categories-filters navbar-subnav">
            <?php
            $terms = get_terms('workfilter');

            foreach ($terms as $term) {
                $termLink = add_query_arg( 'var1', $term->slug, get_permalink() );

                if ( $term->name == $_GET['var1'] ) {
                    echo '<li class="current-cat"><a href="'.$termLink.'">'.$term->name.'</a></li>';
                }
                else {
                    echo '<li><a href="'.$termLink.'">'.$term->name.'</a></li>';
                }
            }
            ?>
        </ul>

        <ul class="categories-filters second-categories-list navbar-subnav">
            <?php
            $terms2 = get_terms('workfiltercondition');

            foreach ($terms2 as $term2) {
                $term2Link = add_query_arg( array('var1' => $_GET['var1'], 'var2' => $term2->slug), get_permalink() );
                if ( $term2->name == $_GET['var2'] ) {
                    echo '<li class="current-cat"><a href="'.$term2Link.'">'.$term2->name.'</a></li>';
                }
                else {
                    echo '<li><a href="'.$term2Link.'">'.$term2->name.'</a></li>';
                }
            }
            ?>
        </ul>

        <?php

        /***** Loop to display works list *****/

        if(isset($_GET['var2']))
        {
            $works = new \WP_Query(array(
                'post_type' => 'postwork',
                'post_status' => 'publish',
                'posts_per_page' => 50,
                'orderby' => 'title',
                'order' => 'DESC',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'workfilter',
                        'field' => 'name',
                        'terms' => $_GET['var1'],
                    ),
                    array(
                        'taxonomy' => 'workfiltercondition',
                        'field' => 'name',
                        'terms' => $_GET['var2'],
                    )
                )
            ));
        }
        else if ( isset($_GET['var1']) && !isset($_GET['var2']) )
        {
            $works = new \WP_Query(array(
                'post_type' => 'postwork',
                'post_status' => 'publish',
                'posts_per_page' => '50',
                'orderby' => 'title',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'workfilter',
                        'field' => 'name',
                        'terms' => $_GET['var1'],
                    )
                )
            ));
        }
        else
        {
            $works = new \WP_Query(array(
                'post_type' => 'postwork',
                'post_status' => 'publish',
                'posts_per_page' => '50',
                'orderby' => 'title',
                'order' => 'DESC',
            ));
        }

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


