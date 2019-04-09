        <footer>
            <?php wp_footer(); ?>
            <div class="block-footer d-flex p-20 flex-wrap flex-row-reverse justify-content-end">
                <div class= "d-flex flex-wrap lang">
                    <!-- Language Switcher -->
                    <?php if ( is_active_sidebar( 'language_switcher' ) ) : ?>
                        <div id="footer-widget-area" role="complementary">
                            <?php dynamic_sidebar( 'language_switcher' ); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Fin Language Switcher -->
                </div>
                <div class= "d-flex flex-wrap">
                    <p><span>AZC Architectes</span> <span>|</span>
                    <span>15/17 rue Vulpian 75013 Paris</span>
                    <span>|</span>
                    <span><a href="tel:+33155252525"> +33 1 55 25 25 25</a></span>
                    <span>|</span>
                    <span><a href="mailto:contact@azc.archi">contact@azc.archi</a></span>
                    <span>|</span>
                    <span>Crédits : AZC 2018</span>
                    <span>|</span>
                    <span>
                    <?php $lang = get_bloginfo("language");
                    if ( $lang == 'fr-FR' ) { ?>
                        <a href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>"> Mentions Légales</a>
                    <?php }
                    else if ( $lang == 'en-GB' ) { ?>
                        <a href="<?php echo esc_url( home_url( '/legal-notice' ) ); ?>">legal notice</a>
                    <?php } ?></span>
                </div>
            </div>
        </footer>
    </body>
</html>