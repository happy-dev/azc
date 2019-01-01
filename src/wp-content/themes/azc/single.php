<?php

$GLOBALS['templateName'] = "single";

get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <h1><?php echo get_the_title(); ?></h1>
        <?php if( have_rows('news_all_pictures') ): ?>
        <div class="container-fluid">
            <div class="row">
                <div class="owl-carousel owl-theme col-6">
                    <?php while( have_rows('news_all_pictures') ): the_row();
                        $image = get_sub_field('news_one_picture'); ?>
                        <div class="item">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
