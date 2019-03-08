        <footer class="footer-bg-white">
            <div class="block-footer">
                <div class="footer-logo">
                    <p class="azc-logo-footer">AZC</p>
                    <p>Architecte</p>
                </div>
                <div class="footer-contact">
                    <p>
                        15/17 rue vulpian 75013 Paris
                        <br/>
                        +33 1 55 25 25 25
                        <a href="mailto:contact@azc.archi">contact@azc.archi</a>
                    </p>
                    <p>credits : AZC 2018</p>
                    <a href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>">mentions légales</a>
                </div>
                <!-- Language Switcher -->
                <?php if ( is_active_sidebar( 'language_switcher' ) ) : ?>
                    <div id="header-widget-area" class="nwa-header-widget widget-area" role="complementary">
                        <?php dynamic_sidebar( 'language_switcher' ); ?>
                    </div>
                <?php endif; ?>
                <!-- Fin Language Switcher -->
                <div class="social-link">
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png"/>
                    </div>
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"/>
                    </div>
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/instagram.png"/>
                    </div>
                    <div class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.png"/>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
	