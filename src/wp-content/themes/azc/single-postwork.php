<?php

$GLOBALS['templateName'] = "singleWorks";

get_header();?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="container-fluid">
            <div class="row">
                <?php if( have_rows('slider_all_pictures') ): ?>
                    <div class="owl-carousel owl-theme work-single">
                        <?php while( have_rows('slider_all_pictures') ): the_row();
                            $image = get_sub_field('slider_one_picture'); ?>
                            <div class="item">
                                <img src="<?php echo $image['url']; ?>" alt="" />
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
            <div class="work-text onright">
                <div class="arrow">></div>
                <div class="work-exponation">
                    <h1><?php echo get_the_title(); ?></h1>
                    <div class="subtitle"><?php echo the_field('work_place'); ?></div>
                    <p><?php echo the_field('work_text'); ?></p>
                </div>
            </div>
        </section>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
