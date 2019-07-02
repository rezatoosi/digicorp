<?php
// Set prefix
$prefix = 'digicorp';


/******************* Section *******************/

$wp_customize->add_section( $prefix . '_slider_typed', array(
	'title'       => __( 'Typed Slider Section', 'digicorpdomain' ),
	'description' => __( 'Control typed slider related settings.', 'digicorpdomain' ),
	'priority'    => 1,
	'panel' 			=> 'digicorp_frontpage_panel',
) );

/******************* Settings *******************/

// display this section?
$wp_customize->add_setting( $prefix . '_typed_slider_enabled', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_typed_slider_enabled', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'View this section?', 'digicorpdomain' ),
	// 'description' => esc_html__( 'Set this to Off if you want to hide this section.', 'digicorpdomain' ),
	'section'     => $prefix . '_slider_typed',
) ) );

// title
$wp_customize->add_setting( $prefix . '_typed_slider_title', array(
	'sanitize_callback' => 'wp_kses_post',
	// translators: Default Text for Typed slider title setting
	'default'           => __( 'Title Here', 'digicorpdomain' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_typed_slider_title', array(
	'label'       => __( 'Title', 'digicorpdomain' ),
	'description' => esc_html__( 'Add the title for typed slider. (Will wrap by <H1> tag)', 'digicorpdomain' ),
	'type' 				=> 'textarea',
	'section'     => $prefix . '_slider_typed',
) ) );
$wp_customize->selective_refresh->add_partial( $prefix . '_typed_slider_title', array(
	'selector'        => '#typed-slider .heading-holder > h1',
	'render_callback' => 'digicorp_customize_partial_typed_slider_title',
) );

// Typed elements
$wp_customize->add_setting( $prefix . '_typed_slider_typed_elements', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '<p></p>',
	'transport'         => 'refresh',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_typed_slider_typed_elements', array(
	'label'       => __( 'Typed Elements', 'digicorpdomain' ),
	'description' => esc_html__( 'Phrases to be typed into slider. Seprate each phrase by new line.', 'digicorpdomain' ),
	'type' 				=> 'textarea',
	'section'     => $prefix . '_slider_typed',
) ) );

// Info Tags
$wp_customize->add_setting( $prefix . '_typed_slider_info_tags', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_typed_slider_info_tags', array(
	'label'       => __( 'Info Tags', 'digicorpdomain' ),
	'description' => esc_html__( 'Info Tags to show at the end. Seprate each tag by new line.', 'digicorpdomain' ),
	'type' 				=> 'textarea',
	'section'     => $prefix . '_slider_typed',
) ) );

// Background
$wp_customize->add_setting( $prefix . '_typed_slider_background', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => get_template_directory_uri() . '/images/slider-bg.jpg',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, $prefix . '_typed_slider_background', array(
	'label'       => __( 'Backgound Image', 'digicorpdomain' ),
	'description' => __( 'Minimum width: 2kpx', 'digicorpdomain' ),
	'section'     => $prefix . '_slider_typed',
) ) );

// CTA Text
$wp_customize->add_setting( $prefix . '_typed_slider_cta_text', array(
	'sanitize_callback' => 'wp_kses_post',
	// translators: Default Text for Slider CTA
	'default'           => __( 'CTA Button Text', 'digicorpdomain' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_typed_slider_cta_text', array(
	'label'       => __( 'Call To Action Text', 'digicorpdomain' ),
	'type' 				=> 'text',
	'section'     => $prefix . '_slider_typed',
) ) );
$wp_customize->selective_refresh->add_partial( $prefix . '_typed_slider_cta_text', array(
	'selector'        => '#slider-cta #cta > a',
	'render_callback' => 'digicorp_customize_partial_typed_slider_cta_text',
) );

$wp_customize->add_setting( $prefix . '_typed_slider_cta_link', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '0',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_typed_slider_cta_link', array(
	'label'       => __( 'Call To Action Page', 'digicorpdomain' ),
	'type' 				=> 'dropdown-pages',
	'section'     => $prefix . '_slider_typed',
	'allow_addition' => true,
) ) );
