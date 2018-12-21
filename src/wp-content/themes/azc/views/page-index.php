<?php

/* Template Name: Page Index */

get_header();

/***** Loop to display index list *****/

$postsIndex = new \WP_Query([
    'post_type' => 'postindex',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
]);

?>
<div class="custom-background"></div>
<ul class="">
    <?php
    $letter = '';
    if ( $postsIndex->have_posts() ):
        while ( $postsIndex->have_posts() ) : $postsIndex->the_post();
            // Check the current letter is the same that the first of the title
            if($letter != strtoupper(get_the_title()[0]))
            {
                echo ($letter != '') ? '</ul></div>' : '';
                $letter = strtoupper(get_the_title()[0]);
                echo '<div><ul><h4>'.strtoupper(get_the_title()[0]).'</h4>';
            }

            echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
        endwhile;
    endif;
    ?>
</ul>

<?php get_footer(); ?>
