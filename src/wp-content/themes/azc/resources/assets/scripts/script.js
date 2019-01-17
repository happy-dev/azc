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
        }
    });

    jQuery(function(){
        var mainContent = jQuery('#main');
        var catLinks = jQuery('ul.categories-filters li a');

        catLinks.on('click', function(e){
            e.preventDefault();
            var el = jQuery(this);
            var value = el.attr('href');
            mainContent.animate({opacity:'0.5'});
            mainContent.load(value + " #container-fluid", function(){
                mainContent.animate({opacity:'1'});
            });
        });
    });

    jQuery('.about-more').click(function() {
        jQuery('.display-about').addClass("hide");
        jQuery('.display-more-about').removeClass("hide");
        jQuery('.about-text').removeClass("col-xl-6");
        jQuery('.about-text').addClass("column");
    });
    jQuery('.about-less').click(function() {
        jQuery('.display-about').removeClass("hide");
        jQuery('.display-more-about').addClass("hide");
        jQuery('.about-text').addClass("col-xl-6");
        jQuery('.about-text').removeClass("column");
    });
    
    jQuery('.more-team').click(function() {
        jQuery('.display-team').addClass("hide");
        jQuery('.display-more-team').removeClass("hide");
        jQuery('.team-text').removeClass("col-xl-6");
        jQuery('.team-column').addClass("column");
    });
    jQuery('.less-team').click(function() {
        jQuery('.display-team').removeClass("hide");
        jQuery('.display-more-team').addClass("hide");
        jQuery('.team-text').addClass("col-xl-6");
        jQuery('.team-column').removeClass("column");
    });

});
