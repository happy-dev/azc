        <footer class="footer-bg-black">
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
				<div class="social-link"></div>
            </div>
            <!-- ajout de ma nouvelle widget area -->
            <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
                <div id="header-widget-area" class="nwa-header-widget widget-area" role="complementary">
                    <?php dynamic_sidebar( 'home_right_1' ); ?>
                </div>
            <?php endif; ?>
            <!-- fin nouvelle widget area -->
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
	