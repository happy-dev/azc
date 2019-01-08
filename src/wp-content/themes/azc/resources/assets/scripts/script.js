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


});
