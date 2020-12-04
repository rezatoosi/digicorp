<?php
// Set prefix
$prefix = 'digicorp_settings_';
$panel = 'digicorp_settings_panel';
$section = $prefix . 'default_image';


/******************* Section *******************/

$wp_customize->add_section( $section, array(
	'title'       => __( 'Default post images', 'digicorpdomain' ),
	'description' => __( 'Set default image of all post types', 'digicorpdomain' ),
	'priority'    => 1,
	'panel' 			=> $panel,
) );

/******************* Settings *******************/


// Background
$wp_customize->add_setting( $prefix . 'default_image', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '',
	'transport'         => 'postMessage',
) );
// $wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, $prefix . 'default_image', array(
// 	'label'       => __( 'Default Image', 'digicorpdomain' ),
// 	'description' => __( 'If post has no tumbnail, this image will be used.', 'digicorpdomain' ),
// 	'section'     => $section,
// ) ) );
$wp_customize->add_control(  new \WP_Customize_Media_Control( $wp_customize, $prefix . 'default_image', array(
	'label'       => __( 'Default Image', 'digicorpdomain' ),
	'description' => __( 'If post has no tumbnail, this image will be used.', 'digicorpdomain' ),
  'mime_type'   => 'image',
  'settings'    => $prefix . 'default_image',
	'section'     => $section,
) ) );
