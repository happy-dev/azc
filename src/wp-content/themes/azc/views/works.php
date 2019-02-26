<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

get_header();?>

<section id="primary" class="content-area mt-navb-works">
    <main id="main" class="site-main">
        <section id="works-mosaic">
            <?php

            /***** Loop to display filters list *****/

            ?>

            <ul class="categories-filters navbar-subnav">
                <?php
                $terms = get_terms('workfilter');

                foreach ($terms as $term) {
                    $termLink = add_query_arg( 'var1', $term->slug, get_permalink() );

                    if ( $term->slug == $_GET['var1'] ) {
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
                    if ( $term2->slug == $_GET['var2'] ) {
                        echo '<li class="current-cat"><a href="'.$term2Link.'">'.$term2->name.'</a></li>';
                    }
                    else {
                        echo '<li><a href="'.$term2Link.'">'.$term2->name.'</a></li>';
                    }
                }
                echo '<li><a href="#works-list">List</a></li>';
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
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'work_mosaic',
                            'compare' => '=',
                            'value' => '1'
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
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'work_mosaic',
                            'compare' => '=',
                            'value' => '1'
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
                    'meta_query' => array(
                        array(
                            'key' => 'work_mosaic',
                            'compare' => '=',
                            'value' => '1'
                        )
                    )
                ));
            }

            if ( $works->have_posts() ): ?>
                <div class="container-fluid">
                    <div class="works-mosaic-listing">
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
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </section>
        <section id="works-list">
            <?php
            $worksList = new \WP_Query(array(
                'post_type' => 'postwork',
                'post_status' => 'publish',
                'posts_per_page' => '100',
                'orderby' => 'title',
                'order' => 'DESC',
            ));
            
            if ( $worksList->have_posts() ): ?>
                <div class="container-fluid">
                    <div class="works-list-listing">
                        <?php while ( $worksList->have_posts() ) : $worksList->the_post(); ?>
                            <div class="works-item">
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="d-flex justify-content-between works-info">
                                        <div>
                                            <h2><?php echo get_the_title(); ?></h2>
                                            <div><?php echo the_field('work_place'); ?></div>
                                            <div>
                                                <?php $workfilterTerms = wp_get_object_terms( $post->ID,  'workfilter' );
                                                foreach( $workfilterTerms as $workfilterTerm ) {
                                                    echo $workfilterTerm->name; 
                                                } ?>
                                            </div
                                            <div>
                                                <?php $workfilterconditionTerms = wp_get_object_terms( $post->ID,  'workfiltercondition' );
                                                foreach( $workfilterconditionTerms as $workfilterconditionTerm ) {
                                                    echo $workfilterconditionTerm->name;
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <div class="row">
                            <a href="#primary" class="col-12 text-uppercase text-right haut font-weight-bold">Haut</a>
                        </div>
                    </div>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </section>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-white"); ?>


