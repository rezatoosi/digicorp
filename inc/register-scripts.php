<?php
/**
  * enqueue required styles and scripts
  */
if( ! function_exists('ariana_scripts') ):
  /**
   * Enqueue scripts and styles.
   */
  function ariana_scripts() {

    // wp_enqueue_style( 'ariana-style', get_stylesheet_uri() );
    if ( is_rtl() /* && 'fa_IR' == get_locale() */) {
      wp_enqueue_style( 'digicorp-styles', get_template_directory_uri() . '/style-rtl.css' );
    }
    else {
      wp_enqueue_style( 'digicorp-styles', get_template_directory_uri() . '/style.css' );
      wp_enqueue_style( 'google-fonts-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
      wp_enqueue_style( 'google-fonts-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,700italic,700,500italic,500,400italic,300italic,300&amp;subset=latin,latin-ext' );
    }



    // wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array( ), '1.11.3', true);
    // wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '1.0', true);
    // wp_enqueue_script( 'ariana-plugins-js', get_template_directory_uri() . '/js/plugins.js', array( 'jquery', 'bootstrap-js' ), '1.0', true);
    wp_enqueue_script( 'digicorp-scripts', get_template_directory_uri() . '/assets/dist/js/bundle.js', array( 'jquery' ), '1.0', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
endif;
add_action( 'wp_enqueue_scripts', 'ariana_scripts' );

/**
  * add editor styles
  */
function ariana_editor_styles() {
  // Editor Styles
  add_theme_support( 'editor-styles' );

  if ( is_rtl() ) {
    add_editor_style( '/style-rtl_editor.css' );
  } else {
    add_editor_style( '/style_editor.css' );
  }
}
add_action( 'after_setup_theme', 'ariana_editor_styles' );


/**
  * Remove block editor styles
  */

function ariana_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'ariana_remove_wp_block_library_css', 100 );

function ariana_dequque_js(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'ariana_dequque_js' );

function ariana_disable_emoji_feature() {

	// Prevent Emoji from loading on the front-end
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove from admin area also
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	// Remove from RSS feeds also
	remove_filter( 'the_content_feed', 'wp_staticize_emoji');
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji');

	// Remove from Embeds
	remove_filter( 'embed_head', 'print_emoji_detection_script' );

	// Remove from emails
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Disable from TinyMCE editor. Currently disabled in block editor by default
	add_filter( 'tiny_mce_plugins', 'ariana_disable_emojis_tinymce' );

	/** Finally, prevent character conversion too
         ** without this, emojis still work
         ** if it is available on the user's device
	 */

	add_filter( 'option_use_smilies', '__return_false' );

}

function ariana_disable_emojis_tinymce( $plugins ) {
	if( is_array($plugins) ) {
		$plugins = array_diff( $plugins, array( 'wpemoji' ) );
	}
	return $plugins;
}

add_action('init', 'ariana_disable_emoji_feature');
