<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

get_header();
?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <ul class="navbar-subnav">
            <li><a class="about-link" href="news">News</a></li>
            <li><a class="about-link" href="index">Index</a></li>
            <li><a class="about-link" href="#rseauxsociaux">Réseaux sociaux</a></li>
        </ul>

        <div class="container-fluid p-20">
            <div class="grid mb-5"><?php
                if( have_rows('tuiles') ):
                    while( have_rows('tuiles') ): the_row(); 
                        ?><div class="grid-item">
                            <img src="<?php the_sub_field('tuile_image'); ?>" />
                        </div>
                        <div id="<?php echo strtolower(sanitize_html_class(get_sub_field('tuile_title'))); ?>" class="grid-item">
                            <h2><?php the_sub_field('tuile_title');?></h2>
                            <div class="tuile_content"><?php
                                the_sub_field('tuile_content');
                            ?></div>
                        </div><?php
                    endwhile;
                endif;
                ?></div>            
            <div class="row haut justify-content-end text-uppercase text-right">
                <a href="#primary" class="text-black"><?= $top_string ?></a>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>


