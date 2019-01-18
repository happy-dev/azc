<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <h1><?php echo get_the_title(); ?></h1>
        <br />
        <span><?php echo the_field('work_place'); ?></span>
        <section class="container-fluid">
            <div class="row">
                <?php if( have_rows('slider_all_pictures') ): ?>
                    <div class="owl-carousel owl-theme col-lg-6 col-12">
                        <?php while( have_rows('slider_all_pictures') ): the_row();
                            $image = get_sub_field('slider_one_picture'); ?>
                            <div class="item">
                                <img src="<?php echo $image['url']; ?>" alt="" />
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-lg-6 col-12">
                        <?php echo the_field('work_text'); ?>
                    </div>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </section>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
