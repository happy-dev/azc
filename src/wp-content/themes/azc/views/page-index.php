<?php

/* Template Name: Page Index */

$GLOBALS['templateName'] = "page-index";

get_header();?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">

                <?php

                /***** Loop to display index list *****/

                $postsIndex = new \WP_Query([
                    'post_type' => 'postindex',
                    'post_status' => 'publish',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => 15,
                    'paged' => $paged,
                ]);

                $letter = '';
                if ( $postsIndex->have_posts() ): ?>

                    <ul class="postindex-list">

                    <?php while ( $postsIndex->have_posts() ) : $postsIndex->the_post();
                        // Check the current letter is the same that the first of the title
                        if($letter != strtoupper(get_the_title()[0]))
                        {
                            echo ($letter != '') ? '</ul></div>' : '';
                            $letter = strtoupper(get_the_title()[0]);
                            echo '<div><ul class="postindex-list-data"><h4>'.strtoupper(get_the_title()[0]).'</h4>';
                        }

                        echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                    endwhile; ?>

                    </ul>

                <?php endif;
                wp_reset_postdata();

                ?>
                    <div class="text-right">

                    <?php

                    echo paginate_links(array(
                        'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
                        'current' => max(1, get_query_var('paged')),
                        'format' => 'page/%#%',
                        'total' => $postsIndex->max_num_pages,
                        'prev_next' => false,
                    )); ?>

                    </div>
                </div>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("bg-white"); ?>
