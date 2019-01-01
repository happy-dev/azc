<?php

/* Template Name: Works */

$GLOBALS['templateName'] = "works";

get_header();?>

<section id="primary" class="content-area mt-navb-works">
    <main id="main" class="site-main">

        <?php

        /***** Loop to display filters list *****/

        if( $terms = get_terms( array(
            'taxonomy' => 'workfilter', // to make it simple I use default categories
            'orderby' => 'name'
        ) ) ) :
            // if categories exist, display the dropdown
            echo '<select name="categoryfilter"><option value="">Select category...</option>';
            foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as an option value
            endforeach;
            echo '</select>';
        endif;

        /***** Loop to display works list *****/

        $works = new \WP_Query([
            'post_type' => 'work',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'DESC',
        ]);

        if ( $works->have_posts() ): ?>
            <div class="container-fluid">
                <ul class="works-list row">
                    <?php while ( $works->have_posts() ) : $works->the_post(); ?>
                        <li class="col-sm-3">
                            <a href="<?php echo get_permalink(); ?>">
                                <?php if( have_rows('slider_pictures') ):
                                    $i = 0;
                                    while( have_rows('slider_pictures') ): the_row();
                                        $i++;
                                        $image = get_sub_field('slider_one_picture'); ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                                        <?php if( $i == 1 ): break; endif;
                                    endwhile;
                                endif; ?>
                                <span><?php echo get_the_title(); ?></span>
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

