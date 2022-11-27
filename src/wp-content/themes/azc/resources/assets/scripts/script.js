let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

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
        $('.bloc_text_news').each(function( index ) {
            if ($(this).height() >  $( this ).parent().height()) {
            $(this).parent().next().removeClass('hide');
            }
        });

    });
    $(window).resize(function(){           
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


  // Activate tooltips
  $('[data-toggle="tooltip"]').tooltip()


  // INDEX page
  if ($('#worksList').length) {
    // Table sort handling
    worksList.onclick = function(e) {
      if (e.target.tagName != 'TH') return;
    
      let th = e.target;
      sortGrid(th.cellIndex, th.dataset.type, th);
    };
    	
    function sortGrid(colNum, type, th) {
      let tbody = worksList.querySelector('tbody');
      let rowsArray = Array.from(tbody.rows);
      let compare;
      	
      switch (type) {
        case 'number':
        compare = function(rowA, rowB) {
          th.dataset.type = "reverse-number";
          return rowB.cells[colNum].innerHTML - rowA.cells[colNum].innerHTML;
        };
        break;

        case 'reverse-number':
        compare = function(rowA, rowB) {
          th.dataset.type = "number";
          return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
        };
        break;
    
        case 'string':
          compare = function(rowA, rowB) {
          th.dataset.type = "reverse-string";
          return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
        };
        break;

        case 'reverse-string':
          compare = function(rowA, rowB) {
          th.dataset.type = "string";
          return rowB.cells[colNum].innerHTML > rowA.cells[colNum].innerHTML ? 1 : -1;
        };
        break;
      }
    
      rowsArray.sort(compare);
      tbody.append(...rowsArray);
    }
  }// INDEX page


  // SINGLE WORK page
  if ($('#singleWorks').length) {
    const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)
    const workImages = $("#carouselwork .image");
    const imagesCount = $("#carouselwork .image").length;
    index = $("#currentIndex");

    // Upade the index, selecting the one of the image of which the top
    // is in the top half of the viewport
    updateIndex = function() {
      let idx = 0;
      let imageTop = workImages[idx].getBoundingClientRect().top;

      while(idx < imagesCount && (imageTop < -vh*0.5 || imageTop > vh*0.5)) {
        idx++;
        imageTop = workImages[idx].getBoundingClientRect().top;
      }

      index.text(workImages[idx].dataset.index);
    }
    window.addEventListener('scroll', updateIndex);
    updateIndex();

    $("#read-more").click(function(e) {
      console.log("Clicked!");
      $("#work-text").addClass('expanded');
    });
  }// SINGLE WORK page


  // AZC page
  if ($('#azc').length) {
    $("#accordion .accordion-element").click(function(e) {
      $(e.currentTarget).toggleClass("open");
    });
  }// AZC page
});
