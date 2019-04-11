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
            <li><a class="stages-link" href="#stages">Stages,</a></li>
            <li><a class="wao-link" href="">WAO ®</a></li>
        </ul>

        <div class="container-fluid p-20 mt-5 pt-3">
            <div class="grid mb-5">
                <?php if( have_rows('tuiles_about') ):
                    $tuileid = 0;
                    while( have_rows('tuiles_about') ): the_row();
                        $tuileid = $tuileid + 1; ?>
                        <div class="grid-item" <?php if ($tuileid == 1) { echo 'id="about"';}; ?> >
                            <?php the_sub_field('tuile_about'); ?>
                        </div>
                    <?php endwhile; 
                endif; ?>
                <?php if( have_rows('tuiles_team') ):
                    $tuileid = 0;
                    while( have_rows('tuiles_team') ): the_row();
                        $tuileid = $tuileid + 1; ?>
                        <div class="grid-item" <?php if ($tuileid == 1) { echo 'id="team"';}; ?> >
                            <?php the_sub_field('tuile_team'); ?>
                        </div>
                    <?php endwhile; 
                endif; ?>
                <?php if( have_rows('tuiles_awards') ):
                    $tuileid = 0;
                    while( have_rows('tuiles_awards') ): the_row();
                        $tuileid = $tuileid + 1; ?>
                        <div class="grid-item" <?php if ($tuileid == 1) { echo 'id="awards"';}; ?> >
                            <?php the_sub_field('tuile_awards'); ?>
                        </div>
                    <?php endwhile; 
                endif; ?>
                <?php if( have_rows('tuiles_jobs') ):
                    $tuileid = 0;
                    while( have_rows('tuiles_jobs') ): the_row();
                        $tuileid = $tuileid + 1; ?>
                        <div class="grid-item" <?php if ($tuileid == 1) { echo 'id="jobs"';}; ?> >
                            <?php the_sub_field('tuile_jobs'); ?>
                        </div>
                    <?php endwhile; 
                endif; ?>
                <?php if( have_rows('tuiles_stages') ):
                    $tuileid = 0;
                    while( have_rows('tuiles_stages') ): the_row();
                        $tuileid = $tuileid + 1; ?>
                        <div class="grid-item" <?php if ($tuileid == 1) { echo 'id="stages"';}; ?> >
                            <?php the_sub_field('tuile_stages'); ?>
                        </div>
                    <?php endwhile; 
                endif; ?>
            </div>            
            <div class="row haut justify-content-end text-uppercase text-right font-weight-bold p-20">
                <a href="#primary" class="text-black">Haut</a>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>


