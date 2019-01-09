<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <h1><?php echo get_the_title(); ?></h1>
        <?php if( have_rows('slider_all_pictures') ): ?>
                <ul class="slides">
                    <?php while( have_rows('slider_all_pictures') ): the_row();
                        $image = get_sub_field('slider_one_picture'); ?>
                        <li class="slide">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>