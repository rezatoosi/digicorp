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
    if ( '' !== $args['page_header_image_src'] ) {
      $args['page_header_image_src'] = sprintf( ' data-bg-img="%s"', $args['page_header_image_src'] );
      $args['section_class'] .= ' imagebg';
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
			esc_html( get_the_date() )
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

if ( ! function_exists( 'digicorp_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function digicorp_post_thumbnail() {
  if ( post_password_required() || is_attachment() /* || ! has_post_thumbnail() */ ) {
			return;
		}

		if ( is_singular() ) :
      if ( ! has_post_thumbnail() ) {
        return;
      }
			?>

      <div class="post-media clearfix">
        <a href="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>" aria-hidden="true" tabindex="-1">
          <img src="<?php esc_url( the_post_thumbnail_url( 'page_header' ) ); ?>" alt="<?php esc_attr( the_post_thumbnail_caption() ); ?>" class="img-responsive">
        </a>
      </div><!-- end post-media -->

    <?php else : ?>

      <div class="post-media clearfix">
        <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
          <?php if ( has_post_thumbnail() ) { ?>
            <img src="<?php esc_url( the_post_thumbnail_url( 'small' ) ); ?>" alt="<?php esc_attr( the_post_thumbnail_caption() ); ?>" class="img-responsive">
          <?php } else { ?>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/post-default.png' ); ?>" alt="<?php esc_attr( the_title() ); ?>" class="img-responsive">
          <?php } ?>
        </a>
      </div><!-- end post-media -->

		<?php
		endif; // End is_singular().
	}
endif;

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

if ( ! function_exists( 'digicorp_get_post_type_link' ) ) :
  /**
  * get post type markup for excerpt2 - search page
  */
  function digicorp_get_post_type_link()
  {
      $posttype = get_post_type();
      $markup = '<a href="%1$s" title="%2$s" class="posttype %3$s"><i class="fa fa-bookmark"></i> %4$s</a>';
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
endif;

if ( ! function_exists( 'digicorp_get_the_category' ) ):
  /**
  * return the category of current post (wp_term object)
  **/
  function digicorp_get_the_category() {
    $categories = get_the_category();
    return $categories[0];
  }
endif;

if ( ! function_exists( 'digicorp_get_the_category_link' ) ):
  /**
  * return link of the first category of current post link
  **/
  function digicorp_get_the_category_link() {
    if ( 'post' !== get_post_type() ) { return ''; }
    $category = digicorp_get_the_category();
    $markup = '<a href="%1$s" title="%2$s"><i class="fa fa-tag"></i> %3$s</a>';
    return sprintf( $markup,
                    esc_url( get_category_link( $category->term_id ) ),
                    sprintf(
                      /* Translators: %s: Name of category */
                      esc_html__( 'Visit articles in category of %s', 'digicorpdomain' ), $category->name ),
                    esc_html( $category->name )
                  );
  }
endif;

if ( ! function_exists( 'digicorp_get_reading_time' ) ):
  /**
  ** get estimated reading time
  **/
  function digicorp_get_reading_time() {
    if ( 'post' !== get_post_type() ) { return ''; }
    $time = 0;
    $content = get_post_field( 'post_content' );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);

    // if ($readingtime == 1) {
    //   $timer = " minute";
    // } else {
    //   $timer = " minutes";
    // }

    return sprintf( '<span><i class="fa fa-clock-o"></i> %1$s %2$s %3$s</span>',
                    __( 'Read time:', 'digicorpdomain' ),
                    $readingtime,
                    __( 'min', 'digicorpdomain' )
                  );
  }
endif;

if ( ! function_exists( 'digicorp_get_search_found_posts' ) ):
  /**
  ** show count of found posts in search results
  **/
  function digicorp_get_search_found_posts() {
    global $wp_query;
    $found_posts = $wp_query->found_posts;
    return $found_posts;
  }
endif;
