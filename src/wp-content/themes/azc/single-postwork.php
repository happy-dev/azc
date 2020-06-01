<?php

$GLOBALS['templateName'] = "singleWorks";

// HACK: fixme! It's a ugly hack this should be se inside wordpress not here...
// But it needed a quick fix. the real solution need a refactoring
// of this view.
$list_name = get_locale() === 'fr_FR' ? 'Liste' : 'List';

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="submenu-work">
            <ul class="categories-filters navbar-subnav-work">
                <?php
                global $post;
                
                if( has_term( '', 'workfilter' ) ) {
                    $singleTerms = get_the_terms($post->ID, 'workfilter');
                }
                else {
                    $singleTerms[] = null;
                }
                
                $terms = get_terms('workfilter');
                foreach($terms as $term){
                    $termLink = add_query_arg( 'var1', $term->slug, get_site_url().'/works' );
                    if (in_array($term, $singleTerms)) {
                        echo '<li class="current-cat"><a href="'.$termLink.'">'.$term->name.'</a></li>';
                    }
                    else {
                        echo '<li><a href="'.$termLink.'">'.$term->name.'</a></li>';
                    }
                }
                
                if( has_term( '', 'workfiltercondition' ) ) {
                    $singleTerms2 = get_the_terms($post->ID, 'workfiltercondition');
                }
                else {
                    $singleTerms2[] = null;
                }
                
                $terms2 = get_terms('workfiltercondition');
                foreach ($terms2 as $term2) {
                    $term2Link = add_query_arg('var2', $term2->slug, get_site_url().'/works');
                    if (in_array($term2, $singleTerms2)) {
                        echo '<li class="current-cat"><a href="'.$term2Link.'">'.$term2->name.'</a></li>';
                    }
                    else {
                        echo '<li><a href="'.$term2Link.'">'.$term2->name.'</a></li>';
                    }
                }
                ?>
                <li><a href="<?= get_site_url() ?>/works#works-list" class="list-link"><?= $list_name ?></a></li>
            </ul>
        </div>

        <section class="container-fluid">
            <div class="row">
                <?php if( have_rows('slider_all_pictures') ): 
                $slidid = 0; 
                $imgid = 0; 
                ?>
                <div id="carouselwork" class="carousel work-single" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <?php while( have_rows('slider_all_pictures') ): the_row();
                         $image = get_sub_field('slider_one_picture'); 
                        $slidid = $slidid + 1;
                        ?>
                        <div class="carousel-item <?php if ($slidid == 1) { ?> active <?php }?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php echo do_shortcode( "[wp_social_sharing social_options='pinterest' pinterest_text='' icon_order='p' show_icons='1' before_button_text='' text_position='' social_image='".$image['url']."']" ); ?>
                        </div>
                        <?php endwhile; ?>
                        <div class="img-work-caract d-flex justify-content-center">
                            <p><?php echo get_the_title(); ?> - </p>
                            <div class="counter"> <span class="count-nb"></span>/<span class="total"></span>
                        </div>
                    </div>
                    <a class="carousel-control-prev carousel-control" href="#carouselwork" role="button" data-slide="prev"></a>
                    <a class="carousel-control-next carousel-control" href="#carouselwork" role="button" data-slide="next"></a>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="work-text onright">
                <div class="arrow">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png"/>                
                </div>
                <div class="work-exponation">
                    <h2><?php echo get_the_title(); ?></h2>
                    <h2><?php echo the_field('work_place'); ?></h2>
                    <p><?php echo the_field('work_text'); ?></p>
                </div>
            </div>
        </section>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
