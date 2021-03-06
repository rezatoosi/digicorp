<?php
// Set prefix
$prefix = 'digicorp' . '_sections_testimonials'; // digicorp_sections_testimonials

/******************* Section *******************/

$wp_customize->add_section( $prefix, array(
	'title'       => __( 'Testimonials Section', 'digicorpdomain' ),
	'description' => __( 'Manage testimonials section settings.', 'digicorpdomain' ),
	'priority'    => 6,
  'panel'       => 'digicorp_frontpage_panel',
) );

/******************* Settings *******************/

// display this section?
$wp_customize->add_setting( $prefix . '_enabled', array(
	'sanitize_callback' => 'digicorp_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_enabled', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'View this section?', 'digicorpdomain' ),
	'section'     => $prefix,
) ) );

// title
$wp_customize->add_setting( $prefix . '_title', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => 'Title Here',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_title', array(
	'label'       => __( 'Title', 'digicorpdomain' ),
	'type' 				=> 'text',
	'section'     => $prefix,
) ) );
$wp_customize->selective_refresh->add_partial( $prefix . '_title', array(
	'selector'        => '#section-testimonials .section-title > h3',
	'render_callback' => 'digicorp_customize_partial_sections_testimonials_title',
) );

// SubTitle
$wp_customize->add_setting( $prefix . '_subtitle', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => 'sub title',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $prefix . '_subtitle', array(
	'label'       => __( 'Sub Title', 'digicorpdomain' ),
	'type' 				=> 'text',
	'section'     => $prefix,
) ) );
$wp_customize->selective_refresh->add_partial( $prefix . '_subtitle', array(
	'selector'        => '#section-testimonials .section-title > h5',
	'render_callback' => 'digicorp_customize_partial_sections_testimonials_subtitle',
) );
