function resizeText(event) {
jQuery(".about-resize").height(jQuery('.owl-stage-outer').height()-40);
}
function resizeTeam(event) {
    jQuery(".team-resize").height(jQuery('#team img').height()-35);
}
function resizeJob(event) {
    jQuery(".job-resize").height(jQuery('#jobs img').height()-35);
}
function resizeStage(event) {
    jQuery(".stage-resize").height(jQuery('#stages img').height()-35);
}
function resizeAwards(event) {
    jQuery(".awards-resize").height(jQuery('#team img').height()-35);
}
function resizeNews(event) {
    jQuery(".news-resize").height(jQuery('.owl-stage-outer').height()-78);
}

//jQuery( document ).ready(function() {
jQuery(function($){

    $('.enter-button').click(function() {
        $('.home-content').addClass("clicked");
		setTimeout(()=>$('.enter-button a').attr("href", "azc"));
    });

    /* Initialize Owl Carousel */
    
    $('.owl-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    var carousel = e.relatedTarget;
    $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
    }).owlCarousel({
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
    
    $('.about-more').click(function() {
        $('.about-text').removeClass("about-resize col-xl-6").addClass("column").height('auto');
        $('.about-more').addClass('hide');
        $('.about-less').removeClass('hide');
        $("#about").addClass('mb-0');
    });
    $('.about-less').click(function() {
        $('.about-text').addClass("about-resize col-xl-6").removeClass("column");
        $('.about-more').removeClass('hide');
        $('.about-less').addClass('hide');
        $(".about-resize").height($('.owl-stage-outer').height()-40);
        $("#about").removeClass('mb-0');
    });
    
    $('.more-team').click(function() {
        $('.team-text').removeClass("team-resize col-xl-6").height('auto');
        $('.team-column').addClass("column");        
        $(this).addClass('hide');
        $('.less-team').removeClass('hide');
    });
    $('.less-team').click(function() {
        $('.team-text').addClass("team-resize col-xl-6").height($('#team img').height()-35);
        $('.team-column').removeClass("column");        
        $('.more-team').removeClass('hide');
        $('.less-team').addClass('hide');
    });  
    
    if ($('.awards-text').height() < $('#team img').height()) {
        $('.more-awards').addClass('hide');
    };
    
    $('.more-awards').click(function() {
        $('.awards-text').removeClass("awards-resize").height('auto');
        $(this).addClass('hide');
        $('.less-awards').removeClass('hide');
    });
    $('.less-awards').click(function() {
        $('.awards-text').addClass("awards-resize").height($('#team img').height()-35);     
        $('.more-awards').removeClass('hide');
        $('.less-awards').addClass('hide');
    });      
    
    if ($('.job-text').height() < $('#jobs img').height()) {
        $('.more-job').addClass('hide');
    };
    
    $('.more-job').click(function() {
        $('.job-text').removeClass("job-resize").height('auto');
        $(this).addClass('hide');
        $('.less-job').removeClass('hide');
    });
    $('.less-job').click(function() {
        $('.job-text').addClass("job-resize").height($('#jobs img').height()-35);     
        $('.more-job').removeClass('hide');
        $('.less-job').addClass('hide');
    });
    
    if ($('.stage-text').height() < $('#stages img').height()) {
        $('.more-stages').addClass('hide');
    };
    
    $('.more-stages').click(function() {
        $('.stage-text').removeClass("stage-resize").height('auto');
        $(this).addClass('hide');
        $('.less-stages').removeClass('hide');
    });
    $('.less-stages').click(function() {
        $('.stage-text').addClass("stage-resize").height($('#stages img').height()-35);     
        $('.more-stages').removeClass('hide');
        $('.less-stages').addClass('hide');
    });
    
    if ($('.bloc_text_news').height() < $('.news-text').height()) {
        $(this).addClass('hide');
    };
    
    $('.news-more').click(function() {
        $(this).prev().removeClass("news-resize col-xl-6").addClass("column").height('auto');
        $(this).addClass('hide');
        $(this).next().removeClass('hide');
    });
    $('.news-less').click(function() {
        $(this).prev().prev().addClass('news-resize col-xl-6').removeClass('column');
        $(this).prev().removeClass('hide');
        $(this).addClass('hide');
        $('.news-resize').height($('.owl-stage-outer').height()-40);
    });
    
    $('.menu-show').click(function() {   
        $('.menu-single-work .menu-fixed-single').fadeIn("slow");
        $('.menu-show').fadeOut("slow");
        $('.menu-hide').fadeIn("slow");
        $('.navbar-subnav-work').fadeIn("slow");
        $('.navbar-subnav-work').css('display','flex');
        $('.menu-single-work').css('z-index','15');
        $('.close-carousel').fadeOut("slow");
    });
    $('.menu-hide').click(function() {
        $('.menu-single-work .menu-fixed-single').fadeOut("slow");
        $('.menu-show').fadeIn("slow");
        $('.menu-hide').fadeOut("slow");
        $('.navbar-subnav-work').fadeOut("slow");        
        $('.menu-single-work').css('z-index','10');
        if ($('.work-single').is(':visible')) {
            $('.close-carousel').fadeIn("slow");
        }
    });
    
    $('.postindex-list-data li').click(function() {
    });
       if (window.location.href.indexOf("?var") > -1)  {        
        $('.indexterms-filters').addClass('mobile-hide');
        $('.index-post').removeClass('mobile-hide');
      }
      else {
        $('.indexterms-filters').removeClass('mobile-hide');
        $('.index-post').addClass('mobile-hide');
      }
    
    var Menu = $('.categories-filters li')
    if (Menu = $('.list-link')) {        
        Menu.click(function() {
            $('#works-list').removeClass("hide");
            $('.grid').addClass("hide");
            $('.current-cat').removeClass("current-cat");
        });
    }
    else {
        Menu.click(function() {
            $('#works-list').addClass("hide");
            $('.grid').removeClass("hide");
        });
    };
    
    /* Afin d'éxecuter le script après avoir cliqué depuis Single Works */
    if(location.href.includes("#works-list")) {
        $('#works-list').removeClass("hide");
        $('.grid').addClass("hide");
        $('.current-cat').removeClass("current-cat");
    };
    
    var $grid = $('.grid').imagesLoaded( function() {
        $grid.masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-item',
            horizontalOrder: true,
            gutter: 20,
            fitWidth: true
        });
    });

    $('.work-text .arrow').click(function() {
        $('.work-text').toggleClass('onright');
    });
    
    $(window).scroll(function () {
        const scroll = ($(this).scrollTop());
        const headerHeight = $('.menu-fixed').outerHeight() + $('.navbar-subnav').outerHeight();
        let currentSection;
        $('.navbar-subnav a').removeClass('text-underlined');
        $('main section').each( function(index) {
            if(scroll > $(this).offset().top - headerHeight)
                currentSection = this.id;
            else
                return;
        });
        
        if(currentSection == "stages") currentSection = "contact";
        if(currentSection)
            $(`[href=#${currentSection}]`).addClass('text-underlined');
            
    });
    $(window).load(function(){
         var width_azc = $('.azc-section .owl-carousel').width()
         $('.azc-section .owl-carousel').height(width_azc*60/100)
         var width_news = $('#news .owl-carousel').width()
         $('#news .owl-carousel').height(width_news*60/100)
         resizeText();
         resizeTeam();
         resizeJob();
         resizeStage();
         resizeAwards();
         resizeNews();
         
        var $imgwidth = ($('.carousel-item.active img').width())/2;
        $('.carousel-item.active .social-sharing').css({ left: 'calc(50% - ' + $imgwidth + 'px + 20px)' });
        $("#carouselwork").on('slid.bs.carousel', function () {
            var $imgwidth = ($('.carousel-item.active img').width())/2;
            $('.carousel-item.active .social-sharing').css({ left: 'calc(50% - ' + $imgwidth + 'px + 20px)' });
        });        
        $('.carousel-item img').hover(function() {
            $('.carousel-item.active .social-sharing').show();},
        function(){$('.carousel-item.active .social-sharing').hide();}
        );
        
        var n = $( "#carouselwork .carousel-item" ).length;
        $('.total').text(n);
        
        $('.mobile-img-pres').click(function() {
            $(this).fadeOut();
            $('.work-text').fadeOut();
            $('.work-single').fadeIn();
            $('.close-carousel').fadeIn();
            $('.img-work-caract').fadeIn();
        });
        $('.close-carousel').click(function() {
            $(this).fadeOut();
            $('.work-text').fadeIn();
            $('.work-single').fadeOut();
            $('.mobile-img-pres').fadeIn();
            $('.img-work-caract').fadeOut();
        });        
                        
        $( '.bloc_text_news').each(function( index ) {
            if ($(this).height() >  $( this ).parent().height()) {
            $(this).parent().next().removeClass('hide');
            }
        });
    });
    $(window).resize(function(){        
         var width_azc = $('.azc-section .owl-carousel').width()
         $('.azc-section .owl-carousel').height(width_azc*60/100)
         var width_news = $('#news .owl-carousel').width()
         $('#news .owl-carousel').height(width_news*60/100)
         resizeText();
         resizeTeam();
         resizeJob();
         resizeStage();
         resizeAwards();
         resizeNews();
         var $imgwidth = ($('.carousel-item.active img').width())/2;
                $('.carousel-item.active .social-sharing').css({ left: 'calc(50% - ' + $imgwidth + 'px)' });
    });
    
    /*  Ajax script for posts pagination in Index Page */

    $('.pagination a:first-child').addClass("current");
    $('.page-number').click(function(event){
        event.preventDefault();
        $('.page-number').removeClass("current");
        $(this).addClass("current");
        var link = $(this).attr('href');
        $('.postindex-list').load(link+' .postindex-list li');
    });

    /*  Ajax script for category filters in Index Page 

    jQuery(function(){
        var mainContent = jQuery('.postindex-list');
        var catLinks = jQuery('ul.indexterms-filters li a');

        catLinks.on('click', function(e){

            e.preventDefault();
            el = jQuery(this);
            var value = el.attr("href");
            mainContent.animate({opacity:"0.5"});
            mainContent.load(value + " .postindex-list", function(){
                mainContent.animate({opacity:"1"});
            });
            jQuery( "li" ).removeClass( "current-cat" );
            jQuery(this).closest('li').addClass("current-cat");
            $('.indexterms-filters').addClass('mobile-hide');
            $('.index-post').removeClass('mobile-hide');
        });
    }); */
});