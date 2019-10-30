<?php

function footer_style(): string {
  if (is_page('News')) {
    return 'style="background-color:' . get_field('bckg_news_color') . '"';
  } else if (is_page('Index')) {
    return 'style="background-color:' . get_field('bckg_index_color') . '"';
  } else {
    return '';
  }
}

/**
 * Construct a social icon component.
 * @param array $props: properties of the component
 *
 * - alt: alternative text
 * - width: image width
 * - height: image height
 * - src: source of the image relative to /img/
 * - href: link to social account
 */
function social_icon(array $props): string {
  $template = get_template_directory_uri();
  $image_name = $props["src"];
  $src = "$template/img/$image_name";
  ob_start();
  ?>
  <a href="<?= $props["href"] ?>" target="_blank" rel="noopener"><img class="alignnone size-thumbnail"
    src="<?= $src ?>"
    alt="<?= $props["alt"] ?? "Icon" ?>"
    width="<?= $props["width"] ?? 50 ?>"
    height="<?= $props["height"] ?? 50 ?>" />
  </a>
  <?php
  return ob_get_clean();
}

$lang = get_bloginfo("language");

$legal_notice = ($lang === 'fr-FR'
  ? [
    'url' => esc_url(home_url('/mentions-legales')),
    'text' => 'Mentions légales'
  ] : [
    'url' => esc_url(home_url('/legal-notice')),
    'text' => 'Legal notice'
  ]);

$instagram_icon = social_icon([
  "href" => "https://www.instagram.com/azc_architects/?hl=fr",
  "src" => "instagram.png",
  "alt" => "Icône Instagram",
  "width" => 16,
  "height" => 16,
]);

$facebook_icon = social_icon([
  "href" => "https://www.facebook.com/azc.architectes/",
  "src" => "facebook.png",
  "alt" => "Icône Facebook",
  "width" => 16,
  "height" => 16,
]);

$pinterest_icon = social_icon([
  "href" => "https://www.pinterest.fr/zundelcristea/",
  "src" => "pinterest.png",
  "alt" => "Icône Pinterest",
  "width" => 16,
  "height" => 16,
]);

?>
<footer <?= footer_style() ?>>
  <?php wp_footer(); ?>
  <div class="block-footer d-flex p-20 flex-wrap flex-row-reverse justify-content-end">
    <div class="d-flex flex-wrap lang">
      <!-- Language Switcher -->
      <?php if (is_active_sidebar('language_switcher')) : ?>
        <div id="footer-widget-area" role="complementary">
          <?php dynamic_sidebar('language_switcher'); ?>
        </div>
      <?php endif; ?>
      <!-- Fin Language Switcher -->
    </div>

    <div class="d-flex flex-wrap">

    <address><span>AZC Architectes</span><span>|</span>
      <span><a href="https://www.google.fr/maps/place/15,+17+Rue+Vulpian,+75013+Paris/">15/17 rue Vulpian 75013 Paris</a></span>
      <span>|</span>
      <span><a href="tel:+33155252494">+33 1 55 25 24 94</a></span>
      <span>|</span>
      <span><a href="mailto:agence@azc.archi">agence@azc.archi</a></span>
      <span>|</span>
      <span>Crédits : AZC 2019</span>
      <span>|</span>
      <span><a href="<?= $legal_notice['url'] ?>"><?= $legal_notice['text'] ?></a></span>
      <span>|
      <?= $instagram_icon ?>
      <?= $facebook_icon ?>
      <?= $pinterest_icon ?>
    </address>
    </div>
  </div>
</footer>
</body>

</html>