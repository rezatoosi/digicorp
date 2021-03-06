
// var bootstrap = require('bootstrap');
// var bootstrap = require('bootstrap-affix');
// var owlCarousel = require('owl.carousel');
// var typedjs = require('typed.js');
// var isotope = require('isotope-layout');
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
    // if ( $('#typed-slider-typed-element').length ) {
    //   var typed = new typedjs('#typed-slider-typed-element', {
    //     stringsElement: "#typed-slider-typed-strings",
    //     typeSpeed: 80,
    //     backSpeed: 20,
    //     backDelay: 2500,
    //     loop: true,
    //     smartBackspace: true,
    //     showCursor: true,
    //     cursorChar: '|'
    //   });
    // }

    /* Run data- elements ------------------------------------- */
    $('[data-bg]').each(function() {
        $(this).css('background', $(this).data("bg"));
    });
    $('[data-bg-img]').each(function() {
        $(this).css('background-image', 'url(' + $(this).data("bg-img") + ')');
    });
    $('[data-bg-color]').each(function() {
        $(this).css("background-color", $(this).data("bg-color"));
    });
    $('[data-bg-pos-x]').each(function() {
        $(this).css('background-position-x', $(this).data("bg-pos-x"));
    });
    $('[data-bg-pos-y]').each(function() {
        $(this).css('background-position-y', $(this).data("bg-pos-y"));
    });
    $('[data-bg-size]').each(function() {
        $(this).css('background-size', $(this).data("bg-size"));
    });
    $('[data-bg-repeat]').each(function() {
        $(this).css('background-repeat', $(this).data("bg-repeat"));
    });
    $('[data-bg-attachment]').each(function() {
        $(this).css('background-attachment', $(this).data("bg-attachment"));
    });


    /* Run smooth scroll ------------------------------------- */
    //https://www.npmjs.com/package/smooth-scroll

    $('.post-share-buttons a').on('click',function(e){
      e.preventDefault();
      var w = '550';
      var h = '450';

      // Fixes dual-screen position                             Most browsers      Firefox
      var dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
      var dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

      var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
      var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

      var systemZoom = width / window.screen.availWidth;
      var left = ((width - w) / 2 / systemZoom + dualScreenLeft);
      var top = ((height - h) / 2 / systemZoom + dualScreenTop);

      var newWindow = window.open(
        this.href,
        "_blank",
        "toolbar=0,personalbar=0,resizable,scrollbars,status,width=${w / systemZoom},height=${h / systemZoom},top=${top},left=${left}");

      if (window.focus) newWindow.focus();
    });


  }); // end $(document).ready();
})(jQuery);

var DIGICORP = {};

(function($){
  "use strict";

  DIGICORP.isMobile = {
     Android: function() {
         return navigator.userAgent.match(/Android/i);
     },
     BlackBerry: function() {
         return navigator.userAgent.match(/BlackBerry/i);
     },
     iOS: function() {
         return navigator.userAgent.match(/iPhone|iPad|iPod/i);
     },
     Opera: function() {
         return navigator.userAgent.match(/Opera Mini/i);
     },
     Windows: function() {
         return navigator.userAgent.match(/IEMobile/i);
     },
     any: function() {
         return (THEMEMASCOT.isMobile.Android() || THEMEMASCOT.isMobile.BlackBerry() || THEMEMASCOT.isMobile.iOS() || THEMEMASCOT.isMobile.Opera() || THEMEMASCOT.isMobile.Windows());
     }
 };

  DIGICORP.DIR = {
     isRTL: function() {
         if ($("html").attr("dir") == "rtl") {
             return true;
         } else {
             return false;
         }
     }
  };

  DIGICORP.scrollTo = {

    init: function() {
      $('.scrollto').each(function(){
        $(this).on('click',function(e){
          e.preventDefault();
          var elem = $(this).attr('href');
          var topOffset = $(elem).offset().top - 180;
          // $('html,body').animate({scrollTo:topOffset},'300');
          $('html, body').animate({scrollTop:topOffset}, '500');
        });
      });
    }

  };

  DIGICORP.headerAffix = {
    init: function() {
      var headerHeight = $('header.header').outerHeight();
      var firstSection = $('section').first();
      var topOffset = firstSection.offset().top + firstSection.outerHeight();
      $('.fixed-header').affix({
        offset: {
          top: function () {
            return (this.top = topOffset - 100);
          },
          // bottom: function () {
          //   if($('.footer').length) {
          //     return (this.bottom = $('.footer').offset().top);
          //   }
          // }
        }
      });
      $('.fixed-header').on('affix.bs.affix', function(){
        $('body').css('padding-top',headerHeight);
      });
      $('.fixed-header').on('affix-top.bs.affix', function(){
        $('body').css('padding-top','0');
      });
      $(window).scroll(function(){
        if ( ($(window).scrollTop() > headerHeight + 100) && ($(window).scrollTop() < topOffset) ) {
          $('header.header').css('top','-100px')
        } else {
          $('header.header').css('top','0')
        }
      });
    }
  };

  DIGICORP.backToTop = {
    init: function() {
      $('#btn-backtop').click(function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
      });
    },
    onScroll: function() {
      var visibleOffset = '500';
      if ($('section').length > 0) {
        var firstSection = $('section').first();
        visibleOffset = firstSection.offset().top + firstSection.outerHeight();
      }
      if($(window).scrollTop() > visibleOffset){
        $('#btn-backtop').addClass('show');
      } else {
        $('#btn-backtop').removeClass('show');
      }
    },
    dynamicPosition: function() {
      var visiblePart = $(window).scrollTop() + $(window).innerHeight() - $('.copyrights').offset().top;
      if( visiblePart >= 0 && ($(window).width() < 1350) ) {
        $('#btn-backtop').css('bottom',
          visiblePart + 10
        );
      } else {
        $('#btn-backtop').attr('style','');
      }
    }
  };

  DIGICORP.yoastFaq = {
    init: function() {
      // $('.schema-faq').wrap('<div class="row"></div>');
      $('.schema-faq-answer').wrap('<div class="schema-faq-answer"></div>');
      $('p.schema-faq-answer').removeClass('schema-faq-answer');

      $('.wp-block-yoast-faq-block').find('.schema-faq-question').click(function(){
				//Expand or collapse this panel
        // $(this).nextAll('.schema-faq-answer').eq(0).collapse('toggle');
				$(this).nextAll('.schema-faq-answer').eq(0).slideToggle('fast', function(){
					if( $(this).hasClass('collapse') ){
						$(this).removeClass('collapse');
					}
					else{
						$(this).addClass('collapse');
					}
				});

				//Hide the other panels
				$(".schema-faq-answer").not( $(this).nextAll('.schema-faq-answer').eq(0) ).slideUp('fast');
			});

			$('.wp-block-yoast-faq-block .schema-faq-question').click(function(){
				$('.wp-block-yoast-faq-block .schema-faq-question').not( $(this) ).removeClass('collapse');
				if( $(this).hasClass('collapse') ){
					$(this).removeClass('collapse');
				}
				else{
					$(this).addClass('collapse');
				}
			});
    }
  };

  DIGICORP.fitVids = {
    init: function() {
      // make embeded videos responsive
      // $('.single-format-video .post-desc').fitVids({ customSelector: 'iframe[src*="aparat.com"]' });;
      $('.post-desc').fitVids({ customSelector: 'iframe[src*="aparat.com"]' });;
      $('.section-content').fitVids({ customSelector: 'iframe[src*="aparat.com"]' });;

      $('.fluid-width-video-wrapper iframe').attr('frameborder','0');
    },
  };

  DIGICORP.owlCarousel = {
    init: function() {
      $('.owl-projects').owlCarousel({
          loop:true,
          margin:10,
          dots:false,
          rtl: DIGICORP.DIR.isRTL(),
          responsiveClass:true,
          navText: [
             '<i class="fa fa-angle-' + (DIGICORP.DIR.isRTL() ? 'right' : 'left') + '"></i>',
             '<i class="fa fa-angle-' + (DIGICORP.DIR.isRTL() ? 'left' : 'right') + '"></i>'
          ],
          responsive:{
              0:{
                  items: 1,
                  nav: false,
                  dots: true
              },
              501:{
                  items: 2,
                  nav: false,
                  dots: true
              },
              768:{
                  items: 3,
                  nav: false,
                  dots: true
              },
              992:{
                  items: 5,
                  nav: true,
                  loop: false
              },
              1200:{
                  items: 6,
                  nav: true,
                  loop: false
              }
          }
      });
    }
  };

  DIGICORP.documentOnReady = {
    init: function() {
      DIGICORP.scrollTo.init();
      DIGICORP.yoastFaq.init();
      DIGICORP.backToTop.init();
      DIGICORP.headerAffix.init();
      DIGICORP.fitVids.init();
      DIGICORP.owlCarousel.init();
    }
  };

  DIGICORP.windowOnScroll = {
    init: function() {
      DIGICORP.backToTop.onScroll();
      DIGICORP.backToTop.dynamicPosition();
    }
  };

  DIGICORP.windowOnResize = {
    init: function() {

    }
  };

  $(document).ready(DIGICORP.documentOnReady.init);
  $(window).scroll(DIGICORP.windowOnScroll.init);
  $(window).on('resize',DIGICORP.windowOnResize.init);

})(jQuery);
