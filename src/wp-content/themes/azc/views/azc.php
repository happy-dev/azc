<?php

/* Template Name: AZC */

$GLOBALS['templateName'] = "azc";

get_header();?>

<section id="primary" class="content-area mt-navb">
    <main id="main" class="site-main">
        <ul class="navbar-subnav">
            <li><a href="#about">About,</a></li>
            <li><a href="#team">Team,</a></li>
            <li><a href="#awards">Awards,</a></li>
            <li><a href="#jobs">Jobs,</a></li>
            <li><a href="#contact">Contact,</a></li>
            <li><a href="">WAO ®</a></li>
        </ul>
        <div class="container-fluid mt-5" id="about">
            <div class="row">
                <div class="col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/Stefan_Tuchila_01_K3_3452.jpg"/>
                </div>
                <div class="col-6">
                    <h2>About</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="team">
            <div class="row">
                <div class="col-6">
                     <img src="<?php echo get_template_directory_uri(); ?>/img/team.jpg"/>
                </div>
                <div class="col-6">
                    <h2>Team</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4" id="awards">
            <div class="row">
            <h2>Awards</h2>
            </div>
        </div>
        <div class="container-fluid mt-4" id="jobs">
            <div class="row">
                <div class="col-6"><img src="<?php echo get_template_directory_uri(); ?>/img/Stefan_Tuchila_16_K3_3403.jpg"/></div>
                <div class="col-6">
                    <h2>Jobs</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4 mb-4" id="stages">
            <div class="row">
                <div class="col-6"><img src="<?php echo get_template_directory_uri(); ?>/img/Stefan_Tuchila_17_K3_3404.jpg"/></div>
                <div class="col-6">                
                    <h2>Stages</h2>
                </div>
            </div>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer("azc"); ?>


