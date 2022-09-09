<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";
$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

get_header();
?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
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
                        </div>
		    <?php endwhile; ?>
                    <div id="instagram" class="grid-item">
                        <h2><a href="https://www.instagram.com/azc_architects/?hl=fr" target="_blank">INSTRAGRAM</a></h2>
		    </div>
	         <?php endif; ?>
	    </div>            
            <div class="row haut justify-content-end text-uppercase text-right">
                <a href="#primary" class="text-black"><?= $top_string ?></a>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
