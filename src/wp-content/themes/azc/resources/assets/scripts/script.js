function resizeText(event) {
    jQuery(".about-resize").height(jQuery('.owl-stage-outer').height()-40);
}
function resizeTeam(event) {
    jQuery(".team-resize").height(jQuery('#team img').height()-35);
}

jQuery( document ).ready(function() {

    jQuery('.enter-button').click(function() {
        jQuery('.home-content').addClass("clicked");
		setTimeout(()=>jQuery('.enter-button a').attr("href", "azc"));
    });
    

    jQuery('.owl-carousel').owlCarousel({
        stagePadding: 0,
        items: 1,
        loop:true,
        nav:true,
        margin:0,
        singleItem:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        },
        onResized: resizeText,
    });
    
    jQuery(function(){
        var mainContent = jQuery('.container-fluid');
        var catLinks = jQuery('ul.categories-filters li a');

        catLinks.on('click', function(e){

            e.preventDefault();
            el = jQuery(this);
            var value = el.attr("href");
            mainContent.animate({opacity:"0.5"});
            mainContent.load(value + " .works-list", function(){
                mainContent.animate({opacity:"1"});
            });
            jQuery( "li" ).removeClass( "current-cat" );
            jQuery(this).closest('li').addClass("current-cat");
        });
    });

    jQuery('.about-more').click(function() {
        jQuery('.about-text').removeClass("about-resize");
        jQuery('.about-text').removeClass("col-xl-6");
        jQuery('.about-text').addClass("column");
        jQuery('.about-more').addClass('hide');
        jQuery('.about-less').removeClass('hide');
        jQuery(".about-text").height('auto');
        jQuery("#about").addClass('mb-0');
    });
    jQuery('.about-less').click(function() {
        jQuery('.about-text').addClass("about-resize");
        jQuery('.about-text').addClass("col-xl-6");
        jQuery('.about-text').removeClass("column");
        jQuery('.about-more').removeClass('hide');
        jQuery('.about-less').addClass('hide');
        jQuery(".about-resize").height(jQuery('.owl-stage-outer').height()-40);
        jQuery("#about").removeClass('mb-0');
    });
    
    jQuery('.more-team').click(function() {
        jQuery('.team-text').removeClass("team-resize");
        jQuery('.team-text').removeClass("col-xl-6");
        jQuery('.team-column').addClass("column");        
        jQuery('.more-team').addClass('hide');
        jQuery('.less-team').removeClass('hide');
        jQuery(".team-text").height('auto');
    });
    jQuery('.less-team').click(function() {
        jQuery('.team-text').addClass("team-resize");
        jQuery('.team-text').addClass("col-xl-6");
        jQuery('.team-column').removeClass("column");        
        jQuery('.more-team').removeClass('hide');
        jQuery('.less-team').addClass('hide');
        jQuery(".team-text").height(jQuery('#team img').height()-35);
    });
    
    jQuery('.menu-show').click(function() {    
        jQuery('.menu-single-work .menu-fixed').removeClass('hide');
        jQuery('.menu-show').addClass('hide');
        jQuery('.menu-hide').removeClass('hide');
    });
    jQuery('.menu-hide').click(function() {
        jQuery('.menu-single-work .menu-fixed').addClass('hide');
        jQuery('.menu-show').removeClass('hide');
        jQuery('.menu-hide').addClass('hide');
    });
    
    jQuery('.work-text .arrow').click(function() {
        jQuery('.work-text').toggleClass('onright');
    });
    
    jQuery(window).scroll(function () {
        const scroll = (jQuery(this).scrollTop());
        const headerHeight = jQuery('.menu-fixed').outerHeight() + jQuery('.navbar-subnav').outerHeight();
        let currentSection;
        jQuery('.navbar-subnav a').removeClass('text-underlined');
        jQuery('main section').each( function(index) {
            if(scroll > jQuery(this).offset().top - headerHeight)
                currentSection = this.id;
            else
                return;
        });
        
        if(currentSection == "stages") currentSection = "contact";
        if(currentSection)
            jQuery(`[href=#${currentSection}]`).addClass('text-underlined');
            
    });
    jQuery(window).load(function(){
         resizeText();
         resizeTeam();
         
    });
    
});