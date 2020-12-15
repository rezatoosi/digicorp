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

/**
	* Convert number characters to persian
	*
**/
function digicorp_num_i18n( $string ) {
	$lang = explode( '_', get_locale() )[0];

	$num_eng = range(0, 9);

	switch ( $lang ) {
		case 'fa':

			// // Persian HTML decimal
			// $decimal_fa = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');

			// Persian Numeric
			$num_fa = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

			// $string =  str_replace($num_eng, $decimal_fa, $string);
		  $string = str_replace($num_eng, $num_fa, $string);

			break;

		case 'ar':

			// Arabic HTML decimal
			$decimal_ar = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
			// Arabic Numeric
			$num_ar = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

			// $string =  str_replace($num_eng, $decimal_ar, $string);
		  $string = str_replace($num_eng, $num_ar, $string);

			break;

		default:
			$string = $string;
			break;
	}
	return $string;
}
