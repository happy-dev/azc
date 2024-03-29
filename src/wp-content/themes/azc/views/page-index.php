<?php

/* Template Name: Page-Index */

$GLOBALS['templateName'] = "page-index";

function get_postIndex(string $var1, int $paged = 1) {
    $base_opt = [
        'post_type' => 'postindex',
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
        'paged' => $paged,
    ];

    $opts = (($var1 !== '') ? [
        'posts_per_page' => 3,
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'indexcategory',
                'field' => 'name',
                'terms' => $var1,
            ],
        ]
    ] : [
        'posts_per_page' => 10,
    ]);
    return new WP_Query(array_merge($base_opt, $opts));
}

$var1 = filter_var($_GET['var1'] ?? '', FILTER_SANITIZE_STRING);
get_header();?>

<section id="primary" class="content-area mt-navb">
<style>
/* HACK: FIXME: in the future a standard native way
 * to style scrollbar may appear.
 * Hide native scrollbar on firefox.
 */
.scrollbar-macosx {
  scrollbar-width:none;
  overflow: -moz-scrollbars-none;
}
/*
 * Hide ugly x scrollbar that appear if I hide native scrollbar.
 */
.scroll-element.scroll-x {
  display: none !important;
}
</style>
    <main id="main" class="site-main">
        <ul class="navbar-subnav">
        <li class="azc"><a class="about-link" href="azc">Info</a></li>
            <li class="news"><a class="about-link" href="news">News</a></li>
            <li class="page-index"><a class="about-link " href="index">Index</a></li>
        </ul>
        <div class="container-fluid">
            <div class="row row-index">
                <div class="col-md-6 col-12 index-post mobile-hide p-20 scrollbar-macosx">
                    <?php
                    
                    /***** Loop to display post index list *****/
                    
                    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $postsIndex = get_postIndex($var1, $paged);

                    if ( $postsIndex->have_posts() ): ?>

                        <ul class="postindex-list pl-0">

                            <?php while ( $postsIndex->have_posts() ) : $postsIndex->the_post(); ?>
                                <li>
                                   <div class="title"><?php echo get_the_title(); ?></div>
                                   <?php $lang = get_bloginfo("language");
                                    if ( $lang == 'fr-FR' ) {
                                        ?><span>par <?php echo the_field('author'); ?></span><?php
                                    }
                                    else if ( $lang == 'en-GB' ) {
                                        ?><span>by <?php echo the_field('author'); ?></span><?php
                                    }
                                    ?><p><?php echo the_field('resume'); ?></p>
                                    <div class="index-content hide" id="<?php echo get_the_id(); ?>-content"><?php echo get_the_content(); ?></div>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/add.png" class="index-plus" id="<?php echo get_the_id(); ?>"/>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/less.png" class="index-moins hide" id="<?php echo get_the_id(); ?>"/>
                                </li>
                            <?php endwhile; ?>

                        </ul>

                    <?php endif;
                    wp_reset_postdata();

                    /*  Call function for posts pagination */

                    pagination($postsIndex, $paged); ?>

                </div>

                <div class="col-lg-3 col-0"></div>
                <div class="col-md-6 col-lg-3 col-12 index-cat p-20 scrollbar-macosx">

                    <?php

                    /***** Loop to display taxonomy index list *****/

                    $terms = get_terms(array(
                        'taxonomy' => 'indexcategory',
                    ));

                    $letter = '';
                    if( $terms ): ?>

                    <ul class="indexterms-filters">

                        <?php foreach( $terms as $term ):

                        if($letter != strtoupper($term->name[0]))
                        {
                            echo ($letter != '') ? '</ul></div>' : '';
                            $letter = strtoupper($term->name[0]);
                            echo '<div><ul class="postindex-list-data"><h4>'.strtoupper($term->name[0]).'</h4>';
                        }

                        $termLink = add_query_arg( 'var1', $term->name, get_permalink() );
                        echo '<li><a href="'.$termLink.'">'.$term->name.'</a></li>';

                        //echo '<li><a href="'.get_term_link($term->slug, 'indexcategory').'">'.$term->name.'</a></li>';

                        endforeach; ?>

                    </ul>

                    <?php endif;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>
