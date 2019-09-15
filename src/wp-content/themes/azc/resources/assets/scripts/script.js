'use strict';

// Work only on /works/{workG} pages.
function positionPinterest() {
    const img = jQuery('.carousel-item.active img');
    // if undefined abort.
    if (!img) {
        return;
    }

    const width = img.width();
    const height = img.height();
    const windowWidth = jQuery(window).width();
    const addMargin = (windowWidth < 769 ? 10 : 20);

    const carousel = jQuery('.carousel-item.active');
    const carouselWidth = carousel.width() - (2 * addMargin);
    const carouselHeight = carousel.height();

    const propImage = width / height;
    const propCarousel = carouselWidth / carouselHeight;

    let cssSocial = {};
    let cssControl = {};

    if (propCarousel >= propImage) {
        const newWidth = (width * carouselHeight / height) / 2;

        cssSocial = {
            'left': `calc(50% - ${newWidth}px + ${addMargin}px)`,
            'top':  `${addMargin}px`
        };
        cssControl = {
            'margin-top': '90px'
        };
    } else {
        const newHeight = (height * carouselWidth / width);
        const marginTop = ((carouselHeight - newHeight) / 2) + 90;
        const h = (newHeight / 2) + addMargin;
        cssSocial = {
            'left': '20px' ,
            'top': `calc(50% - ${h}px)`
        };
        cssControl = {
            'margin-top': `${marginTop}px`
        };
    }
    jQuery('#singleWorks .carousel-item.active .social-sharing').css(cssSocial);
    jQuery('#singleWorks .carousel-control').css(cssControl);
};

// LOADING MASONRY work on /works/ page.
if (!location.pathname === "/index/") {
    jQuery(window).load(() => {
        jQuery('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-item',
            horizontalOrder: true,
            gutter: 20,
            fitWidth: true
        });
    });
}

const getCurrentSection = (scroll) => {
    const headerHeight = (
          jQuery('.menu-fixed').outerHeight()
        + jQuery('.navbar-subnav').outerHeight()
    );

    let id = '';
    jQuery('main section').each((_, elem) => {
        const diff = jQuery(elem).offset().top - headerHeight;
        if (scroll > diff) {
            id = elem.id;
        }
    });
    return id === 'stages' ? 'contact' : id;
};

const handleScroll = (e) => {
    const scroll = jQuery(e.currentTarget).scrollTop();
    const currentSection = getCurrentSection(scroll);
    jQuery('.navbar-subnav a').removeClass('text-underlined');

    if (currentSection) {
        jQuery(`[href=#${currentSection}]`).addClass('text-underlined');
    }
};

const incrementPageNumber = () => {
    const activeItem = jQuery('.carousel-item.active');
    const compte = Number.parseInt(activeItem.index(), 10);
    jQuery('.count-nb').text(compte + 1);
}

const setViewportHeight = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

jQuery(($) => {
    // Should be the first operation in script:
    jQuery('.scrollbar-macosx').scrollbar();
    $(window).scroll(handleScroll);

    setViewportHeight();
    $(window).resize(() => {
        positionPinterest();
        setViewportHeight();
    });

    $('.enter-button').click(() => {
        $('.home-content').addClass("clicked");
		setTimeout(() => $('.enter-button a').attr("href", "azc"));
    });

    /*
     * /postswork/{work}
     * Initialize Owl Carousel and related interaction
    */
    const carousel = $('.owl-carousel');
    if (carousel) {
        carousel.on('initialized.owl.carousel changed.owl.carousel', (e) => {
            const carouselElem = e.relatedTarget;
            const text = carouselElem.relative(carouselElem.current());
            const count = parseInt(text, 10) + 1;
            const length = carouselElem.items().length;
            $('.slider-counter').text(`${count}/${length}`);
        });

        carousel.owlCarousel({
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

        if (jQuery('#singleWorks')) {
            positionPinterest();
        };

        $('.carousel-control').hover(() => {
            $('.social-sharing').addClass('visible');
        }, () => {
            $('.social-sharing').removeClass('visible');
        });

        $("#carouselhome").on('slide.bs.carousel', () => {
            $('.hand').fadeOut();
        });

        $("#carouselwork").on('slid.bs.carousel', () => {
            $('.social-sharing').removeClass('visible');
            positionPinterest();
            incrementPageNumber();
        });


        incrementPageNumber();
        const n = $("#carouselwork .carousel-item").length;
        $('.total').text(n);

        $('.carousel-item img').click(() => {
            $('.social-sharing').toggleClass('visible');
        });
    // On works/{work}
    }
    // End /postworks/{work}

    $('.menu-show').click(() => {
        $('.menu-single-work .menu-fixed-single').fadeIn("slow");
        $('.menu-show').fadeOut("slow");
        $('.menu-hide').fadeIn("slow");
        $('.navbar-subnav-work').fadeIn("slow");
        $('.navbar-subnav-work').css('display','flex');
        $('.menu-single-work').css('z-index','15')
    });

    $('.menu-hide').click(() => {
        $('.menu-single-work .menu-fixed-single').fadeOut("slow");
        $('.menu-show').fadeIn("slow");
        $('.menu-hide').fadeOut("slow");
        $('.navbar-subnav-work').fadeOut("slow");
        $('.menu-single-work').css('z-index','10')
    });

 //   $('.postindex-list-data li').click(() => { });
    if (window.location.href.indexOf("?var") > -1) {
        $('.indexterms-filters').addClass('mobile-hide');
        $('.index-post').removeClass('mobile-hide');
    } else {
        $('.indexterms-filters').removeClass('mobile-hide');
        $('.index-post').addClass('mobile-hide');
    }
//    });

    const catFilter = $('.categories-filters li');
    const listLink = $('.list-link');

    if (listLink) {
        listLink.click(() => {
            $('#works-list').removeClass("hide");
            $('.grid').addClass("hide");
            $('.current-cat').removeClass("current-cat");
        });

    } else {
        catFilter.click(() => {
            $('#works-list').addClass("hide");
            $('.grid').removeClass("hide");
        });
    };

    jQuery('.bloc_text_news').each((_, elem) => {
        const self = jQuery(elem);
        if (self.height() > self.parent().height()) {
            self.parent().next().removeClass('hide');
        }
    });

    /* Afin d'éxecuter le script après avoir cliqué depuis Single Works */
    if (location.href.includes("#works-list")) {
        $('#works-list').removeClass("hide");
        $('.grid').addClass("hide");
        $('.current-cat').removeClass("current-cat");
    };

    $('.work-text .arrow').click(() => {
        $('.work-text').toggleClass('onright');
    });

    $('body').on('click','.index-plus',function() {
        const id = $(this).attr('id');
        $(`#${id}.index-plus`).addClass('hide');
        $(`#${id}.index-moins`).removeClass('hide');
        $(`#${id}-content`).removeClass('hide');
    });

    $('body').on('click','.index-moins',function() {
        const id = $(this).attr('id');
        $(`#${id}.index-plus`).removeClass('hide');
        $(`#${id}.index-moins`).addClass('hide');
        $(`#${id}-content`).addClass('hide');
    })

    /*  Ajax script for posts pagination in Index Page */
    $('.pagination a:first-child').addClass("current");
    $('.page-number').click(function(event) {
        event.preventDefault();
        $('.page-number').removeClass("current");
        $(this).addClass("current");
        const link = $(this).attr('href');
        $('.postindex-list').load(link+' .postindex-list li');
    });

    /* Add class active for AZC under menu*/

    $( "#azc .navbar-subnav li" ).first().addClass( "selected" );

    $("#azc .navbar-subnav li").click(function() {
        $('#azc .navbar-subnav li.selected')
            .not(this)
            .removeClass('selected');
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