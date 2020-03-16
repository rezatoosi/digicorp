
var bootstrap = require('bootstrap');
var owlCarousel = require('owl.carousel');
var typedjs = require('typed.js');
// var smoothScroll = require('smooth-scroll');


(function($) {
  $(document).ready(function(){

    /* Search button toggle */
    $(".search-toggle, .mobile-search-toggle").click((function() {
        $(".search-toggle, .mobile-search-toggle, .header-search").toggleClass("active"),
        $(this).hasClass("active") && $('.navbar-collapse').collapse('hide'),
        $(".header-search .search-field").focus()
    }
    ));
    $(".navbar-toggle").click(function(){
        $(".search-toggle, .mobile-search-toggle, .header-search").removeClass("active");
    });

    // Scroll to top
    $(window).scroll(function(){
      if($(window).scrollTop() > 400){
        $('#btn-backtop').addClass('show');
      } else {
        $('#btn-backtop').removeClass('show');
      }
    });
    $('#btn-backtop').click(function(e){
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });

    // $(".mobile-search-toggle").click((function() {
    //     $(".mobile-search-toggle, .header-search").toggleClass("active"),
    //     $(this).hasClass("active") && $(".mobile-menu-toggle, .nav-primary").removeClass("active"),
    //     $(".header-search .search-field").focus()
    // }
    // ));
    // $(".mobile-menu-toggle").click((function() {
    //     $(".mobile-menu-toggle, .nav-primary").toggleClass("active"),
    //     $(this).hasClass("active") && $(".search-toggle, .header-search").removeClass("active")
    // }
    // ));

    /* Run Owl-Carousel ------------------------------------- */
    var dir = $("html").attr("dir");
    var isRtl = false;
    var navNext, navPrev = '';
    if ( dir == 'rtl' ) {
      isRtl = true;
      navNext = "<i class='fa fa-angle-left'></i>";
      navPrev = "<i class='fa fa-angle-right'></i>";
    } else {
      isRtl = false;
      navNext = "<i class='fa fa-angle-right'></i>";
      navPrev = "<i class='fa fa-angle-left'></i>";
    }

    $('.blog-banner-carousel-1').owlCarousel({
        rtl: isRtl,
        items: 1,
        loop: true,
        lazyLoad: false,
        margin: 0,
        responsiveClass:true,
        smartSpeed: 800,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: false,
        navText: [navNext,navPrev],
        // navElement: "div",
    });

    $('.seo-studio').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        rtl: isRtl,
        responsiveClass:true,
        navText: [navNext,navPrev],
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:6,
                nav:true,
                loop:false
            }
        }
    });

    /* Run typed.js ------------------------------------- */
    if ( $('#typed-slider-typed-element').length ) {
      var typed = new typedjs('#typed-slider-typed-element', {
        stringsElement: "#typed-slider-typed-strings",
        typeSpeed: 80,
        backSpeed: 20,
        backDelay: 2500,
        loop: true,
        smartBackspace: true,
        showCursor: true,
        cursorChar: '|'
      });
    }

    /* Run data- elements ------------------------------------- */
    $('[data-bg-color]').each(function() {
        $(this).css("cssText", "background: " + $(this).data("bg-color") + " !important;");
    });
    $('[data-bg-img]').each(function() {
        $(this).css('background-image', 'url(' + $(this).data("bg-img") + ')');
    });

    /* Run smooth scroll ------------------------------------- */
    //https://www.npmjs.com/package/smooth-scroll

  }); // end $(document).ready();
})(jQuery);
