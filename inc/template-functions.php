<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package DIGICORP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function digicorp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
// add_filter( 'body_class', 'digicorp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function digicorp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'digicorp_pingback_header' );

function siteBrand($html) {
  // grab the site name as set in customizer options
  $site = get_bloginfo('name');
  $desc = get_bloginfo( 'description' ); //get_site_option( 'blogdescription' );
  // Wrap the site name in an H1 if on home, in a paragraph tag if not.
  is_front_page() ? $title = '<h1>' . $site . '</h1>' : $title = '<p>' . $site . '</p>';
  // Grab the home URL
  $home = esc_url(home_url('/'));
  // Class for the link
  $class = 'navbar-brand';
  // Set anchor content to $title
  $content = $title;
  // Check if there is a custom logo set in customizer options...
  if (has_custom_logo()) {
    // get the URL to the logo
    $logo    = wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, array(
      'itemprop' => 'logo',
      'alt' => $site
    ));
    // we have a logo, so let's update the $content variable
    $content = $logo;
    // include the site name markup, hidden with screen reader friendly styles
    $content .= '<span class="sr-only">' . $title . '<br/>' . $desc . '</span>';
  }
  // construct the final html
  $html = sprintf('<a href="%1$s" class="%2$s" rel="home" itemprop="url">%3$s</a>', $home, $class, $content);

  // return the result to the front end
  return $html;
}
//add_filter('get_custom_logo', __NAMESPACE__ . '\\siteBrand');
add_filter('get_custom_logo', 'siteBrand');
