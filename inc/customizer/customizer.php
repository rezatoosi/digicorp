<?php
/**
 * DIGICORP Theme Customizer
 *
 * @package DIGICORP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function digicorp_customize_register( $wp_customize ) {

	// wordpress built-in settings
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Custom Controls
	require_once get_template_directory() . '/inc/customizer/custom-controls.php';

	$wp_customize->register_control_type( 'Epsilon_Control_Button' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#site-title',
			'render_callback' => 'digicorp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '#site-desc',
			'render_callback' => 'digicorp_customize_partial_blogdescription',
		) );
	}

	// --- Create Panels
	$wp_customize->add_panel( 'digicorp_frontpage_panel', array(
	    'priority'       => 1,
	    'title'          => esc_html__( 'Front Page Sections', 'digicorpdomain' ),
	    'description'	 => esc_html__( 'Manage front-page sections', 'digicorpdomain' ),
	) );


	/*
	 * include required files ----------------------------------------------------
	 */

	 // frontpage - typed slider
	 // require_once get_template_directory() . '/inc/customizer/remove-settings.php';

	 // frontpage - typed slider
	 require_once get_template_directory() . '/inc/customizer/sections/slider-typed.php';

	 // frontpage - section Features
	 require_once get_template_directory() . '/inc/customizer/sections/features.php';

	 // frontpage - section Services
	 require_once get_template_directory() . '/inc/customizer/sections/services.php';

	 // frontpage - section Projects
	 require_once get_template_directory() . '/inc/customizer/sections/projects.php';

	 // frontpage - section Blog
	 require_once get_template_directory() . '/inc/customizer/sections/blog.php';

	 // frontpage - section Blog
	 require_once get_template_directory() . '/inc/customizer/sections/testimonials.php';

}
add_action( 'customize_register', 'digicorp_customize_register' );


// add frontpage section creator class
require_once get_template_directory() . '/inc/customizer/class-digicorp-customizer-frontpage-sections.php';

$frontpage_section_custom = new Digicorp_Customizer_Frontpage_Section(
	'_sections_custom',
	'#section-custom',
	__( 'Custom Section', 'digicorpdomain' ),
	__( "Manage custom section settings.", "digicorpdomain" ),
	7,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-frontpage_custom'
);




/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function digicorp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function digicorp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

// --- digicorp_typed_slider

function digicorp_customize_partial_typed_slider_title() {
	return get_theme_mod( 'digicorp_typed_slider_title' );
}

function digicorp_customize_partial_typed_slider_cta_text() {
	return get_theme_mod( 'digicorp_typed_slider_cta_text', __( 'CTA Button Text', 'digicorpdomain' ) );
}

// digicorp_sections_features

function digicorp_customize_partial_sections_features_title() {
	return get_theme_mod( 'digicorp_sections_features_title', 'Features Title' );
}

function digicorp_customize_partial_sections_features_subtitle() {
	return get_theme_mod( 'digicorp_sections_features_subtitle', 'Sub title' );
}

// digicorp_sections_services

function digicorp_customize_partial_sections_services_title() {
	return get_theme_mod( 'digicorp_sections_services_title', 'Features Title' );
}

function digicorp_customize_partial_sections_services_subtitle() {
	return get_theme_mod( 'digicorp_sections_services_subtitle', 'Sub title' );
}

// digicorp_sections_projects

function digicorp_customize_partial_sections_projects_title() {
	return get_theme_mod( 'digicorp_sections_projects_title', 'Projects Title' );
}

function digicorp_customize_partial_sections_projects_subtitle() {
	return get_theme_mod( 'digicorp_sections_projects_subtitle', 'Sub title' );
}

// digicorp_sections_blog

function digicorp_customize_partial_sections_blog_title() {
	return get_theme_mod( 'digicorp_sections_blog_title', 'Blog Title' );
}

function digicorp_customize_partial_sections_blog_subtitle() {
	return get_theme_mod( 'digicorp_sections_blog_subtitle', 'Sub title' );
}

// digicorp_sections_testimonials

function digicorp_customize_partial_sections_testimonials_title() {
	return get_theme_mod( 'digicorp_sections_testimonials_title', 'Title Here' );
}

function digicorp_customize_partial_sections_testimonials_subtitle() {
	return get_theme_mod( 'digicorp_sections_testimonials_subtitle', 'Sub title' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function digicorp_customize_preview_js() {
	wp_enqueue_script( 'digicorp-customizer-preview', get_template_directory_uri() . '/inc/customizer/assets/js/digicorp-customizer-live-preview.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'digicorp_customize_preview_js' );

/**
 * Binds CSS handlers
 */
if ( ! function_exists( 'digicorp_customize_preview_css' ) ) {
	function digicorp_customize_preview_css() {
		wp_enqueue_style( 'digicorp-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css' );
	}
}
add_action( 'customize_controls_print_styles', 'digicorp_customize_preview_css' );

/**
 * Binds JS handlers for controls
 */
if ( ! function_exists( 'digicorp_customize_js' ) ) {
	function digicorp_customize_js() {
		wp_enqueue_script( 'digicorp-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/digicorp-customizer.js', array( 'customize-controls' ), '1.0', true );
	}
}
add_action( 'customize_controls_enqueue_scripts', 'digicorp_customize_js', 99 );

/**
 * sanitize checkboxes
 */
if ( ! function_exists( 'digicorp_sanitize_checkbox' ) ) {
	/**
	 * Function to sanitize checkboxes
	 *
	 * @param $value
	 *
	 * @return int
	 */
	function digicorp_sanitize_checkbox( $value ) {
		if ( $value == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
}
