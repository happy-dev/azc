<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";

get_header();?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">

        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#awards">Awards</a></li>
            <li><a href="#jobs">Jobs</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#wao">WAO ®</a></li>
        </ul>

        <h2 id="about">About</h2>
        <div class="container-fluid">
            <div class="row">
                <?php if( have_rows('about_slider_all_pictures') ): ?>
                    <div class="owl-carousel owl-theme col-6">
                        <?php while( have_rows('about_slider_all_pictures') ): the_row();
                            $image = get_sub_field('about_slider_one_picture'); ?>
                            <div class="item">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif;
                wp_reset_postdata(); ?>

                <div class="col-6">
                    <?php echo the_field('about_text'); ?>
                </div>
            </div>
        </div>

        <h2 id="team">Team</h2>
        <h2 id="awards">Awards</h2>
        <h2 id="jobs">Jobs</h2>
        <h2 id="contact">Contact</h2>
        <h2 id="wao">WAO ®</h2>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("azc"); ?>


