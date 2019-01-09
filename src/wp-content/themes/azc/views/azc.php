<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";

get_header();?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <ul class="navbar-subnav">
            <li><a href="#about">About,</a></li>
            <li><a href="#team">Team,</a></li>
            <li><a href="#awards">Awards,</a></li>
            <li><a href="#jobs">Jobs,</a></li>
            <li><a href="#contact">Contact,</a></li>
            <li><a href="">WAO ®</a></li>
        </ul>

        <div class="container-fluid mt-5" id="about">
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
                    <h2>About</h2>
                    <?php echo the_field('about_text'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="team">
            <div class="row">
                <div class="col-6">
                     <img src="<?php echo get_template_directory_uri(); ?>/img/team.jpg"/>
                </div>
                <div class="col-6">
                    <h2>Team</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="awards">
            <div class="row">
            <h2>Awards</h2>
            </div>
        </div>
        <div class="container-fluid mt-4" id="jobs">
            <div class="row">
                <div class="col-6"><img src="<?php echo get_template_directory_uri(); ?>/img/Stefan_Tuchila_16_K3_3403.jpg"/></div>
                <div class="col-6">
                    <h2>Jobs</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4 mb-4" id="stages">
            <div class="row">
                <div class="col-6"><img src="<?php echo get_template_directory_uri(); ?>/img/Stefan_Tuchila_17_K3_3404.jpg"/></div>
                <div class="col-6">                
                    <h2>Stages</h2>
                </div>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("azc"); ?>


