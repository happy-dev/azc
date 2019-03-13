<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";

get_header();?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <ul class="navbar-subnav">
            <li><a class="about-link" href="#about">About,</a></li>
            <li><a class="team-link" href="#team">Team,</a></li>
            <li><a class="awards-link" href="#awards">Awards,</a></li>
            <li><a class="jobs-link" href="#jobs">Jobs,</a></li>
            <li><a class="contact-link" href="#contact">Contact,</a></li>
            <li><a class="wao-link" href="">WAO ®</a></li>
        </ul>

        <section class="container-fluid azc-section" id="about">
            <div class="row">
                <div class="col-lg-6 col-12 p-20">
                    <?php if( have_rows('about_slider_all_pictures') ): ?>
                        <div class="owl-carousel owl-theme">
                            <?php while( have_rows('about_slider_all_pictures') ): the_row();
                                $image = get_sub_field('about_slider_one_picture'); ?>
                                <div class="item">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" />
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
                <div class="col-lg-6 col-12 p-20">
                    <div class="about-resize about-text col-xl-6 col-12 pl-0">
                        <h2>About</h2>
                        <div class="display-about">
                            <?php echo the_field('about_text'); ?>
                        </div>
                    </div>
                    <p class="about-more">+</p>
                    <p class="about-less hide">-</p>
                </div>
                
            </div>
        </section>
        <section class="container-fluid azc-section" id="team">
            <div class="row">
                <div class="col-lg-6 col-12 p-20">
                    <?php $teamPhoto = get_field('team_photo');
                    if( !empty($teamPhoto) ): ?>
                        <img src="<?php echo $teamPhoto['url']; ?>" alt="<?php echo $teamPhoto['alt']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-12 p-20">
                    <div class="team-resize team-text col-xl-6 col-12 pl-0">
                        <h2>Team</h2>
                        <div class="team-column">
                            <div class="display-team">
                                <?php echo the_field('team_text'); ?>
                            </div>
                        </div>
                    </div>
                    <p class="more-team">+</p>
                    <p class="less-team hide">-</p>
                </div>
            </div>
        </section>
        <section class="container-fluid azc-section" id="awards">
            <div class="row">
                <div class="col-12 p-20">
                    <h2 class="pl-0">Awards & exhibitions</h2>
                    <div class="awards-resize awards-text pl-0">
                        <?php echo the_field('awards_text'); ?>
                    </div>
                    <p class="more-awards">+</p>
                    <p class="less-awards hide">-</p>
                </div>
            </div>
        </section>
        <section class="container-fluid azc-section" id="jobs">
            <div class="row">
                <div class="col-lg-6 col-12 p-20">
                    <?php $jobsPhoto = get_field('jobs_photo');
                    if( !empty($jobsPhoto) ): ?>
                        <img src="<?php echo $jobsPhoto['url']; ?>" alt="<?php echo $jobsPhoto['alt']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-12 p-20">
                    <div class="job-resize job-text">
                        <h2>Jobs</h2>
                        <p><?php echo the_field('jobs_text'); ?></p>
                    </div>                    
                    <p class="more-job">+</p>
                    <p class="less-job hide">-</p>
                </div>
            </div>
        </section>
        <section class="container-fluid azc-section mb-4" id="stages">
            <div class="row">
                <div class="col-lg-6 col-12 p-20">
                    <?php $stagePhoto = get_field('stage_photo');
                    if( !empty($stagePhoto) ): ?>
                        <img src="<?php echo $stagePhoto['url']; ?>" alt="<?php echo $stagePhoto['alt']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-12 p-20">
                    <div class="stage-resize stage-text">
                        <h2>Stage</h2>
                        <p><?php echo the_field('stage_text'); ?></p>
                    </div>                                     
                    <p class="more-stages">+</p>
                    <p class="less-stages hide">-</p>
                </div>
            </div>
        </section>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("azc"); ?>


