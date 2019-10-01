<?php

/*
 * Require custom post types
 */
require_once 'resources/post-types/post-work.php';
require_once 'resources/post-types/post-news.php';
require_once 'resources/post-types/post-index.php';

function azc_register_css() {
  $template_Uri = get_template_directory_uri();
  wp_enqueue_style('bootstrap.min', $template_Uri . '/resources/assets/styles/bootstrap.min.css');
  wp_enqueue_style('style', $template_Uri . '/style.css');
}
add_action('wp_enqueue_scripts', 'azc_register_css');

function azc_register_js() {
  $template_URI = get_template_directory_uri();
  $base_scripts = "$template_URI/resources/assets/scripts";

  wp_enqueue_script('bootstrap.min', "$base_scripts/bootstrap.min.js", ['jquery'], null, true);
  wp_enqueue_script('owl.js', "$base_scripts/owl.carousel.js");
  wp_enqueue_script('owl-navigation.js', "$base_scripts/owl.navigation.js");
  wp_enqueue_script('imagesloaded.pkgd.min.js', "$base_scripts/imagesloaded.pkgd.min.js");
  wp_enqueue_script('masonry.pkgd.min', "$base_scripts/masonry.pkgd.min.js");
  wp_enqueue_script('jquery.scrollbar.min', "$base_scripts/jquery.scrollbar.min.js");
  wp_enqueue_script('script', "$base_scripts/script.js", ['jquery'], null, true);
}
add_action('init', 'azc_register_js');

function register_primany_menu() {
  register_nav_menu('primary_navigation', __('Primary navigation'));
}
add_action('init', 'register_primany_menu');

add_theme_support('post-thumbnails', ['postwork', 'postnews', 'postindex']);


/** PHP function to display posts pagination in Index Page */
function pagination(WP_Query $query, int $paged=1) {
  $range = 2;
  $morepages = ($range * 2) + 1;

  $pages = $query->max_num_pages ? $query->max_num_pages : 1;

  if ($pages !== 1) {
    echo '<div class="pagination">';

    for ($i = 1; $i <= $pages; $i++) {
      if ($pages !== 1
        && (!($i >= $paged + $range + 1
          || $i <= $paged - $range - 1)
          || $pages <= $morepages)) {
        $page_num =  get_pagenum_link($i);
        echo "<a href=\"$page_num\" class=\"page-number\">$i</a>";
      }
    }

    echo '</div>';
  }
}

/**
 * Add defer attribute on all JavaScript files
 *
 * Ref:
 * - https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 * - https://www.growingwiththeweb.com/2014/02/async-vs-defer-attributes.html
 */
function add_defer(string $tag) {
    return str_replace(' src', ' defer="defer" src', $tag);
}
add_filter('script_loader_tag', 'add_defer', 10, 2);





/*  Widget */

/**
 * Register our sidebars and widgetized areas.
 */
function language_switcher_widgets_init() {
  $sidebar_options = [
    'name'          => 'Language_switcher',
    'id'            => 'language_switcher',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ];
  register_sidebar($sidebar_options);
}
add_action('widgets_init', 'language_switcher_widgets_init');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// Add featured image sizes
add_image_size('featured-large', 640, 294, true); // width, height, crop
add_image_size('featured-small', 320, 147, true);

// Add other useful image sizes for use through Add Media modal
add_image_size('medium-width', 480);
add_image_size('medium-height', 9999, 480);
add_image_size('medium-something', 480, 480);

/**
 * Register the three useful image sizes for use in Add Media modal
 */
function wpshout_custom_sizes(array $sizes): array {
  $images_sizes = [
    'medium-width' => __('Medium Width'),
    'medium-height' => __('Medium Height'),
    'medium-something' => __('Medium Something'),
  ];
  return array_merge($sizes, $images_sizes);
}
add_filter('image_size_names_choose', 'wpshout_custom_sizes');
