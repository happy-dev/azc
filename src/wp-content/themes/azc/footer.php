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
$lang = get_bloginfo("language");

$legal_notice = ($lang === 'fr-FR'
  ? [
    'url' => esc_url(home_url('/mentions-legales')),
    'text' => 'Mentions légales'
  ] : [
    'url' => esc_url(home_url('/legal-notice')),
    'text' => 'Legal notice'
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
      <p><span>AZC Architectes</span> <span>|</span>
        <span><a href="https://www.google.fr/maps/place/15,+17+Rue+Vulpian,+75013+Paris/">15/17 rue Vulpian 75013 Paris</a></span>
        <span>|</span>
        <span><a href="tel:+33155252494"> +33 1 55 25 24 94</a></span>
        <span>|</span>
        <span><a href="mailto:agence@azc.archi">agence@azc.archi</a></span>
        <span>|</span>
        <span>Crédits : AZC 2019</span>
        <span>|</span>
        <span>
          <a href="<?= $legal_notice['url'] ?>"><?= $legal_notice['text'] ?></a>
        </span>
        <span>|</span>
    </div>
  </div>
</footer>
</body>

</html>