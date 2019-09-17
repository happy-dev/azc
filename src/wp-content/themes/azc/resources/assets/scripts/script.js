function positionPinterest() {    
         var theImage = new Image();
         theImage.src = jQuery('.carousel-item.active img').attr("src");
         var imageWidth = theImage.width;
         var imageHeight = theImage.height;
         var windowWidth= jQuery(window).width();
         if(windowWidth < 769){
            var addMargin = 10
        }
        else {
            var addMargin = 20
        };
        var carouselWidth = (jQuery('.carousel-item.active').width()) - (2 * addMargin); 
        var carouselHeight = jQuery('.carousel-item.active').height();
         var propImage = imageWidth / imageHeight;
         var propCarousel = (carouselWidth) / carouselHeight;
     if (propCarousel >= propImage) {
         var newWidth= imageWidth * carouselHeight / imageHeight;
         jQuery('#singleWorks .carousel-item.active .social-sharing').css({ 
            'left': 'calc(50% - ' + newWidth/2 + 'px + '+ addMargin + 'px)',
            'top':  + addMargin + 'px' 
         });
         jQuery('#singleWorks .carousel-control').css({
             'margin-top': '90px'
         });
     }
     else {
         var newHeight= imageHeight * carouselWidth / imageWidth;
         var marginTop = ((carouselHeight - newHeight)/2)+90;
         jQuery('#singleWorks .carousel-item.active .social-sharing').css({ 
            'left': '20px' ,
            'top': 'calc(50% - ' + newHeight/2 + addMargin + 'px)' 
         });
         jQuery('#singleWorks .carousel-control').css({
             'margin-top': + marginTop + 'px'
         });
     }
};

let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

// LOADING MASONRY
jQuery(window).load(function() {
    jQuery('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        horizontalOrder: true,
        gutter: 20,
        fitWidth: true
    });
});


//jQuery( document ).ready(function() {
jQuery(function($){

    $('.scrollbar-macosx').scrollbar();

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
    });
    
    $('.menu-show').click(function() {   
        $('.menu-single-work .menu-fixed-single').fadeIn("slow");
        $('.menu-show').fadeOut("slow");
        $('.menu-hide').fadeIn("slow");
        $('.navbar-subnav-work').fadeIn("slow");
        $('.navbar-subnav-work').css('display','flex');
        $('.menu-single-work').css('z-index','15')
    });
    $('.menu-hide').click(function() {
        $('.menu-single-work .menu-fixed-single').fadeOut("slow");
        $('.menu-show').fadeIn("slow");
        $('.menu-hide').fadeOut("slow");
        $('.navbar-subnav-work').fadeOut("slow");        
        $('.menu-single-work').css('z-index','10')
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

    $('.work-text .arrow').click(function() {
        $('.work-text').toggleClass('onright');
    });
    
    $('.carousel-control').hover(function() {
        $('.social-sharing').addClass('visible');
    }, function() {
        $('.social-sharing').removeClass('visible');
    });
    
    $('.carousel-item img').click(function() {
    $('.social-sharing').toggleClass('visible');
    });
        
    $("#carouselwork").on('slide.bs.carousel', function () {
        $('.social-sharing').removeClass('visible');
    });
    $("#carouselhome").on('slide.bs.carousel', function () {
        $('.hand').fadeOut();
    });
    var compte = ($( ".carousel-item.active" ).index())+1;
    $('.count-nb').text(compte); 
    
    $("#carouselwork").on('slid.bs.carousel', function () {
        positionPinterest(); 
        var compte = ($( ".carousel-item.active" ).index())+1;
        $('.count-nb').text(compte); 
    });

    var n = $( "#carouselwork .carousel-item" ).length;
    $('.total').text(n);
    
    $('body').on('click','.index-plus',function() {
        var id = $(this).attr("id");
        $('#'+id+".index-plus").addClass('hide');        
        $('#'+id+".index-moins").removeClass('hide');
        $('#'+id+"-content").removeClass('hide');
    });
    $('body').on('click','.index-moins',function() {
        var id = $(this).attr("id"); 
        $('#'+id+".index-plus").removeClass('hide');        
        $('#'+id+".index-moins").addClass('hide');
        $('#'+id+"-content").addClass('hide');
    })
    
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
         if ($('#singleWorks').length){
            positionPinterest(); 
        };
    });

    $('.bloc_text_news').each((_, elem) => {
        const parent = $(elem).parent();
        if ($(elem).height() >  parent.height()) {
            parent.next().removeClass('hide');
        }
    });

    $(window).resize(function(){           
        positionPinterest();
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
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
    
    /* Add class active for AZC under menu*/
    
    $( "#azc .navbar-subnav li" ).first().addClass( "selected" );
    
    $("#azc .navbar-subnav li").click(function(){
        $('#azc .navbar-subnav li.selected').not(this).removeClass('selected');
        $(this).toggleClass('selected');
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