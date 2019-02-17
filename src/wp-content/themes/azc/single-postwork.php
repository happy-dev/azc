<?php

$GLOBALS['templateName'] = "singleWorks";

get_header();?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <ul class="categories-filters navbar-subnav">
            <?php
            global $post;
            
            $terms = get_terms('workfilter');
            $singleTerms = get_the_terms($post->ID, 'workfilter');
            foreach($singleTerms as $singleTerm){}
            
            foreach ($terms as $term) {
                if ( $term->slug == $singleTerm->slug ) {
                    echo '<li class="current-cat">'.$term->name.'</li>';
                }
                else {
                    echo '<li>'.$term->name.'</li>';
                }
            }
            ?>
        </ul>

        <ul class="categories-filters second-categories-list navbar-subnav">
            <?php
            $terms2 = get_terms('workfiltercondition');
            $singleTerms2 = get_the_terms($post->ID, 'workfiltercondition');
            if( has_term( '', 'workfiltercondition' ) ) {
                foreach($singleTerms2 as $singleTerm2){}
            }

            foreach ($terms2 as $term2) {
                if ( $term2->slug == $singleTerm2->slug ) {
                    echo '<li class="current-cat">'.$term2->name.'</li>';
                }
                else {
                    echo '<li>'.$term2->name.'</li>';
                }
            }
            ?>
        </ul>

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
