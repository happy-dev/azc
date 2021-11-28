function positionPinterest() {
  const theImage = document.querySelector('.carousel-item.active img');
  if (theImage === null) {
    return;
  }

  const imageWidth = theImage.naturalWidth;
  const imageHeight = theImage.naturalHeight;

  const windowWidth = jQuery(window).width();
  const addMargin = windowWidth < 769 ? 10 : 20;

  const activeItem = jQuery('.carousel-item.active');
  const carouselWidth = activeItem.width() - (2 * addMargin);
  const carouselHeight = activeItem.height();
  const propImage = imageWidth / imageHeight;
  const propCarousel = (carouselWidth) / carouselHeight;

  if (propCarousel >= propImage) {
    const newWidth = imageWidth * carouselHeight / imageHeight;
    jQuery('#singleWorks .carousel-item.active .social-sharing').css({
      'left': 'calc(50% - ' + newWidth / 2 + 'px + ' + addMargin + 'px)',
      'top': + addMargin + 'px'
    });
    jQuery('#singleWorks .carousel-control').css({
      'margin-top': '90px'
    });
  } else {
    const newHeight = imageHeight * carouselWidth / imageWidth;
    const marginTop = ((carouselHeight - newHeight) / 2) + 90;
    jQuery('#singleWorks .carousel-item.active .social-sharing').css({
      'left': '20px',
      'top': 'calc(50% - ' + newHeight / 2 + addMargin + 'px)'
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


    $('.menu-show').click(function() {   
        $('.menu-single-work .menu-fixed-single').fadeIn("slow");
        $('.menu-show').fadeOut("slow");
        $('.navbar-subnav-work').fadeIn("slow");
        $('.navbar-subnav-work').css('display','flex');
        $('.menu-single-work').css('z-index','15')
    });
    $('#carouselwork').click(function() {
        $('.menu-single-work .menu-fixed-single').fadeOut("slow");
        $('.menu-show').fadeIn("slow");
        $('.navbar-subnav-work').fadeOut("slow");        
        $('.menu-single-work').css('z-index','10')
    });
    $('.work-text').click(function() {
        $('.menu-single-work .menu-fixed-single').fadeOut("slow");
        $('.menu-show').fadeIn("slow");
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
    
    $('#list-link').click(function() {
        $('#works-list').removeClass("hide");
        $('.grid').addClass("hide");
        $('.current-cat').removeClass("current-cat");
        $('#list-link').addClass("current-cat");
    });
    
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
        $('main section').each( function(index) {
            if(scroll > $(this).offset().top - headerHeight)
                currentSection = this.id;
            else
                return;
        });
        
    });
    $(window).load(function(){
         if ($('#singleWorks').length){
            positionPinterest(); 
        };
        $('.bloc_text_news').each(function( index ) {
            if ($(this).height() >  $( this ).parent().height()) {
            $(this).parent().next().removeClass('hide');
            }
        });

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
    
    /* Add class active for under menu*/
    var BodyId = $('body').attr('id')
    $(".navbar-subnav li."+BodyId).addClass('selected');

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

  // INDEX page
  if (worksList) {
    // Table sort handling
    worksList.onclick = function(e) {
      if (e.target.tagName != 'TH') return;
    
      let th = e.target;
      sortGrid(th.cellIndex, th.dataset.type);
    };
    	
    function sortGrid(colNum, type) {
      let tbody = worksList.querySelector('tbody');
      let rowsArray = Array.from(tbody.rows);
      let compare;
      	
      switch (type) {
        case 'number':
        compare = function(rowA, rowB) {
          return rowB.cells[colNum].innerHTML - rowA.cells[colNum].innerHTML;
        };
        break;
    
        case 'string':
          compare = function(rowA, rowB) {
          return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
        };
        break;
      }
    
      rowsArray.sort(compare);
      tbody.append(...rowsArray);
    }
  }// INDEX page
});
