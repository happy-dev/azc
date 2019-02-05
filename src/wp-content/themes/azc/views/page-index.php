<?php

/* Template Name: Page Index */

$GLOBALS['templateName'] = "page-index";

get_header();?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php

                    /***** Loop to display post index list *****/

                    $postsIndex = new \WP_Query(array(
                        'post_type' => 'postindex',
                        'post_status' => 'publish',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => 1,
                        'paged' => $paged,
                    ));

                    if ( $postsIndex->have_posts() ): ?>

                        <ul class="postindex-list">

                            <?php while ( $postsIndex->have_posts() ) : $postsIndex->the_post(); ?>
                                <li>
                                    <a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?></a>
                                    <br />
                                    <span>par <?php echo get_the_author(); ?></span>
                                    <p><?php echo get_the_content(); ?></p>
                                </li>
                            <?php endwhile; ?>

                        </ul>

                    <?php endif;
                    wp_reset_postdata();

                    /*  Call function for posts pagination */

                    pagination($postsIndex->max_num_pages); ?>

                </div>


                <div class="col-sm-6">

                    <?php

                    /***** Loop to display taxonomy index list *****/

                    $terms = get_terms(array(
                        'taxonomy' => 'indexcategory',
                    ));

                    $letter = '';
                    if( $terms ): ?>

                    <ul class="categories-filters">

                            <?php foreach( $terms as $term ):

                            if($letter != strtoupper($term->name[0]))
                            {
                                echo ($letter != '') ? '</ul></div>' : '';
                                $letter = strtoupper($term->name[0]);
                                echo '<div><ul class="postindex-list-data"><h4>'.strtoupper($term->name[0]).'</h4>';
                            }

                            echo '<li><a href="'.get_term_link($term->slug, 'indexcategory').'">'.$term->name.'</a></li>';

                            endforeach; ?>

                        </ul>

                    <?php endif;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-white"); ?>
