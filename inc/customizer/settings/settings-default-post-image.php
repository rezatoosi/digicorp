<?php
// Set prefix
$prefix = 'digicorp_settings_';
$panel = 'digicorp_settings_panel';
$section = $prefix . 'default_image';


/******************* Section *******************/

$wp_customize->add_section( $section, array(
	'title'       => __( 'Default images', 'digicorpdomain' ),
	'description' => __( 'Set default image to use if post image is not available', 'digicorpdomain' ),
	'priority'    => 10,
	'panel' 			=> $panel,
) );

/******************* Settings *******************/


// default image for posts
$wp_customize->add_setting( $prefix . 'default_image', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new \WP_Customize_Media_Control( $wp_customize, $prefix . 'default_image', array(
	'label'       => __( 'Post default image', 'digicorpdomain' ),
	'description' => __( 'If post has no tumbnail, this image will be used.', 'digicorpdomain' ),
  'mime_type'   => 'image',
  'settings'    => $prefix . 'default_image',
	'section'     => $section,
) ) );

// default image for ariana-services
$wp_customize->add_setting( $prefix . 'default_image_services', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new \WP_Customize_Media_Control( $wp_customize, $prefix . 'default_image_services', array(
	'label'       => __( 'Services default image', 'digicorpdomain' ),
	'description' => __( 'If service has no tumbnail, this image will be used.', 'digicorpdomain' ),
  'mime_type'   => 'image',
  'settings'    => $prefix . 'default_image_services',
	'section'     => $section,
) ) );
