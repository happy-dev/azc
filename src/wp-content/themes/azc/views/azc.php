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
                    <div class ="about-text">
                        <?php echo the_field('about_text'); ?>
                        <div class="more">+</div>
                        <div class="less">-</div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="team">
            <div class="row">
                <div class="col-6">
                    <?php $teamPhoto = get_field('team_photo');
                    if( !empty($teamPhoto) ): ?>
                        <img src="<?php echo $teamPhoto['url']; ?>" alt="<?php echo $teamPhoto['alt']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-3">
                    <h2>Team</h2>
                    <p><?php echo the_field('team_text'); ?></p>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="awards">
            <div class="row">
                <div class="col-12">
                    <h2>Awards & exhibitions</h2>
                    <div class="awards-text">
                        <?php echo the_field('awards_text'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="jobs">
            <div class="row">
                <div class="col-6">
                    <?php $jobsPhoto = get_field('jobs_photo');
                    if( !empty($jobsPhoto) ): ?>
                        <img src="<?php echo $jobsPhoto['url']; ?>" alt="<?php echo $jobsPhoto['alt']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <h2>Jobs</h2>
                    <p><?php echo the_field('jobs_text'); ?></p>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4 mb-4" id="stages">
            <div class="row">
                <div class="col-6">
                    <?php $stagePhoto = get_field('stage_photo');
                    if( !empty($stagePhoto) ): ?>
                        <img src="<?php echo $stagePhoto['url']; ?>" alt="<?php echo $stagePhoto['alt']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <h2>Stage</h2>
                    <p><?php echo the_field('stage_text'); ?></p>
                </div>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("azc"); ?>


