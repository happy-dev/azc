<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";

get_header();?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <ul class="navbar-subnav"><?php
            if( have_rows('tuiles') ):
                $tuileid = 0;
                while( have_rows('tuiles') ): the_row();
                    $tuileid = $tuileid + 1;
                    ?><li><a class="about-link" href="#<?php echo $tuileid; ?>"><?php echo the_sub_field('tuile_title'); ?></a></li><?php
                endwhile;
            endif;
            ?><li><a class="about-link" href="https://www.wild.paris/">WAO ®</a></li><?php
        ?></ul>

        <div class="container-fluid p-20 mt-5 pt-3">
            <div class="grid mb-5"><?php
                if( have_rows('tuiles') ):
                    $tuileid = 0;
                    while( have_rows('tuiles') ): the_row();
                        $tuileid = $tuileid + 1;
                        ?><div class="grid-item">
                            <img src="<?php the_sub_field('tuile_image'); ?>" />
                        </div>
                        <div id="<?php echo $tuileid; ?>" class="grid-item">
                            <h2><?php the_sub_field('tuile_title');?></h2><?php
                            the_sub_field('tuile_content');
                        ?></div><?php
                    endwhile;
                endif;
                ?></div>            
            <div class="row haut justify-content-end text-uppercase text-right">
                <a href="#primary" class="text-black">Haut</a>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>


