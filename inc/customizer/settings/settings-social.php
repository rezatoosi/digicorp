<?php
// Set prefix
$prefix = 'digicorp_settings_';
$panel = 'digicorp_settings_panel';
$section = $prefix . 'social';


/******************* Section *******************/

$wp_customize->add_section( $section, array(
	'title'       => __( 'Social media links', 'digicorpdomain' ),
	'description' => __( 'Set link of your social media', 'digicorpdomain' ),
	'priority'    => 20,
	'panel' 			=> $panel,
) );

/******************* Settings *******************/


// Instagram
$wp_customize->add_setting( $prefix . 'instagram', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(
  $prefix . 'instagram',
  array(
    'type'          =>  'url',
    'section'       =>  $section,
    'label'         =>  __( 'Instagram', 'digicorpdomain' ),
    // 'description'   =>  __( '', 'digicorpdomain' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'http://www.'
    ),
  )
);

// linkedIn
$wp_customize->add_setting( $prefix . 'linkedin', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(
  $prefix . 'linkedin',
  array(
    'type'          =>  'url',
    'section'       =>  $section,
    'label'         =>  __( 'LinkedIn', 'digicorpdomain' ),
    // 'description'   =>  __( '', 'digicorpdomain' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'http://www.'
    ),
  )
);

// facebook
$wp_customize->add_setting( $prefix . 'facebook', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(
  $prefix . 'facebook',
  array(
    'type'          =>  'url',
    'section'       =>  $section,
    'label'         =>  __( 'Facebook', 'digicorpdomain' ),
    // 'description'   =>  __( '', 'digicorpdomain' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'http://www.'
    ),
  )
);

// whatsapp
$wp_customize->add_setting( $prefix . 'whatsapp', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(
  $prefix . 'whatsapp',
  array(
    'type'          =>  'url',
    'section'       =>  $section,
    'label'         =>  __( 'WhatsApp', 'digicorpdomain' ),
    // 'description'   =>  __( '', 'digicorpdomain' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'http://www.'
    ),
  )
);

// Telegram
$wp_customize->add_setting( $prefix . 'telegram', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(
  $prefix . 'telegram',
  array(
    'type'          =>  'url',
    'section'       =>  $section,
    'label'         =>  __( 'Telegram', 'digicorpdomain' ),
    // 'description'   =>  __( '', 'digicorpdomain' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'http://www.'
    ),
  )
);

// Twitter
$wp_customize->add_setting( $prefix . 'twitter', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => '',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(
  $prefix . 'twitter',
  array(
    'type'          =>  'url',
    'section'       =>  $section,
    'label'         =>  __( 'twitter', 'digicorpdomain' ),
    // 'description'   =>  __( '', 'digicorpdomain' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'http://www.'
    ),
  )
);
