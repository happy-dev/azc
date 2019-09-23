<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';


get_header();?>

<section id="primary" class="content-area mt-navb-works">
    <main id="main" class="site-main">
        <section id="works-mosaic">
            <!--- Loop to display filters list --->
            <div class="submenu-work">
                <ul class="categories-filters navbar-subnav-work">
                    <?php
                    $terms = get_terms('workfilter');

                    foreach ($terms as $term) {
                        $href = add_query_arg('var1', $term->slug, get_permalink());
                        $class = $term->slug == $_GET['var1'] ? 'class="current-cat"' : '';
                        ?><li <?= $class ?>><a href="<?= $href ?>"><?= $term->name ?></a></li><?
                    }
                    ?>
                </ul>

                <ul class="categories-filters second-categories-list navbar-subnav-work">
                    <?php
                    $terms2 = get_terms('workfiltercondition');

                    foreach ($terms2 as $term) {
                        $href = add_query_arg('var2', $term->slug, get_permalink());
                        $class = $term->slug == $_GET['var2'] ? 'class="current-cat"' : '';
                        ?><li <?= $class ?>><a href="<?= $href ?>"><?= $term->name ?></a></li><?
                    }
                    ?>
                    <li><a href="#works-list" class="list-link"><?= $list_name ?></a></li>
                </ul>
            </div>

            <!--- Loop to display works list ---><?php

            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            
            if ( isset($_GET['var1']) && !isset($_GET['var2']) )
            {
                $works = new \WP_Query(array(
                    'post_type' => 'postwork',
                    'post_status' => 'publish',
                    'posts_per_page' => '50',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => 100,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'workfilter',
                            'field' => 'slug',
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
            else if ( isset($_GET['var2']) && !isset($_GET['var1']) )
            {
                $works = new \WP_Query(array(
                    'post_type' => 'postwork',
                    'post_status' => 'publish',
                    'posts_per_page' => '50',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => 100,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'workfiltercondition',
                            'field' => 'slug',
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
            else
            {
                $works = new \WP_Query(array(
                    'post_type' => 'postwork',
                    'post_status' => 'publish',
                    'posts_per_page' => '50',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => 100,
                    'paged' => $paged,
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
                <div class="container-fluid p-20 mb-5">
                    <div class="grid">
                        <?php while ( $works->have_posts() ) : $works->the_post(); ?>
                            <div class="grid-item">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium-width' ); ?>
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
            
            <div class="works-pagination">
                <?php /*
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $works->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => false,
                        'prev_text'    => false,
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) ); */
                ?>
            </div>
        </section>
        <section id="works-list" class="hide">
            <?php
            $worksList = new \WP_Query(array(
                'post_type' => 'postwork',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key' => 'work_date',
                'orderby' => 'meta_value',
                'order' => 'DESC',
            ));

            $prevYear = null;

            if ( $worksList->have_posts() ): ?>
                <div class="container-fluid p-20 mb-5">
                    <?php while ( $worksList->have_posts() ) : $worksList->the_post();
                        // Force Advanced custom field to give us date in raw format: yyyymmdd
                        $date = get_field("work_date", $post->ID, false);
                        $dateTime = DateTime::createFromFormat('Ymd', $date);
                        if ( is_object($dateTime) ) {
                            $year = $dateTime->format('Y');
                        }
                        if ($prevYear != $year) {
                            if ( !empty($year) ){
                                echo '<div class="work-list-year">'.$year.'</div>';
                            }
                        }
                        $prevYear = $year; ?>
                    <div class="works-item" id="<?php echo get_the_id(); ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <a href="<?php echo get_permalink(); ?>"> <?php } ?>
                            <div class="d-flex justify-content-between works-info">
                                <h2><?php echo get_the_title(); ?></h2>
                                <div class="w25">
                                    <?php $workfilterTerms = wp_get_object_terms( $post->ID,  'workfilter' );
                                    foreach( $workfilterTerms as $workfilterTerm ) {
                                        echo $workfilterTerm->name.', '; 
                                    } ?>
                                </div>
                                <div class="w25">
                                    <?php $workfilterconditionTerms = wp_get_object_terms( $post->ID,  'workfiltercondition' );
                                    foreach( $workfilterconditionTerms as $workfilterconditionTerm ) {
                                        echo $workfilterconditionTerm->name.', ';
                                    } ?>
                                </div>
                                <div class="w25"><?php echo the_field('work_place'); ?></div>
                            </div>
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="add-list"><img src="<?php echo get_template_directory_uri(); ?>/img/add.png" alt="" /></div>
                        </a>
                        <?php } ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </section>     
        <div class="row haut justify-content-end text-uppercase text-right p-20">
            <a href="#primary" class="text-black"><?= $top_string ?></a>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>


