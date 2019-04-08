        <footer>
            <?php wp_footer(); ?>
            <div class="block-footer d-flex p-20 flex-wrap">
                <p>AZC Architectes</p>
                <p>|</p>
                <p> 15/17 rue Vulpian 75013 Paris</p>
                <p>|</p>
                <a href="tel:+33155252525"> +33 1 55 25 25 25</a>
                <p>|</p>
                <a href="mailto:contact@azc.archi">contact@azc.archi</a>
                <p>|</p>
                <p> Crédits : AZC 2018</p>
                <p>|</p>
                <?php $lang = get_bloginfo("language");
                if ( $lang == 'fr-FR' ) { ?>
                    <a href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>"> Mentions Légales</a>
                <?php }
                else if ( $lang == 'en-GB' ) { ?>
                    <a href="<?php echo esc_url( home_url( '/legal-notice' ) ); ?>">legal notice</a>
                <?php } ?>
                <!-- Language Switcher -->
                <?php if ( is_active_sidebar( 'language_switcher' ) ) : ?>
                    <div id="footer-widget-area" role="complementary">
                        <?php dynamic_sidebar( 'language_switcher' ); ?>
                    </div>
                <?php endif; ?>
                <!-- Fin Language Switcher -->
            </div>
        </footer>
    </body>
</html>