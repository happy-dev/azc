<?php

/* Template Name: News */

$GLOBALS['templateName'] = "news";

get_header();

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$news = get_news($paged);
?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <ul class="navbar-subnav">
            <li class="azc"><a class="about-link" href="azc">Info</a></li>
            <li class="news"><a class="about-link" href="news">News</a></li>
            <li class="page-index"><a class="about-link " href="index">Index</a></li>
        </ul>
        <?php if ( $news->have_posts() ): ?>
        <ul id="news-list" class="news-list">
        <?= news_list($news); ?>
        </ul>
        <?php endif; ?>
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


