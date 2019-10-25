/* global jQuery */

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
      left: `calc(50% - ${newWidth / 2}px + ${addMargin}px)`,
      top: `${Number(addMargin)}px`,
    });
    jQuery('#singleWorks .carousel-control').css({
      'margin-top': '90px',
    });
  } else {
    const newHeight = imageHeight * carouselWidth / imageWidth;
    const marginTop = ((carouselHeight - newHeight) / 2) + 90;
    jQuery('#singleWorks .carousel-item.active .social-sharing').css({
      left: '20px',
      top: `calc(50% - ${newHeight / 2}${addMargin}px)`,
    });
    jQuery('#singleWorks .carousel-control').css({
      'margin-top': `${Number(marginTop)}px`,
    });
  }
}

const setViewHeight = () => {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
};

// LOADING MASONRY
jQuery(window).load(() => {
  jQuery('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-item',
    horizontalOrder: true,
    gutter: 20,
    fitWidth: true,
  });
});

const updateCount = () => {
  const count = jQuery('.carousel-item.active').index();
  jQuery('.count-nb').text(count + 1);
};

jQuery(($) => {
  setViewHeight();
  $('.scrollbar-macosx').scrollbar();

  /* Initialize Owl Carousel */
  $('.owl-carousel').on('initialized.owl.carousel changed.owl.carousel', (e) => {
    const carousel = e.relatedTarget;
    const index = carousel.relative(carousel.current()) + 1;
    $('.slider-counter').text(`${index + 1}/${carousel.items().length}`);
  }).owlCarousel({
    stagePadding: 0,
    items: 1,
    loop: true,
    nav: true,
    margin: 0,
    singleItem: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });

  $('.menu-show').click(() => {
    $('.menu-single-work .menu-fixed-single').fadeIn('slow');
    $('.menu-show').fadeOut('slow');
    $('.menu-hide').fadeIn('slow');
    $('.navbar-subnav-work').fadeIn('slow');
    $('.navbar-subnav-work').css('display', 'flex');
    $('.menu-single-work').css('z-index', '15');
  });

  $('.menu-hide').click(() => {
    $('.menu-single-work .menu-fixed-single').fadeOut('slow');
    $('.menu-show').fadeIn('slow');
    $('.menu-hide').fadeOut('slow');
    $('.navbar-subnav-work').fadeOut('slow');
    $('.menu-single-work').css('z-index', '10');
  });

  $('.postindex-list-data li').click(() => {
  });

  if (window.location.href.indexOf('?var') > -1) {
    $('.indexterms-filters').addClass('mobile-hide');
    $('.index-post').removeClass('mobile-hide');
  } else {
    $('.indexterms-filters').removeClass('mobile-hide');
    $('.index-post').addClass('mobile-hide');
  }

  //
  // Works
  //
  $('.list-link').click(() => {
    $('#works-list').removeClass('hide');
    $('.grid').addClass('hide');
    $('.current-cat').removeClass('current-cat');
  });

  // Not used because we don't have javascript to filter what need to be shown.
  // Select all li a but not list-link.
  // $('.categories-filters li a:not(.list-link)').click((e) => {
  //   $('#works-list').addClass('hide');
  //   $('.grid').removeClass('hide');
  // });

  /* Afin d'éxecuter le script après avoir cliqué depuis Single Works */
  if (window.location.href.includes('#works-list')) {
    $('#works-list').removeClass('hide');
    $('.grid').addClass('hide');
    $('.current-cat').removeClass('current-cat');
  }

  $('.work-text .arrow').click(() => {
    $('.work-text').toggleClass('onright');
  });

  $('.carousel-control').hover(() => {
    $('.social-sharing').addClass('visible');
  }, () => {
    $('.social-sharing').removeClass('visible');
  });

  $('.carousel-item img').click(() => {
    $('.social-sharing').toggleClass('visible');
  });

  $('#carouselwork').on('slide.bs.carousel', () => {
    $('.social-sharing').removeClass('visible');
  });

  $('#carouselhome').on('slide.bs.carousel', () => {
    $('.hand').fadeOut();
  });

  const compte = ($('.carousel-item.active').index()) + 1;
  $('.count-nb').text(compte);

  $('#carouselwork').on('slid.bs.carousel', () => {
    positionPinterest();
    const compte = ($('.carousel-item.active').index()) + 1;
    $('.count-nb').text(compte);
  });

  const n = $('#carouselwork .carousel-item').length;
  $('.total').text(n);

  $('body').on('click', '.index-plus', function () {
    const id = $(this).attr('id');
    $(`#${id}.index-plus`).addClass('hide');
    $(`#${id}.index-moins`).removeClass('hide');
    $(`#${id}-content`).removeClass('hide');
  });

  $('body').on('click', '.index-moins', function () {
    const id = $(this).attr('id');
    $(`#${id}.index-plus`).removeClass('hide');
    $(`#${id}.index-moins`).addClass('hide');
    $(`#${id}-content`).addClass('hide');
  });

  $(window).scroll(function () {
    const scroll = ($(this).scrollTop());
    const headerHeight = $('.menu-fixed').outerHeight() + $('.navbar-subnav').outerHeight();
    let currentSection;
    $('.navbar-subnav a').removeClass('text-underlined');
    $('main section').each(function (index) {
      if (scroll > $(this).offset().top - headerHeight) currentSection = this.id;
      else return;
    });

    if (currentSection == 'stages') currentSection = 'contact';
    if (currentSection) $(`[href=#${currentSection}]`).addClass('text-underlined');
  });

  $(window).load(() => {
    if ($('#singleWorks').length) {
      positionPinterest();
    }
    $('.bloc_text_news').each(function (index) {
      if ($(this).height() > $(this).parent().height()) {
        $(this).parent().next().removeClass('hide');
      }
    });
  });
  $(window).resize(() => {
    positionPinterest();
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  });

  /*  Ajax script for posts pagination in Index Page */

  $('.pagination a:first-child').addClass('current');
  $('.page-number').click(function (event) {
    event.preventDefault();
    $('.page-number').removeClass('current');
    $(this).addClass('current');
    const link = $(this).attr('href');
    $('.postindex-list').load(`${link} .postindex-list li`);
  });

  /* Add class active for AZC under menu */

  $('#azc .navbar-subnav li').first().addClass('selected');

  $('#azc .navbar-subnav li').click(function () {
    $('#azc .navbar-subnav li.selected').not(this).removeClass('selected');
    $(this).toggleClass('selected');
  });
});
