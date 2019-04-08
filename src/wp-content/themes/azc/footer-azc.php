        <footer class="footer-bg-white" id="contact">
            <div class="block-footer-AZC">
                <p>CONTACT</p>
                <div class="row">
                    <div class="row row-reverse col-xl-6 col-sm-11 col-12">
                        <div class="col-xl-8 col-sm-6 col-12">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/carte.jpg"/>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 d-flex flex-column justify-content-between">                    
                            <div class="footer-contact">
                                <p>15/17 rue vulpian<br/>
                                75013 Paris</p>
                                <p class="mt-3">T +33 1 55 25 25 25<br/>
                                F +33 1 43 73 02 82</p>
                                <p class="mt-3"><a href="mailto:contact@azc.archi">contact@azc.archi</a><br/>
                                <a href="mailto:com@azc.archi">com@azc.archi</a><br/>
                                <a href="mailto:jobs@azc.archi">jobs@azc.archi</a></p>
                                <p class="mt-3">credits : AZC 2018</p>
                                <?php $lang = get_bloginfo("language");
                                if ( $lang == 'fr-FR' ) { ?>
                                    <a href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>">mentions légales</a>
                                <?php }
                                else if ( $lang == 'en-GB' ) { ?>
                                    <a href="<?php echo esc_url( home_url( '/legal-notice' ) ); ?>">legal notice</a>
                                <?php } ?>
                            </div>
                            <!-- Language Switcher -->
                            <?php if ( is_active_sidebar( 'language_switcher' ) ) : ?>
                                <div id="footer-widget-area" role="complementary">
                                    <?php dynamic_sidebar( 'language_switcher' ); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Fin Language Switcher -->
                            <div class="social-link d-flex justify-content-between">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png"/>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"/>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/instagram.png"/>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.png"/>
                            </div>
                        </div>
                    </div>
                    <a href="#primary" class="col-xl-6 col-sm-1 col-12 text-uppercase text-right d-flex flex-column justify-content-end haut">Haut</a>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
	