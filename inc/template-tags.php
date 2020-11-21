<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package DIGICORP
 */

 if ( ! function_exists( 'digicorp_page_header_section' ) ) :
 	/**
 	 * Prints HTML with meta information for the current post-date/time.
 	 */
 	function digicorp_page_header_section( $args = array() ) {
    $object_id = get_queried_object_id();
    $defaults = array(
      'section_class' => 'visual',
      'page_title' => get_the_title( $object_id ),
      'page_desc' => get_post_meta( $object_id, "post_desc", true),
      'page_header_image_src' => get_post_meta( $object_id, "post_header_image", true)
    );
    $args = wp_parse_args( $args, $defaults );

    if ( '' !== $args['page_desc'] ) {
      $args['page_desc'] = sprintf( '<p class="tagline">%s</p>', wp_strip_all_tags( $args['page_desc'] ) );
    }
    if ( '' !== $args['page_header_image_src'] && false !== $args['page_header_image_src'] ) {
      $args['page_header_image_src'] = sprintf( ' data-bg-img="%s"', $args['page_header_image_src'] );
      $args['section_class'] .= ' imagebg bg-highlight bg-highlight-lightblack';
    }

    $page_title = ( is_search() ) ? sprintf( /* Translators: %s: page title for search page */ __( 'Search results for "%s"', 'digicorpdomain' ), get_search_query() ) : esc_html( $args['page_title'] );

    echo '<section id="page-header" class="' . esc_attr( $args['section_class'] ) . '"' . $args['page_header_image_src'] . '>';
    echo     '<div class="container">';
    echo         '<div class="text-block">';
    echo             '<div class="heading-holder">';
    echo                 '<h1>' . $page_title . '</h1>';
    echo             '</div>';
    echo             $args['page_desc'];
    echo         '</div>';
    echo     '</div>';
    echo '</section>';
    echo digicorp_breadcrumb();

 	}
 endif;

 if ( ! function_exists( 'digicorp_breadcrumb' ) ) :
 	/**
 	 * Prints HTML with meta information for the current post-date/time.
 	 */
 	function digicorp_breadcrumb() {

    if ( function_exists( 'yoast_breadcrumb' ) ) {
      echo '<div class="breadcrumb"><div class="container">';
      yoast_breadcrumb( '<nav aria-label="breadcrumb">','</nav>' );
      echo '</div></div>';
    }

 	}
 endif;

if ( ! function_exists( 'digicorp_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function digicorp_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'digicorpdomain' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'digicorp_get_publish_time' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function digicorp_get_publish_time() {
		return sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date( 'j M Y' ) )
		);
	}
endif;

if ( ! function_exists( 'digicorp_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function digicorp_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'digicorpdomain' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'digicorp_entry_header_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function digicorp_entry_header_meta( $add_container = false, $container_css_class = '' ) {
		// Hide for pages.
		if ( 'post' === get_post_type() ) {

      if ( $add_container ) {
          ( ! empty( $container_css_class ) ) ? $container_css_class = ' class="' . $container_css_class . '"' : '';
          printf( '<div%s>', $container_css_class );
      }

      printf( '<span class="avatar">%s</span>' , digicorp_get_user_avatar_and_name() );

      echo '<small>&#124;</small>'; // seprator

      printf(
        '<span><a href="%1$s" title="%2$s"><i class="fa fa-clock-o"></i> %3$s</a></span>',
        get_month_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ),
        sprintf(
          /* translators: %s: post publish date - Month and Year */
          __( 'Click for all articles sent on %s' , 'digicorpdomain' ), get_the_time('M Y') ),
        digicorp_get_publish_time()
      );

      // Show reading time
      echo '<small>&#124;</small>'; // seprator
      echo digicorp_get_reading_time( false , true );


      // show comments count
      if ( /*! is_single() &&*/ ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<small class="hidden-xs">&#124;</small>'; // seprator
  			echo '<span class="comments-link hidden-xs">';
        comments_popup_link(
          '<i class="fa fa-comments-o"></i> 0',
          '<i class="fa fa-comments-o"></i> 1',
          '<i class="fa fa-comments-o"></i> %'
        );
  			echo '</span>';
  		}

      // TODO: implement the visit count
      // <small class="hidden-xs">&#124;</small>
      // <span class="hidden-xs"><a href="single.html"><i class="fa fa-eye"></i> 444</a></span>

      // show edit link if user logged in
  		edit_post_link(
  			sprintf(
  				wp_kses(
  					/* translators: %s: Name of current post. Only visible to screen readers */
  					__( 'Edit<span class="screen-reader-text sr-only">%s</span>', 'digicorpdomain' ),
  					array(
  						'span' => array(
  							'class' => array(),
  						),
  					)
  				),
  				get_the_title()
  			),
  			'<small>&#124;</small><span class="edit-link">',
  			'</span>'
  		);

      if ( $add_container ) {
          echo '</div>';
      }

		}

	}
endif;

if ( ! function_exists( 'digicorp_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function digicorp_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( ' ' );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="tags clearfix">' . esc_html__( 'In Categories: %1$s', 'digicorpdomain' ) . '</div><!-- end categories -->', $categories_list ); // WPCS: XSS OK.
			}

			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags clearfix">' . esc_html__( 'Tags: %1$s', 'digicorpdomain' ) . '</div><!-- end tags -->', $tags_list ); // WPCS: XSS OK.
			}

		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( '<button class="btn">Edit <span class="sr-hidden">This Post</span><span class="screen-reader-text sr-only"> %s</span></button>', 'digicorpdomain' ),
					array(
						'span' => array( 'class' => array() ),
            'button' => array( 'class' => array() ),
					)
				),
				get_the_title()
			),
			'<div class="edit-link clearfix margin-top-xl">',
			'</div>'
		);
	}
endif;

if ( ! function_exists( 'digicorp_footer_share_buttons' ) ) {
  /**
   * Display share buttons in post footer
   **/
   function digicorp_footer_share_buttons() {
     $page_link = urlencode(get_the_permalink());
     // $page_link = 'https://arianada.com/';
     $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
     $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
     $summary = get_the_excerpt();
     $source = get_site_url();

     $container = '<div class="post-share-buttons">%s<ul class="share-buttons">%s</ul></div>';
     $container = '<div class="post-share-buttons tags">%s %s</div>';
     $item_markup = '<li><a class="%1$s" href="%2$s">%3$s<span>%4$s</span></a></li>';
     $item_markup = '<a class="%1$s" href="%2$s">%3$s<span>%4$s</span></a>';

     // linkedin
     $url = sprintf(
       // 'https://www.linkedin.com/shareArticle?mini=false&url=%s&title=%s&summary=%s&source=%s',
       'https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s',
       $page_link,
       $title
       // $summary,
       // $source
     );
     $items = sprintf(
       $item_markup,
       'share-linkedin',
       $url,
       digicorp_svg( 'social-linkedin2', '', '0 0 24 24' ),
       'LinkedIn'
     );

     //twitter
     $url = sprintf(
       'https://twitter.com/intent/tweet?text=%2$s&url=%1$s',
       $page_link,
       $title
     );
     $items .= sprintf(
       $item_markup,
       'share-twitter',
       $url,
       digicorp_svg( 'social-twitter', '', '0 0 24 24' ),
       'Twitter'
     );

     // facebook
     $url = sprintf(
       'http://www.facebook.com/sharer.php?u=%s&p[title]=%s',
       $page_link,
       $title
     );
     $items .= sprintf(
       $item_markup,
       'share-facebook',
       $url,
       digicorp_svg( 'social-facebook2', '', '0 0 24 24' ),
       'Facebook'
     );

     //whatsapp
     $url = sprintf(
       'https://wa.me/?text=%2$s %1$s',
       $page_link,
       $title
     );
     $items .= sprintf(
       $item_markup,
       'share-whatsapp',
       $url,
       digicorp_svg( 'social-whatsapp', '', '0 0 24 24' ),
       'WhatsApp'
     );

     //telegram
     $url = sprintf(
       'https://telegram.me/share/url?url=%s&text=%s',
       $page_link,
       $title
     );
     $items .= sprintf(
       $item_markup,
       'share-telegram',
       $url,
       digicorp_svg( 'social-telegram2', '', '0 0 24 24' ),
       'Telegram'
     );

     //email
     $url = sprintf(
       'mailto:?subject=%3$s&body=%2$s: %1$s',
       $page_link,
       $title,
       esc_html__( 'Check this out please', 'digicorpdomain' )
     );
     $items .= sprintf(
       $item_markup,
       'share-email',
       $url,
       digicorp_svg( 'svg-icon-message-closed-envelope-1', '', '0 0 512 512' ),
       'Mail'
     );

     //copylink
     // $url = sprintf(
     //   '',
     //   $page_link,
     //   $title
     // );
     // $items .= sprintf(
     //   $item_markup,
     //   'share-copylink',
     //   'mailto: ',
     //   digicorp_svg( 'svg-icon-link-chain', '', '0 0 512 512' ),
     //   'Copy Link'
     // );

     printf(
       $container,
       esc_html__( 'Share This:', 'digicorpdomain' ),
       $items
     );
   }
}

if ( ! function_exists( 'digicorp_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function digicorp_post_thumbnail( $container_class ) {

    if ( post_password_required() || is_attachment() /* || ! has_post_thumbnail() */ ) {
        return;
    }

    global $post;

    $container = '%s';
    if ( $container_class ) {
      $container = '<div class="' . $container_class . '">%s</div>';
    }
    $link = '<a href="%1$s" aria-hidden="true" tabindex="-1">%2$s</a>';
    $image = '<img src="%1$s" alt="%2$s" class="img-responsive"/>';
    $image_alt = ( get_the_post_thumbnail_caption( $post ) ) ? esc_attr( get_the_post_thumbnail_caption( $post ) ) : esc_attr( get_the_title() );

    if ( has_post_thumbnail() ) {
      $image = sprintf(
        $image,
        esc_url( get_the_post_thumbnail_url( $post, 'small' ) ),
        $image_alt
      );
    }
    else {
      $image = sprintf(
        $image,
        digicorp_get_post_default_image_uri(),
        $image_alt
      );
    }

    printf(
      $container,
      sprintf(
          $link,
          get_the_permalink(),
          $image
        )
    );
	}
endif;

if ( ! function_exists( 'digicorp_post_header_image' ) ) {
  /*
  ** Display post header image for single post
  */
  function digicorp_post_header_image( $container_class ) {
    {

      if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
          return;
      }

      global $post;

      $container = '%s';
      if ( $container_class ) {
        $container = '<div class="' . $container_class . '">%s</div>';
      }
      $link = '<a href="%1$s" aria-hidden="true" tabindex="-1">%2$s</a>';
      $image = '<img src="%1$s" alt="%2$s" class="img-responsive"/>';
      $image_alt = ( get_the_post_thumbnail_caption( $post ) ) ? esc_attr( get_the_post_thumbnail_caption( $post ) ) : esc_attr( get_the_title() );

      printf(
        $container,
        sprintf(
            $link,
            esc_url( get_the_post_thumbnail_url( $post, 'full' ) ),
            sprintf(
                $image,
                esc_url( get_the_post_thumbnail_url( $post, 'page_header' ) ),
                $image_alt
              )
          )
      );
  	}
  }
}

if ( ! function_exists( 'digicorp_get_post_default_image_uri' ) ) :
  /**
    * Return default image used in posts if post has no image
    */
    function digicorp_get_post_default_image_uri() {
      return esc_url( get_template_directory_uri() . '/assets/dist/images/post-default.png' );
      // TODO: get default image in admin panel and use here
    }
endif;

if ( ! function_exists( 'digicorp_get_post_excerpt_meta' ) ) {
  function digicorp_get_post_excerpt_meta() {
    $reading_time = digicorp_get_reading_time();
    $reading_time = ( $reading_time ) ? ' | ' . $reading_time : '';
    echo digicorp_get_the_category_link() . $reading_time;
  }
}

if ( ! function_exists( 'digicorp_get_user_avatar_markup' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function digicorp_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}
    $display_name = get_the_author_meta( 'display_name', $id_or_email );

		return get_avatar( $id_or_email, null, null, $display_name, array( 'class' => array( 'img-circle' ) ) );
	}
endif;

if ( ! function_exists( 'digicorp_get_user_avatar_and_name' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function digicorp_get_user_avatar_and_name() {
    $display_name = get_the_author_meta( 'display_name' );
		return sprintf(
      '<a href="%1$s" title="%2$s">%3$s %4$s</a>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      /* translators: %s: Display name of the user */
      esc_attr( sprintf( __('Visit archive page of %s', 'digicorpdomain' ), $display_name ) ),
      digicorp_get_user_avatar_markup(),
      esc_attr( $display_name )
    );
	}
endif;

if ( ! function_exists( 'digicorp_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function digicorp_the_posts_navigation() {
    // Pagination
    global $wp_query;
    $big = 999999999;
    $pagination = array(
      'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'             => '?paged=%#%',
      'total'              => $wp_query->max_num_pages,
      'current'            => max( 1, get_query_var('paged') ),
      'show_all'           => false,
      'prev_next'          => true,
      'prev_text'          => __('«', 'digicorpdomain'),
      'next_text'          => __('»', 'digicorpdomain'), // TODO: what was the SVG in 2019 theme?
      'type'               => 'list',
      'add_args'           => false,
      'add_fragment'       => '',
      'before_page_number' => '',
      'after_page_number'  => ''
    );

    $links_output = paginate_links( $pagination );
    echo '<nav class="clearfix">' . str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $links_output ) . '</nav>';
	}
endif;

if ( ! function_exists( 'digicorp_link_pages' ) ) :
  /**
   * run wp_link_pages
   */
   function digicorp_link_pages() {
     wp_link_pages( array(
       'before'       => '<nav class="clearfix"><div class="pagination">',
       'after'        => '</div></nav>',
       'link_before'  => '<button class="btn btn-default">',
       'link_after'   => '</button>',
       /* translators: % is page number */
       'pagelink'     => __( 'Page %', 'digicorpdomain' )
     ) );
   }
endif;

if ( ! function_exists( 'digicorp_get_post_type_link' ) ) {
  /**
  * get post type markup for excerpt2 - search page
  */
  function digicorp_get_post_type_link() {
      $posttype = get_post_type();
      $markup = '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>';
      $markup_class = '';
      $markup_title = '';

      switch ( $posttype ) {
        case 'post':
          $markup_class = 'posttype-post';
          $markup_title = __( 'Blog', 'digicorpdomain' );
          break;

        case 'page':
          // $markup_class = 'posttype-page';
          // $markup_title = __( 'Site', 'digicorpdomain' );
          return '';
          break;

        case 'ariana-services':
          $markup_class = 'posttype-services';
          $markup_title = __( 'Our Services', 'digicorpdomain' );
          break;

        case 'ariana-projects':
          $markup_class = 'posttype-projects';
          $markup_title = __( 'Our Projects', 'digicorpdomain' );
          break;

        default:
          return '';
          break;
      }

      return sprintf( $markup,
                      get_post_type_archive_link( $posttype ),
                      /* Translators: %s: Title of post type, in post excerpt view */
                      sprintf( __( 'Found in %s' , 'digicorpdomain' ), $markup_title ),
                      $markup_class,
                      $markup_title );
  }
}

if ( ! function_exists( 'digicorp_get_the_category' ) ) {
  /**
  * return the category of current post (wp_term object)
  **/
  function digicorp_get_the_category() {
    $categories = get_the_category();
    return $categories[0];
  }
}

if ( ! function_exists( 'digicorp_get_the_category_link' ) ) {
  /**
  * return link of the first category of current post link
  **/
  function digicorp_get_the_category_link() {
    if ( 'post' !== get_post_type() ) { return digicorp_get_post_type_link(); }
    $category = digicorp_get_the_category();
    // $markup = '<a href="%1$s" title="%2$s"><i class="fa fa-tag"></i> %3$s</a>';
    $markup = '<a href="%1$s" title="%2$s">%3$s</a>';
    return sprintf( $markup,
                    esc_url( get_category_link( $category->term_id ) ),
                    sprintf(
                      /* Translators: %s: Name of category */
                      esc_html__( 'Visit articles in category of %s', 'digicorpdomain' ), $category->name ),
                    esc_html( $category->name )
                  );
  }
}

if ( ! function_exists( 'digicorp_count_unicode_words' ) ) {

  function digicorp_count_unicode_words( $unicode_string ){
    // First remove all the punctuation marks & digits
    $unicode_string = preg_replace('/[[:punct:][:digit:]]/', '', $unicode_string);
    // Now replace all the whitespaces (tabs, new lines, multiple spaces) by single space
    $unicode_string = preg_replace('/[[:space:]]/', ' ', $unicode_string);
    // The words are now separated by single spaces and can be splitted to an array
    // I have included \n\r\t here as well, but only space will also suffice
    $words_array = preg_split( "/[\n\r\t ]+/", $unicode_string, 0, PREG_SPLIT_NO_EMPTY );
    // Now we can get the word count by counting array elments
    return count($words_array);
  }

}

if ( ! function_exists( 'digicorp_get_reading_time' ) ) {
  /**
  ** get estimated reading time
  **/
  function digicorp_get_reading_time( $insert_icon = true, $insert_pretext = false ) {
    if ( 'post' !== get_post_type() ) { return false; }
    $time = 0;
    $content = strip_tags( get_post_field( 'post_content' ) );
    // $word_count = str_word_count( $content , 2 ); Not work for persian words
    $word_count = digicorp_count_unicode_words( $content );
    $readingtime = ceil($word_count / 150);
    $readingtime = digicorp_num_i18n( $readingtime );

    // if ($readingtime == 1) {
    //   $timer = " minute";
    // } else {
    //   $timer = " minutes";
    // }
    $markup = '<span>%s %s %s %s</span>';
    // $markup = '<span>%1$s %2$s %3$s</span>';
    // return sprintf( $markup,
    //                 __( 'Read time:', 'digicorpdomain' ),
    //                 $readingtime,
    //                 __( 'min', 'digicorpdomain' )
    //               );
    return sprintf( $markup,
                    ( $insert_icon ) ? '<i class="fa fa-clock-o"></i> ' : '',
                    ( $insert_pretext ) ? __( 'Read time:', 'digicorpdomain' ) : '',
                    $readingtime,
                    __( 'min', 'digicorpdomain' )
                  );
  }
}

if ( ! function_exists( 'digicorp_get_search_found_posts_count' ) ) {
  /**
  ** show count of found posts in search results
  **/
  function digicorp_get_search_found_posts_count() {
    global $wp_query;
    $found_posts = $wp_query->found_posts;
    return $found_posts;
  }
}

if ( ! function_exists( 'digicorp_get_menu_lang_link' ) ) {
  /**
  ** get link of alternate language for header menu
  **/
  function digicorp_get_menu_lang_link() {
    if ( ! function_exists( 'the_msls' ) || ! class_exists( 'Digicorp_MslsOutput' ) ) {
      return '';
    }

    $alt_lang_url = Digicorp_MslsOutput::init()->get_url();

    $menu_lang = '<a href="%1$s" class="header-lang-btn" title="%3$s">%2$s <span class="sr-only">%3$s</span></a>';
    if ( 'fa_IR' == get_locale() ) {
      $menu_lang = sprintf( $menu_lang, $alt_lang_url, 'EN', 'Enter to english site' );
    }
    else {
      $menu_lang = sprintf( $menu_lang, esc_url( $alt_lang_url ) , 'فا', 'ورود به سایت فارسی' );
    }

    return $menu_lang;
  }
}

if ( ! function_exists( 'digicorp_prev_next_links' ) ) {
  /**
  ** get previous & next post links - blog post single page
  **/
  function digicorp_prev_next_links() {
    if ( 'post' === get_post_type() ) : ?>
    <div class="blog-micro-wrapper">
        <div class="postpager">
            <ul class="pager row">
              <li class="previous col-md-6 col-sm-12 text-right">
                <?php
                $prev_post = get_previous_post(true);
                if (!empty($prev_post)) {
                  $prev_thumb_url = get_the_post_thumbnail_url($prev_post,'thumbnail');
                  if ( empty($prev_thumb_url) ) { $prev_thumb_url = get_template_directory_uri() . '/assets/dist/images/post-default.png'; }
                  ?>
                    <div class="post">
                        <div class="mini-widget-thumb">
                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                <img alt="<?php echo esc_attr($prev_post->post_title) ?>" src="<?php echo esc_url($prev_thumb_url) ?>" class="img-responsive alignright img-circle">
                            </a>
                        </div>
                        <div class="mini-widget-title">
                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo esc_attr($prev_post->post_title) ?><br/>
                            <small><?php _e('<  Previous Post', 'digicorpdomain' ); ?></small></a>
                        </div>
                    </div>
                <?php } ?>
              </li>
              <li class="next col-md-6 col-sm-12 text-left">
                <?php
                $next_post = get_next_post(true);
                if (!empty($next_post)) {
                  $next_thumb_url = get_the_post_thumbnail_url($next_post,'thumbnail');
                  if ( empty($next_thumb_url) ) { $next_thumb_url = get_template_directory_uri() . '/assets/dist/images/post-default.png'; }
                  ?>
                    <div class="post">
                        <div class="mini-widget-thumb">
                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                                <img alt="<?php echo esc_attr($next_post->post_title) ?>" src="<?php echo esc_url($next_thumb_url) ?>" class="img-responsive alignleft img-circle">
                            </a>
                        </div>
                        <div class="mini-widget-title">
                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo esc_attr($next_post->post_title) ?><br/>
                            <small><?php _e('Next Post  >', 'digicorpdomain' ); ?></small></a>
                        </div>
                    </div>
                <?php } ?>
              </li>
            </ul>
        </div><!-- end postpager -->
    </div><!-- end post-micro -->
    <?php endif;
  }
}

if ( ! function_exists( 'digicorp_related_posts' ) ) {
  /**
   ** get list of relatet posts - use in blog single
   **/
  function digicorp_related_posts() {
    global $post;
    $orig_post = $post;

    $tags = wp_get_post_tags( $post->ID );
    if ( $tags ) {
      $tag_ids = array();
      foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
      $args = array(
        'tag__in'             =>  $tag_ids,
        'post__not_in'        =>  array($post->ID),
        'posts_per_page'      =>  3, // Number of related posts that will be shown.
        'ignore_sticky_posts' =>  1
      );
      $my_query = new wp_query( $args );
      if( $my_query->have_posts() ) {
        ?>
        <section class="section bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left">
                          <h4><?php _e( 'Related Articles', 'digicorpdomain' ); ?></h4>
                          <hr>
                        </div>
                        <div class="row">
                        <?php
                          while( $my_query->have_posts() ) {
                            $my_query->the_post();
                            // get_template_part('template-parts/post/blog','related');
                            echo '<div class="col-md-4 col-sm-6">';
                            get_template_part('template-parts/content/content','excerptv3');
                            echo '</div>';
                          }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
      }
    }
    $post = $orig_post;
    wp_reset_query();
  }
}

if ( ! function_exists( 'digicorp_related_posts_sidebar' ) ) {
  /**
  ** get list of relatet posts - use in sidebar
  **/
  function digicorp_related_posts_sidebar() {
    global $post;
    $orig_post = $post;
    $tags = wp_get_post_tags( $post->ID );
    if ( $tags ) {
      $tag_ids = array();
      foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
      $args = array(
        'tag__in'             =>  $tag_ids,
        'post__not_in'        =>  array($post->ID),
        'posts_per_page'      =>  4, // Number of related posts that will be shown.
        'ignore_sticky_posts' =>  1
      );
      $my_query = new wp_query( $args );
      if( $my_query->have_posts() ) {
        ?>
        <div id="ariana-recent-posts-2" class="widget clearfix">
          <div class="section-title text-left">
            <h5><?php _e( 'Related Articles', 'digicorpdomain' ); ?></h5>
            <hr>
          </div>
          <div class="shopwidget">
          		<ul class="shop-list">
              <?php
                while( $my_query->have_posts() ) {
                  $my_query->the_post();
                  // get_template_part('template-parts/post/blog','recent');
                  ?>
                  <li>
                    <a href="<?php esc_url(the_permalink()); ?>">
                      <img src="<?php esc_url(the_post_thumbnail_url('small')); ?>" alt="<?php the_title(); ?>" class="img-responsive">
                      <h3><?php the_title(); ?></h3>
                      <small><span class="post-date"><?php echo the_time('j M Y'); ?></span></small>
                    </a>
                  </li>
                <?php
                }
              ?>
            </ul>
          </div>
        </div>
    <?php
      }
    }
    $post = $orig_post;
    wp_reset_query();
  }
}

if ( ! function_exists( 'digicorp_all_services_list' ) ) {
  /**
  ** show sub services (related services) in single service page
  **/
  function digicorp_all_services_list() {
    ?>
    <section class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <?php //<h5>ALL IN ONE SEARCH ENGINE TOOLS</h5> ?>
                <h3>
                  <?php
                    /* translators: title of other services section in single page of services */
                    _e( 'OTHER SERVICES', 'digicorpdomain' ); ?></h3>
                <hr>
            </div><!-- end title -->
            <div class="row services-list">
                <?php echo do_shortcode('[ariana_services]'); ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <?php
  }
}

if ( ! function_exists( 'digicorp_sub_services_list' ) ) {
  /**
  ** show sub services in single service page
  **/
  function digicorp_sub_services_list() {
    global $post;
    $service_title = $post->post_title;
    $args = array(
        'post_parent' => $post->ID,
        'posts_per_page' => -1,
        'post_type' => 'ariana-services', //you can use also 'any'
        'orderby' => 'menu_order',
        );

    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
    ?>
    <section class="section bg-light-gray services-list">
        <div class="container">
          <div class="section-title text-center">
              <!--<h5><?php// _e( 'What services does it consist of?', 'digicorpdomain' ); ?></h5>-->
              <h3>
                <?php
                  /* translators: %s: title of service. this text will add to title of sub services section in single page of services */
                  printf( __( '%s includes the following services', 'digicorpdomain' ), $service_title )?>
              </h3>
              <hr>
          </div><!-- end title -->
          <?php


          while ( $the_query->have_posts() ) :
            $the_query->the_post();

            $url_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $img_markup = '';
            if ( ! empty( $url_thumb ) ) {
              $img_markup = sprintf( '<img src="%s" alt="%s" class="img-responsive" />',
                                    $url_thumb[0],
                                    $post->post_title );
            }
            $post_home_subtitle = get_post_meta( $post->ID, 'post_home_subtitle', true );
            ?>
              <div class="col-md-3 col-sm-6">
                <div class="item">
                  <div class="item-image">
                    <a href="<?php echo get_the_permalink( $post->ID ) ?>"><?php echo $img_markup; ?>
                    <span class="item-icon">
                      <i class="fa fa-link"></i></span></a>
                  </div><!-- end item-image -->
                  <div class="item-desc text-center">
                    <h4><a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>"><?php echo $post->post_title ?></a></h4>
                    <?php if ( $post_home_subtitle != '' ) { ?>
                      <h5><a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>"><?php echo $post_home_subtitle ?></a></h5>
                    <?php } ?>
                  </div><!-- end service-desc -->
                </div><!-- end seo-item -->
              </div><!-- end col -->
            <?php
          endwhile;
          ?>
        </div>
    </section>
    <?php
    endif;

    wp_reset_postdata();
  }
}

if ( ! function_exists( 'digicorp_related_services_query' ) ) {
  /**
  **  return the wp_query of related services
  **/
  function digicorp_related_services_query() {
    global $post;
    $service_slug = $post->post_name;
    $service_slug = urldecode($service_slug);
    $terms = get_the_terms( $post->ID, 'ariana-services-tags', 'string' );
    $term_names[] = $service_slug;
    $term_names[] = $post->post_title;

    if ( is_array( $terms ) ) {
      // $term_ids = wp_list_pluck( $terms, 'term_id' );
      $term_names = array_merge( $term_names, wp_list_pluck( $terms, 'name' ) );
    }

    $args = array(
        'post_type' => 'ariana-services',
        'tax_query' => array(
          array(
            'taxonomy' => 'ariana-services-tags',
            'field' => 'name',
            'terms' => $term_names,
            'operator' => 'IN'
          )
        ),
        'posts_per_page' => -1,
        'ignore_stiky_posts' => 1,
        'post__not_in' => array( $post->ID ),
        'orderby' => 'menu_order'
        );

    $the_query = new WP_Query( $args );
    return $the_query;
  }
}

if ( ! function_exists( 'digicorp_related_services_list' ) ) {
  /**
  ** show related services in single service page - by tags
  **/
  function digicorp_related_services_list() {
    global $post;
    $service_title = $post->post_title;

    $the_query = digicorp_related_services_query();
    if ( $the_query->have_posts() ) :
    ?>
    <section class="section services-list">
        <div class="container">
          <div class="section-title text-center">
              <!--<h5><?php// _e( 'What services does it consist of?', 'digicorpdomain' ); ?></h5>-->
              <h3>
                <?php
                  /* translators: %s: title of service. this text will add to title of related services section in single page of services */
                  printf( __( '%s related services', 'digicorpdomain' ), $service_title )?>
              </h3>
              <hr>
          </div><!-- end title -->
          <?php


          while ( $the_query->have_posts() ) :
            $the_query->the_post();

            $url_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $img_markup = '';
            if ( ! empty( $url_thumb ) ) {
              $img_markup = sprintf( '<img src="%s" alt="%s" class="img-responsive" />',
                                    $url_thumb[0],
                                    $post->post_title );
            }
            $post_home_subtitle = get_post_meta( $post->ID, 'post_home_subtitle', true );
            ?>
              <div class="col-md-3 col-sm-6">
                <div class="item">
                  <div class="item-image">
                    <a href="<?php echo get_the_permalink( $post->ID ) ?>"><?php echo $img_markup; ?>
                    <span class="item-icon">
                      <i class="fa fa-link"></i></span></a>
                  </div><!-- end item-image -->
                  <div class="item-desc text-center">
                    <h4><a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>"><?php echo $post->post_title ?></a></h4>
                    <?php if ( $post_home_subtitle != '' ) { ?>
                      <h5><a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>"><?php echo $post_home_subtitle ?></a></h5>
                    <?php } ?>
                  </div><!-- end service-desc -->
                </div><!-- end seo-item -->
              </div><!-- end col -->
            <?php
          endwhile;
          ?>
        </div>
    </section>
    <?php
    endif;

    wp_reset_postdata();
  }
}

if ( ! function_exists( 'digicorp_urlencode' ) ) {
  function digicorp_urlencode( &$item, $key ) {
    $item = urlencode( $item );
  }
}

if ( ! function_exists( 'digicorp_related_posts_in_services' ) ) {
  /**
   ** get list of relatet posts - use in services single
   **/
  function digicorp_related_posts_in_services() {
    global $post;
    $service_title = $post->post_title;
    $service_slug = $post->post_name;
    $service_slug = urldecode($service_slug);
    $terms = get_the_terms( $post->ID, 'ariana-services-tags', 'string' );
    $term_names[] = $service_slug;

    if ( is_array( $terms ) ) {
      // $term_ids = wp_list_pluck( $terms, 'term_id' );
      $term_names = array_merge( $term_names, wp_list_pluck( $terms, 'name' ) );
    }

    $term_names_encoded = $term_names;
    array_walk( $term_names_encoded, 'digicorp_urlencode');

    $args = array(
        // 'post_type' => 'ariana-services',
        'tax_query' => array(
          'relation' => 'OR',
          array(
            'taxonomy' => 'post_tag',
            'field' => 'name',
            'terms' => $term_names,
            'operator' => 'IN'
          ),
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $term_names_encoded,
            'operator' => 'IN'
          )
        ),
        'posts_per_page' => -1,
        'ignore_stiky_posts' => 1,
        'orderby' => 'menu_order'
        );
    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
      ?>
      <section class="section lb blog-related-posts-in-services">
        <div class="container">
          <div class="section-title text-center">
              <h5><?php
                /* translators: this text will add to pre title of related posts of a service section in single page of services */
                _e( 'Knowledge base', 'digicorpdomain' ); ?></h5>
              <h3>
                <?php
                  /* translators: %s: title of service. this text will add to title of related posts of a service section in single page of services */
                  printf( __( '%s related articles', 'digicorpdomain' ), $service_title )?>
              </h3>
              <hr>
          </div><!-- end title -->
          <div class="row">
            <?php
              while( $my_query->have_posts() ) {
                $my_query->the_post();
                // get_template_part('template-parts/post/blog','related');
                echo '<div class="col-md-4 col-sm-6">';
                get_template_part('template-parts/content/content','excerptv3');
                echo '</div>';
              }
            ?>
          </div>
        </div>
      </section><!-- end section -->
      <?php
    }
    wp_reset_query();
  }
}

if ( ! function_exists( 'digicorp_related_services_in_posts' ) ) {
  /**
  ** get list of relatet services - use in blog single
  **/
  function digicorp_related_services_in_posts() {
    global $post;
    $tags = wp_get_post_tags( $post->ID );

    if ( $tags ) {
          $tag_names = wp_list_pluck( $tags, 'name' );
          $args = array(
              'post_type' => 'ariana-services',
              'tax_query' => array(
                array(
                  'taxonomy' => 'ariana-services-tags',
                  'field' => 'name',
                  'terms' => $tag_names,
                  'operator' => 'IN'
                )
              ),
              'posts_per_page' => -1,
              'ignore_stiky_posts' => 1,
              'orderby' => 'menu_order'
              );

          $the_query = new WP_Query( $args );
          if ( $the_query->have_posts() ) :
          ?>
          <section class="section">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="services-list">
                                <div class="section-title text-left">
                                    <h4>
                                      <?php _e( 'Related services', 'digicorpdomain' ) ?>
                                    </h4>
                                    <hr>
                                </div><!-- end title -->
                                <div class="row">
                                  <?php

                                  while ( $the_query->have_posts() ) :
                                    $the_query->the_post();

                                    $url_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
                                    $img_markup = '';
                                    if ( ! empty( $url_thumb ) ) {
                                      $img_markup = sprintf( '<img src="%s" alt="%s" class="img-responsive" />',
                                                            $url_thumb[0],
                                                            $post->post_title );
                                    }
                                    $post_home_subtitle = get_post_meta( $post->ID, 'post_home_subtitle', true );
                                    ?>
                                      <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                          <div class="item-image">
                                            <a href="<?php echo get_the_permalink( $post->ID ) ?>"><?php echo $img_markup; ?>
                                            <span class="item-icon">
                                              <i class="fa fa-link"></i></span></a>
                                          </div><!-- end item-image -->
                                          <div class="item-desc text-center">
                                            <h4><a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>"><?php echo $post->post_title ?></a></h4>
                                            <?php if ( $post_home_subtitle != '' ) { ?>
                                              <h5><a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>"><?php echo $post_home_subtitle ?></a></h5>
                                            <?php } ?>
                                          </div><!-- end service-desc -->
                                        </div><!-- end seo-item -->
                                      </div><!-- end col -->
                                    <?php
                                  endwhile;
                                  ?>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <?php
          endif;

          wp_reset_postdata();
    }
  }
}
