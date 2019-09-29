<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

get_header();

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$news = new \WP_Query(array(
    'post_type' => 'postnews',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 15,
    'paged' => $paged,
));

$pagination_args = [
    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    'total'        => $news->max_num_pages,
    'current'      => max( 1, get_query_var( 'paged' ) ),
    'format'       => '?paged=%#%',
    'show_all'     => false,
    'type'         => 'plain',
    'end_size'     => 2,
    'mid_size'     => 1,
    'prev_next'    => false,
    'prev_text'    => false,
    'add_args'     => false,
    'add_fragment' => '',
];
?>

<section id="primary" class="content-area mt-navb" style="background-color:<?php the_field('bckg_news_color'); ?>">
    <main id="main" class="site-main">
        <?php if ( $news->have_posts() ): ?>
        <ul id="news-list" class="news-list">
        <?= news_list($news); ?>
        </ul>
        <?php endif; ?>

        <div class="container-fluid p-20">
            <div class="row haut justify-content-end text-uppercase text-right">
                <?= paginate_links($pagination_args); ?>
                <a href="<?= get_permalink(); ?>"><?= $top_string ?></a>
            </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>


