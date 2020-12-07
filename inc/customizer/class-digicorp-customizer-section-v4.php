<?php
/**
 * Class to create sections - Version 4
 * in customizer
 */

class Digicorp_Customizer_Section_V4
{

  /**
   * prefix of domain (main prefix)
   *
   * @var string
   */
  const PREFIX = 'digicorp_';
  const PARTIAL_PREFIX = 'digicorp_customize_partial';

  private $seprator_counter = 0;

  private $panel;
  private $section;
  private $section_selector;
  private $section_name;
  private $args = array();

  /**
   * Array list of all available settings for this section
   *
   * @var array
   */
  var $settings = array(
    'enabled',
    'title',
    'subtitle',
    'display_hr',
    'text',
    'image',
    'widget',
    'icon_class',
    'icon_image',
    'container_class',
    'bg_color',
    'bg_img',
    'bg_highlight',
    'bg_pos_x',
    'bg_pos_y',
    'bg_size',
    'bg_repeat',
    'bg_attachment',
    'cta_btn_text',
    'cta_btn_link',
    'cta_btn_page',
    'buttons'
  );

  // $fields_support = array(
  //   'title',
  //   'subtitle',
  //   'display_hr',
  //   'text',
  //   'image',
  //   'widget',
  //   'icon_class',
  //   'icon_image',
  //   'container_class',
  //   'bg_color',
  //   'bg_img',
  //   'bg_highlight',
  //   'bg_pos',
  //   'bg_size',
  //   'bg_repeat',
  //   'bg_attachment',
  //   'cta_btn',
  //   'buttons'
  // );

  // $selectors = array(
  //   'title' => 'section__content-title',
  //   'subtitle' => 'section__content-subtitle',
  //   'hr' => 'section__content hr',
  //   'text' => 'section__content-text',
  //   'icon' => 'section__content-icon',
  //   'image' => 'section__image img',
  //   'buttons' => 'section__content-buttons'
  // );

  public function __construct( $panel,
                        $section,
                        $section_selector,
                        $section_name,
                        $args = array() )
  {
    /******************* Set Variables *******************/
    $this->panel = $panel;
    $this->section = self::PREFIX . $section;
    $this->section_selector = $section_selector;
    $this->section_name = $section_name;

    $defaults = array(
      'fields'  => array(
                    'title',
                    'subtitle',
                    'display_hr',
                    'text',
                    'image',
                    'widget',
                    'icon_class',
                    'icon_image',
                    'container_class',
                    'bg_color',
                    'bg_img',
                    'bg_highlight',
                    'bg_pos',
                    'bg_size',
                    'bg_repeat',
                    'bg_attachment',
                    'cta_btn',
                    'buttons'
                  ),
      'remove_fields' =>  array(),
      'selectors' => array(
                      'title' => '.section__content-title',
                      'subtitle' => '.section__content-subtitle',
                      'display_hr' => '.section__content hr',
                      'text' => '.section__content-text',
                      'image' => '.section__image img',
                      'icon' => '.section__content-icon',
                      'buttons' => '.section__content-buttons'
                    ),
      'description' => '',
      'priority'  => 0,
      'widget-button-text' => __( "Add & Edit Widgets", "digicorpdomain" ),
      'widget-section-id' => 'sidebar-widgets' // set like this -> sidebar-widgets-[widget_id]
    );

    $this->args = wp_parse_args( $args, $defaults );

    // var_dump($this->args);die();

    // Add Hook
    add_action( 'customize_register', array( $this, 'digicorp_customize_register') );

    // Add Live preview scripts hook
    add_action( 'customize_preview_init', array( $this, 'digicorp_add_inline_scripts' ), 100 );

    // Setup ajax to get image src by image id
    add_action( 'wp_ajax_digicorp_customizer_get_attachment_image_src', array( $this, 'digicorp_customizer_get_attachment_image_src' ) );

  }

  function digicorp_customize_register( $wp_customize ) {

    /******************* Section *******************/

    $wp_customize->add_section( $this->section, array(
      'title'       => $this->section_name,
      'description' => $this->args['description'],
      'priority'    => $this->args['priority'],
      'panel'       => $this->panel,
    ) );

    /******************* Settings *******************/

    // display this section?
    $wp_customize->add_setting( $this->section . '_enabled', array(
      'sanitize_callback' => 'digicorp_sanitize_checkbox',
      'default'           => 0,
      'transport'         => 'postMessage',
      'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $this->section . '_enabled', array(
      'type'        => 'mte-toggle',
      'label'       => __( 'View this section?', 'digicorpdomain' ),
      'section'     => $this->section,
    ) ) );

    // title
    $setting = 'title';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( $setting );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Title Here',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Title', 'digicorpdomain' ),
        'type' 				=> 'text',
        'section'     => $this->section,
      ) ) );
      $wp_customize->selective_refresh->add_partial( $setting_name, array(
        'selector'        => $selector,
        'render_callback' => function() { return get_theme_mod( $this->section . '_title' ); },
      ) );
    }

    // SubTitle
    $setting = 'subtitle';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( $setting );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Sub Title', 'digicorpdomain' ),
        'type' 				=> 'text',
        'section'     => $this->section,
      ) ) );
      $wp_customize->selective_refresh->add_partial( $setting_name, array(
        'selector'        => $selector,
        'render_callback' => function() { return get_theme_mod( $this->section . '_subtitle' ); },
      ) );
    }

    // view hr?
    $setting = 'display_hr';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( $setting );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Display seprator line', 'digicorpdomain' ),
        'type' 				=> 'checkbox',
        'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_display_hr' ); },
      // ) );
    }

    // Text
    $setting = 'text';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( $setting );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Description Text', 'digicorpdomain' ),
        'type' 				=> 'textarea',
        'section'     => $this->section,
      ) ) );
      $wp_customize->selective_refresh->add_partial( $setting_name, array(
        'selector'        => $selector,
        'render_callback' => function() { return get_theme_mod( $this->section . '_text' ); },
      ) );
    }

    // Image
    $setting = 'image';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( $setting );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new \WP_Customize_Media_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Image', 'digicorpdomain' ),
      	'description' => __( 'Set image of this section', 'digicorpdomain' ),
        'mime_type'   => 'image',
        'settings'    => $setting_name,
      	'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_image' ); },
      // ) );
    }

    // add a seprator
    $this->add_seprator( $wp_customize );

    // widget
    $setting = 'widget';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;

      // Add a button for go to related widget area
      $wp_customize->add_setting( $setting_name,
          array(
              'transport'         => 'postMessage',
              'sanitize_callback' => 'wp_kses_post',
              'capability'        => 'edit_theme_options',
          )
      );
      $wp_customize->add_control(
          new Epsilon_Control_Button(
              $wp_customize,
              $setting_name,
              array(
                  'text'         => $this->args['widget-button-text'],
                  'section_id'    => $this->args['widget-section-id'],
                  'icon'          => 'dashicons-plus',
                  'section'       => $this->section,
              )
          )
      );

    }

    // add a seprator
    $this->add_seprator( $wp_customize );

    // Icon Class
    $setting = 'icon_class';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'icon' );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Icon CSS Class', 'digicorpdomain' ),
        'type' 				=> 'text',
        'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_icon_class' ); },
      // ) );
    }

    // Icon Image
    $setting = 'icon_image';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'icon' );
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'esc_url',
      	'default'           => '',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Icon Image', 'digicorpdomain' ),
      	'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_icon_image' ); },
      // ) );
    }

    // add a seprator
    $this->add_seprator( $wp_customize );

    // Container Css Class
    $setting = 'container_class';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'section' );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Container CSS Class', 'digicorpdomain' ),
        'type' 				=> 'text',
        'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_container_class' ); },
      // ) );
    }

    // Background color
    $setting = 'bg_color';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'section' );
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'sanitize_hex_color',
      	'default'           => '',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Backgound Color', 'digicorpdomain' ),
      	'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_bg_color' ); },
      // ) );
    }

    // Background Image
    $setting = 'bg_img';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'section' );
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'esc_url',
      	'default'           => '',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Backgound Image', 'digicorpdomain' ),
      	'description' => __( 'Minimum width: 2kpx', 'digicorpdomain' ),
      	'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_bg_img' ); },
      // ) );
    }

    // Background Image
    $setting = 'bg_highlight';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'section' );
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'digicorp_sanitize_select',
      	'default'           => 'default',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Backgound Highlight', 'digicorpdomain' ),
      	'description' => __( 'Default is dark highlight if background image is set', 'digicorpdomain' ),
        'type'        => 'select',
        'choices'     =>  array(
            'default'  =>  __( 'Default', 'digicorpdomain' ),
            'highlight-dark'  =>  __( 'Drak highlight', 'digicorpdomain' ),
            'highlight-darker'  =>  __( 'Draker highlight', 'digicorpdomain' ),
            'highlight-light'  =>  __( 'Light highlight', 'digicorpdomain' ),
            'highlight-main'  =>  __( 'Main color highlight', 'digicorpdomain' ),
            'highlight-none'  =>  __( 'No Highlight', 'digicorpdomain' ),
          ),
      	'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_bg_highlight', 'default' ); },
      // ) );
    }

    // Background Position
    $setting = 'bg_pos';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( 'section' );
      $wp_customize->add_setting( $setting_name . '_x', array(
      	'sanitize_callback' => 'wp_kses_post',
      	'default'           => 'center',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_setting( $setting_name . '_y', array(
      	'sanitize_callback' => 'wp_kses_post',
      	'default'           => 'center',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(
  			new WP_Customize_Background_Position_Control(
  				$wp_customize,
  				$setting_name,
  				array(
  					'label'    => __( 'Background Image Position', 'digicorpdomain' ),
  					'section'  => $this->section,
  					'settings' => array(
  						'x' => $setting_name . '_x',
  						'y' => $setting_name . '_y',
  					),
  				)
  			)
  		);
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_bg_position' ); },
      // ) );
    }

    // Background size
    $setting = 'bg_size';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'digicorp_sanitize_select',
      	'default'           => 'cover',
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Backgound image size', 'digicorpdomain' ),
        'type'        => 'select',
        'choices'     =>  array(
            'auto'  =>  _x( 'Original', 'Original Size' ),
            'contain' => __( 'Fit to Screen' ),
	          'cover'   => __( 'Fill Screen' ),
          ),
      	'section'     => $this->section,
      ) ) );
    }

    // Background repeat
    $setting = 'bg_repeat';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'digicorp_sanitize_checkbox',
      	'default'           => 0,
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Backgound repeat', 'digicorpdomain' ),
        'type'        => 'checkbox',
      	'section'     => $this->section,
      ) ) );
    }

    // Background attachment
    $setting = 'bg_attachment';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $wp_customize->add_setting( $setting_name, array(
      	'sanitize_callback' => 'digicorp_sanitize_checkbox',
      	'default'           => 1,
      	'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'Scroll with Page' ),
        'type'        => 'checkbox',
      	'section'     => $this->section,
      ) ) );
    }

    // add a seprator
    $this->add_seprator( $wp_customize );

    // CTA Button
    $setting = 'cta_btn';
    if ( $this->check_field( $setting ) ) {
      $selector = $this->selector( $setting );

      // CTA button text
      $setting_name = $this->section . '_' . $setting . '_text';
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'CTA Button Text', 'digicorpdomain' ),
        'description'       => __( 'if set this, it overides buttons section', 'digicorpdomain' ),
        'type' 				=> 'text',
        'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_cta_btn_text' ); },
      // ) );

      // CTA button link
      $setting_name = $this->section . '_' . $setting . '_link';
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'CTA Button Link', 'digicorpdomain' ),
        'type' 				=> 'text',
        'section'     => $this->section,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_cta_btn_link' ); },
      // ) );

      // CTA button page
      $setting_name = $this->section . '_' . $setting . '_page';
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
      	'label'       => __( 'CTA Button Page', 'digicorpdomain' ),
        'type' 				=> 'dropdown-pages',
      	'section'     => $this->section,
        'allow_addition' => true,
      ) ) );
      // $wp_customize->selective_refresh->add_partial( $setting_name, array(
      //   'selector'        => $selector,
      //   'render_callback' => function() { return get_theme_mod( $this->section . '_cta_btn_page' ); },
      // ) );
    }

    // add a seprator
    $this->add_seprator( $wp_customize );

    // Buttons
    $setting = 'buttons';
    if ( $this->check_field( $setting ) ) {
      $setting_name = $this->section . '_' . $setting;
      $selector = $this->selector( $setting );
      $wp_customize->add_setting( $setting_name, array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
      ) );
      $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $setting_name, array(
        'label'       => __( 'Buttons', 'digicorpdomain' ),
        'description' => __( 'insert [a] tags, remember to use .btn as class.', 'digicorpdomain' ),
        'type' 				=> 'textarea',
        'section'     => $this->section,
      ) ) );
      $wp_customize->selective_refresh->add_partial( $setting_name, array(
        'selector'        => $selector,
        'render_callback' => function() { return get_theme_mod( $this->section . '_buttons' ); },
      ) );
    }

  }

  function digicorp_add_inline_scripts()  {
    if( ! is_customize_preview() ) {
      return;
    }
    ob_start();
    ?>
      // --- sections - <?php echo $this->section ?> \n
      var <?php echo $this->section ?> = {};

        ( function( $ ) {
          "use strict";

          <?php echo $this->section ?>.customizer = {

            init: function() {
              wp.customize( '<?php echo $this->section ?>_enabled', function( value ) {
                value.bind( function( to ) {
                  if ( 1 == to ) {
                    $( '<?php echo $this->selector( 'section' ); ?>' ).removeClass( 'customizer-display-none' );
                  } else if ( 0 == to ) {
                    $( '<?php echo $this->selector( 'section' ); ?>' ).addClass( 'customizer-display-none' );
                  }
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_title', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'title' ); ?>' ).html( to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_subtitle', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'subtitle' ); ?>' ).html( to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_display_hr', function( value ) {
                value.bind( function( to ) {
                  if ( 1 == to ) {
                    $( '<?php echo $this->selector( 'display_hr' ); ?>' ).removeClass( 'customizer-display-none' );
                  } else if ( 0 == to ) {
                    $( '<?php echo $this->selector( 'display_hr' ); ?>' ).addClass( 'customizer-display-none' );
                  }
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_text', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'text' ); ?>' ).html( to );
                } );
              } );

              var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
              wp.customize( '<?php echo $this->section ?>_image', function( value ) {
                value.bind( function( to ) {
                  var elem = $( '<?php echo $this->selector( 'image' ); ?>' );
                  if ( false == to ) {
                    elem.addClass( 'customizer-display-none' );
                  } else {
                    var data = {
                      action: 'digicorp_customizer_get_attachment_image_src',
                      image_id: to
                    };
                    $.post(
                      ajaxurl,
                      data,
                      function(res) {
                        elem.attr('src',res);
                        elem.removeClass( 'customizer-display-none' );
                      }
                    );
                  }
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_icon_class', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'icon' ); ?>' ).attr( 'class', to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_icon_image', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'icon' ); ?>' ).attr( 'src', to );
                } );
              } );

              // Container Css Class
              var elemSection = $( '<?php echo $this->selector( 'section' ); ?>' );
              var sectionClasses = elemSection.attr( 'class' );

              // remove old settings first
              if ( wp.customize.has( '<?php echo $this->section ?>_container_class' ) ) {
                var oldValue = wp.customize.value( '<?php echo $this->section ?>_container_class' ).get();
                sectionClasses = sectionClasses.replace( oldValue, '' );
              }

              wp.customize( '<?php echo $this->section ?>_container_class', function( value ) {
                value.bind( function( to ) {
                  elemSection.attr( 'class', sectionClasses + ' ' + to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_color', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'section' ); ?>' ).css( 'background-color', to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_img', function( value ) {
                value.bind( function( to ) {
                  if(to.trim() == '') {
                      $( '<?php echo $this->selector( 'section' ); ?>' ).css( 'background-image', '' );
                  } else {
                    $( '<?php echo $this->selector( 'section' ); ?>' ).css( 'background-image', 'url(' + to + ')' );
                  }
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_highlight', function( value ) {
                value.bind( function( to ) {
                  var elem = $( '<?php echo $this->selector( 'section' ); ?>' );

                  var removeAll = function(el) {
                    el.removeClass('bg-highlight')
                        .removeClass('bg-highlight-lightblack')
                        .removeClass('bg-highlight-white')
                        .removeClass('bg-highlight-main');
                  };

                  removeAll(elem);

                  switch(to) {
                    case 'highlight-dark':
                      elem.addClass( 'bg-highlight' ).addClass('bg-highlight-lightblack');
                      break;
                    case 'highlight-darker':
                      elem.addClass( 'bg-highlight' );
                      break;
                    case 'highlight-light':
                      elem.addClass( 'bg-highlight' ).addClass('bg-highlight-white');
                      break;
                    case 'highlight-main':
                      elem.addClass( 'bg-highlight' ).addClass('bg-highlight-main');
                      break;
                    case 'highlight-none':
                      removeAll(elem);
                      break;
                    default:
                      if(elem.css('background-image') !== 'none') {
                        elem.addClass( 'bg-highlight' );
                      }
                      break;
                  }

                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_pos_x','<?php echo $this->section ?>_bg_pos_y', function( value_x, value_y ) {
                var elem = $( '<?php echo $this->selector( 'section' ); ?>' );
                value_x.bind( function( to ) {
                  elem.css( 'background-position-x', to );
                } );
                value_y.bind( function( to ) {
                  elem.css( 'background-position-y', to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_size', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'section' ); ?>' ).css( 'background-size', to );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_repeat', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'section' ); ?>' ).css( 'background-repeat', to ? 'repeat' : 'no-repeat' );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_bg_attachment', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'section' ); ?>' ).css( 'background-attachment', to ? 'scroll' : 'fixed' );
                } );
              } );

              wp.customize( '<?php echo $this->section ?>_cta_btn_text', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'cta_btn' ) ?>' ).html( '<a href="#" class="btn">' + to + '</a>' );
                } );
              } );

              <!-- not need -->
              //wp.customize( '<?php echo $this->section ?>_cta_btn_link', function( value ) {
              //  value.bind( function( to ) {
              //    $( '<?php echo $this->selector( 'cta_btn' ) ?> a' ).attr( 'href', to );
              //  } );
              //} );

              wp.customize( '<?php echo $this->section ?>_buttons', function( value ) {
                value.bind( function( to ) {
                  $( '<?php echo $this->selector( 'buttons' ) ?>' ).html( to );
                } );
              } );

              console.log('<?php echo $this->section ?> - Live Preview Created');
            },

          };

          $(document).ready(function(){
              <?php echo $this->section ?>.customizer.init();
          });

        } )( jQuery );
    <?php

    $data = ob_get_clean();
    wp_add_inline_script( 'digicorp-customizer-preview', $data, 'after');

  }

  function selector( $setting ) {
    // generate selector for a setting
    $section_selector = $this->section_selector;

    switch ( $setting ) {

      case 'section':
        return  $section_selector;
        break;

      case 'cta_btn':
        return $this->selector( 'buttons' );
        break;

      default:
        return $this->section_selector . ' ' . $this->args['selectors'][$setting];
        break;

    }
  }

  function check_field( $field ) {
    if ( in_array( $field, $this->args['fields'] ) && ! in_array( $field, $this->args['remove_fields'] ) ) {
      return true;
    } else {
      return false;
    }
  }

  function remove_settings()  {
    foreach( $this->settings as $setting) {
      remove_theme_mod( $this->section . '_' . $setting );
    }
  }

  function add_seprator($wp_customize) {
    $this->seprator_counter += 1;
    $name = $this->section . '_sep' . $this->seprator_counter;
    $wp_customize->add_setting( $name,
        array(
            'sanitize_callback' => 'wp_kses_post',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(
      new Digicorp_Control_Seprator(
        $wp_customize,
        $name,
        array(
            'section'       => $this->section,
          )
        )
    );
  }

  function digicorp_customizer_get_attachment_image_src() {
    $image_id = $_POST['image_id'];
    echo wp_get_attachment_image_src( $image_id, 'medium' )[0];
    wp_die();
  }

}