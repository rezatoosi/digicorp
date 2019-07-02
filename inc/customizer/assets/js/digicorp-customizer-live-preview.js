/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#site-desc' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

  // --- Slider - Typed
  wp.customize( 'digicorp_typed_slider_enabled', function( value ) {
		value.bind( function( to ) {
      if ( 1 == to ) {
        $( '#typed-slider' ).removeClass( 'customizer-display-none' );
        $( '#slider-cta' ).removeClass( 'customizer-display-none' );
      } else if ( 0 == to ) {
        $( '#typed-slider' ).addClass( 'customizer-display-none' );
        $( '#slider-cta' ).addClass( 'customizer-display-none' );
      }
		} );
	} );

  wp.customize( 'digicorp_typed_slider_title', function( value ) {
    value.bind( function( to ) {
      $( '#typed-slider .heading-holder > h1' ).html( to );
    } );
  } );

  wp.customize( 'digicorp_typed_slider_info_tags', function( value ) {
    value.bind( function( to ) {
      $( '#typed-slider .infos' ).empty();
      var items = to.split('\n');
      $.each( items, function( i, v ){
        $( '#typed-slider .infos' ).append( '<span class="info"><i class="fa fa-star"></i> ' + v + '</span>' );
      } );
    } );
  } );

  wp.customize( 'digicorp_typed_slider_background', function( value ) {
    value.bind( function( to ) {
      $( '#typed-slider > #typed-slider-bg' ).attr( 'src', to );
    } );
  } );

  wp.customize( 'digicorp_typed_slider_cta_text', function( value ) {
    value.bind( function( to ) {
      $( '#slider-cta #cta > a' ).text( to );
    } );
  } );

  // --- sections - Features
  wp.customize( 'digicorp_sections_features_enabled', function( value ) {
		value.bind( function( to ) {
      if ( 1 == to ) {
        $( '#section-features' ).removeClass( 'customizer-display-none' );
      } else if ( 0 == to ) {
        $( '#section-features' ).addClass( 'customizer-display-none' );
      }
		} );
	} );

  wp.customize( 'digicorp_sections_features_title', function( value ) {
    value.bind( function( to ) {
      $( '#section-features .section-title > h3' ).html( to );
    } );
  } );

  wp.customize( 'digicorp_sections_features_subtitle', function( value ) {
    value.bind( function( to ) {
      $( '#section-features .section-title > h5' ).html( to );
    } );
  } );

	// --- sections - services
  wp.customize( 'digicorp_sections_services_enabled', function( value ) {
		value.bind( function( to ) {
      if ( 1 == to ) {
        $( '#section-services' ).removeClass( 'customizer-display-none' );
      } else if ( 0 == to ) {
        $( '#section-services' ).addClass( 'customizer-display-none' );
      }
		} );
	} );

  wp.customize( 'digicorp_sections_services_title', function( value ) {
    value.bind( function( to ) {
      $( '#section-services .section-title > h3' ).html( to );
    } );
  } );

  wp.customize( 'digicorp_sections_services_subtitle', function( value ) {
    value.bind( function( to ) {
      $( '#section-services .section-title > h5' ).html( to );
    } );
  } );

	// --- sections - projects
  wp.customize( 'digicorp_sections_projects_enabled', function( value ) {
		value.bind( function( to ) {
      if ( 1 == to ) {
        $( '#section-projects' ).removeClass( 'customizer-display-none' );
      } else if ( 0 == to ) {
        $( '#section-projects' ).addClass( 'customizer-display-none' );
      }
		} );
	} );

  wp.customize( 'digicorp_sections_projects_title', function( value ) {
    value.bind( function( to ) {
      $( '#section-projects .section-title > h3' ).html( to );
    } );
  } );

  wp.customize( 'digicorp_sections_projects_subtitle', function( value ) {
    value.bind( function( to ) {
      $( '#section-projects .section-title > h5' ).html( to );
    } );
  } );

  // --- sections - blog
  wp.customize( 'digicorp_sections_blog_enabled', function( value ) {
    value.bind( function( to ) {
      if ( 1 == to ) {
        $( '#section-blog' ).removeClass( 'customizer-display-none' );
      } else if ( 0 == to ) {
        $( '#section-blog' ).addClass( 'customizer-display-none' );
      }
    } );
  } );

  wp.customize( 'digicorp_sections_blog_title', function( value ) {
    value.bind( function( to ) {
      $( '#section-blog .section-title > h3' ).html( to );
    } );
  } );

  wp.customize( 'digicorp_sections_blog_subtitle', function( value ) {
    value.bind( function( to ) {
      $( '#section-blog .section-title > h5' ).html( to );
    } );
  } );

  // --- sections - Testimonials
  wp.customize( 'digicorp_sections_testimonials_enabled', function( value ) {
    value.bind( function( to ) {
      if ( 1 == to ) {
        $( '#section-testimonials' ).removeClass( 'customizer-display-none' );
      } else if ( 0 == to ) {
        $( '#section-testimonials' ).addClass( 'customizer-display-none' );
      }
    } );
  } );

  wp.customize( 'digicorp_sections_testimonials_title', function( value ) {
    value.bind( function( to ) {
      $( '#section-testimonials .section-title > h3' ).html( to );
    } );
  } );

  wp.customize( 'digicorp_sections_testimonials_subtitle', function( value ) {
    value.bind( function( to ) {
      $( '#section-testimonials .section-title > h5' ).html( to );
    } );
  } );

} )( jQuery );
