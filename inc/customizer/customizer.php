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

	$wp_customize->add_panel( 'digicorp_settings_panel', array(
	    'priority'       => 2,
	    'title'          => esc_html__( 'Theme Settings', 'digicorpdomain' ),
	    'description'	 => esc_html__( 'Manage theme settings', 'digicorpdomain' ),
	) );


	/*
	 * include create section files ----------------------------------------------------
	 */

	 // frontpage - typed slider
	 // require_once get_template_directory() . '/inc/customizer/remove-settings.php';

	 // frontpage - typed slider
	 require_once get_template_directory() . '/inc/customizer/sections/slider-typed.php';

	 // frontpage - section Features
	 // require_once get_template_directory() . '/inc/customizer/sections/features.php';
	 // this section redesigned with new class Digicorp_Customizer_Frontpage_Section_V2

	 // frontpage - section Services
	 require_once get_template_directory() . '/inc/customizer/sections/services.php';

	 // frontpage - section Projects
	 require_once get_template_directory() . '/inc/customizer/sections/projects.php';

	 // frontpage - section Blog
	 require_once get_template_directory() . '/inc/customizer/sections/blog.php';

	 // frontpage - section Blog
	 require_once get_template_directory() . '/inc/customizer/sections/testimonials.php';


	 /*
 	 * include create settings files ----------------------------------------------------
 	 */

	 // settings - default image
	 require_once get_template_directory() . '/inc/customizer/settings/settings-default-post-image.php';

}
add_action( 'customize_register', 'digicorp_customize_register' );


load_theme_textdomain( 'digicorpdomain', get_template_directory() . '/languages' );

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

// add frontpage section creator class - Version 2
require_once get_template_directory() . '/inc/customizer/class-digicorp-customizer-frontpage-sections-v2.php';

$about_section_brands = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_features',
	'#section-features',
	__( 'Features Section', 'digicorpdomain' ),
	__( "Manage features section settings.", "digicorpdomain" ),
	2,
	__( "Add & Edit features", "digicorpdomain" ),
	'sidebar-widgets-frontpage_features'
);

$about_section_history = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_about_history',
	'#section-about-history',
	__( 'About us - History', 'digicorpdomain' ),
	__( "Manage history section in about us page.", "digicorpdomain" ),
	8,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-aboutus_history'
);

$about_section_philosophy = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_about_philosophy',
	'#section-about-philosophy',
	__( 'About us - Our Philosophy', 'digicorpdomain' ),
	__( "Manage our philosophy section in about us page.", "digicorpdomain" ),
	9
);

$service_section_mainservices = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_service_mainservices',
	'#section-services-mainservices',
	__( 'Services - Our Main Services', 'digicorpdomain' ),
	__( "Manage our main services section in services page.", "digicorpdomain" ),
	10,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-services_mainservice'
);

$contact_section_address = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_contact_address',
	'#section-contact-address',
	__( 'Contact - Address', 'digicorpdomain' ),
	__( "Manage our addresses in contactus or frontpage.", "digicorpdomain" ),
	11,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-contact_address'
);

$contact_section_phone = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_contact_phone',
	'#section-contact-phone',
	__( 'Contact - Phone', 'digicorpdomain' ),
	__( "Manage our phone numbers in contactus or frontpage.", "digicorpdomain" ),
	12,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-contact_phone'
);

$contact_section_social = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_contact_social',
	'#section-contact-social',
	__( 'Contact - Social', 'digicorpdomain' ),
	__( "Manage our social network links in contactus or frontpage.", "digicorpdomain" ),
	13,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-contact_social'
);

$contact_section_social = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_contact_form',
	'#section-contact-form',
	__( 'Contact - Form', 'digicorpdomain' ),
	__( "Manage Contact Form in contactus", "digicorpdomain" ),
	13,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-contact_form'
);

$frontpage_section_services_cta = new Digicorp_Customizer_Frontpage_Section_V2(
	'_sections_services_cta',
	'#section-services-cta',
	__( 'Services - CTA', 'digicorpdomain' ),
	__( "Manage CTA section in services.", "digicorpdomain" ),
	14,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-services_cta'
);

// add frontpage section creator class - Version 3
require_once get_template_directory() . '/inc/customizer/class-digicorp-customizer-frontpage-sections-v3.php';

$about_section_brands = new Digicorp_Customizer_Frontpage_Section_V3(
	'_sections_about_brands',
	'#section-about-brands',
	__( 'About us - Brands', 'digicorpdomain' ),
	__( "Manage brands section in about us page.", "digicorpdomain" ),
	8,
	__( "Add & Edit Widgets", "digicorpdomain" ),
	'sidebar-widgets-aboutus_brands'
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
