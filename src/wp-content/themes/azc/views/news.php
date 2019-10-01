<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

$top_string = get_locale() === 'fr_FR' ? 'Haut' : 'Top';

get_header();

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$news = get_news($paged);
?>

<section id="primary" class="content-area mt-navb" style="background-color:<?= get_field('bckg_news_color'); ?>">
    <main id="main" class="site-main">
        <?php if ( $news->have_posts() ): ?>
        <ul id="news-list" class="news-list">
        <?= news_list($news); ?>
        </ul>
        <?php endif; ?>

        <div class="container-fluid p-20">
            <div class="row haut justify-content-end text-uppercase text-right">
                <a href="<?= get_permalink(); ?>"><?= $top_string ?></a>
            </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<script>
/* Page already rendered server side */
window.pageOffset = <?= 1 ?>
/* Total of page to fetch */
window.total = <?= $news->max_num_pages ?>;
/* Url of the ajax callsite. */
window.admin_url = "<?= admin_url() ?>";
</script>

<?php get_footer(); ?>


