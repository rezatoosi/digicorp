<?php
/**
* Class to create front page sections - Version 2
 * in customizer
 */
class Digicorp_Customizer_Frontpage_Section_V2
{

  /**
   * prefix of domain (main prefix)
   *
   * @var string
   */
  const PREFIX = 'digicorp';
  const PARTIAL_PREFIX = 'digicorp_customize_partial';

  /**
   * section variables
   *
   * @var string
   */
  private $section;
  private $section_selector;
  private $section_name;
  private $section_desc;
  private $section_priority;

  private $widget_button_text;
  private $widget_button_section_id;

  // private $css_class;
  // private $background_color;
  // private $background_image;

  /**
   * domain prefix + section name
   * prefix + section
   *
   * @var string
   */
  private $prefix_section;

  /**
   * name of panel
   *
   * @var string
   */
  private $panel;

  /**
   * Array list of all settings for this section
   *
   * @var string
   */
  var $settings = array(
    '_enabled',
    '_title',
    '_subtitle',
    '_desctext',
    '_widget_button',
    '_icon_class',
    '_icon_img',
    '_css_class',
    '_background_color',
    '_background_image',
    '_background_image_position'
  );

  function __construct( $section, $section_selector, $section_name = '', $section_desc = '', $section_priority = 0, $widget_button_text = '', $widget_button_section_id = '', $panel = 'digicorp_frontpage_panel' )
  {
    /******************* Set Variables *******************/
    $this->panel = $panel;
    $this->section = $section;
    $this->section_selector = $section_selector;
    $this->section_name = $section_name;
    $this->section_desc = $section_desc;
    $this->section_priority = $section_priority;
    $this->prefix_section = self::PREFIX . $section;

    $this->widget_button_text = $widget_button_text;
    $this->widget_button_section_id = $widget_button_section_id;

    if ( $section_name == '' ) {
      // section name is empty.
      // this mean instanse created to call remove_settings() method.
      return;
    }

    // Add Hook
    add_action( 'customize_register', array( $this, 'digicorp_customize_register') );

    // Add Live preview scripts hook
    add_action( 'customize_preview_init', array( $this, 'digicorp_add_inline_scripts' ), 100 );

    // Add Front-End Styles
    add_action( 'wp_footer', array( $this, 'digicorp_add_frontend_styles' ) );

  }

  function digicorp_customize_register( $wp_customize )
  {

    /******************* Section *******************/

    $wp_customize->add_section( $this->prefix_section, array(
      'title'       => $this->section_name,
      'description' => $this->section_desc,
      'priority'    => $this->section_priority,
      'panel'       => $this->panel,
    ) );

    /******************* Settings *******************/

    // display this section?
    $wp_customize->add_setting( $this->prefix_section . '_enabled', array(
      'sanitize_callback' => 'digicorp_sanitize_checkbox',
      'default'           => 0,
      'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $this->prefix_section . '_enabled', array(
      'type'        => 'mte-toggle',
      'label'       => __( 'View this section?', 'digicorpdomain' ),
      'section'     => $this->prefix_section,
    ) ) );

    // title
    $wp_customize->add_setting( $this->prefix_section . '_title', array(
      'sanitize_callback' => 'wp_kses_post',
      'default'           => 'Title Here',
      'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $this->prefix_section . '_title', array(
      'label'       => __( 'Title', 'digicorpdomain' ),
      'type' 				=> 'text',
      'section'     => $this->prefix_section,
    ) ) );
    $wp_customize->selective_refresh->add_partial( $this->prefix_section . '_title', array(
      'selector'        => $this->section_selector . ' .section-title > h3',
      'render_callback' => function() { return get_theme_mod( $this->prefix_section . '_title', 'Title Here' ); },
      // 'render_callback' => self::PARTIAL_PREFIX . $this->section . '_title',
    ) );

    // SubTitle
    $wp_customize->add_setting( $this->prefix_section . '_subtitle', array(
      'sanitize_callback' => 'wp_kses_post',
      'default'           => '',
      'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $this->prefix_section . '_subtitle', array(
      'label'       => __( 'Sub Title', 'digicorpdomain' ),
      'type' 				=> 'text',
      'section'     => $this->prefix_section,
    ) ) );
    $wp_customize->selective_refresh->add_partial( $this->prefix_section . '_subtitle', array(
      'selector'        => $this->section_selector . ' .section-title > h5',
      'render_callback' => function() { return get_theme_mod( $this->prefix_section . '_subtitle', 'Title Here' ); },
      // 'render_callback' => self::PARTIAL_PREFIX . $this->section . '_subtitle',
    ) );

    // Description Text
    $wp_customize->add_setting( $this->prefix_section . '_desctext', array(
      'sanitize_callback' => 'wp_kses_post',
      'default'           => '',
      'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $this->prefix_section . '_desctext', array(
      'label'       => __( 'Description Text', 'digicorpdomain' ),
      'type' 				=> 'textarea',
      'section'     => $this->prefix_section,
    ) ) );
    $wp_customize->selective_refresh->add_partial( $this->prefix_section . '_desctext', array(
      'selector'        => $this->section_selector . ' p.section-desctext',
      'render_callback' => function() { return get_theme_mod( $this->prefix_section . '_desctext', 'Desc Text' ); },
      // 'render_callback' => self::PARTIAL_PREFIX . $this->section . '_subtitle',
    ) );

    // if button text and section id is set
    if ( ! '' == $this->widget_button_text && ! '' == $this->widget_button_section_id ) {

      // Add a button for go to related widget area
      $wp_customize->add_setting( $this->prefix_section . '_widget_button',
          array(
              'transport'         => 'postMessage',
              'sanitize_callback' => 'wp_kses_post'
          )
      );
      $wp_customize->add_control(
          new Epsilon_Control_Button(
              $wp_customize,
              $this->prefix_section . '_widget_button',
              array(
                  'text'         => $this->widget_button_text,
                  'section_id'    => $this->widget_button_section_id,
                  'icon'          => 'dashicons-plus',
                  'section'       => $this->prefix_section,
              )
          )
      );

    }

    // Icon Class
    $wp_customize->add_setting( $this->prefix_section . '_icon_class', array(
      'sanitize_callback' => 'wp_kses_post',
      'default'           => '',
      'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $this->prefix_section . '_icon_class', array(
      'label'       => __( 'Section Icon Class', 'digicorpdomain' ),
      'type' 				=> 'text',
      'section'     => $this->prefix_section,
    ) ) );

    // Icon Image
    $wp_customize->add_setting( $this->prefix_section . '_icon_image', array(
    	'sanitize_callback' => 'esc_url',
    	'default'           => '',
    	'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, $this->prefix_section . '_icon_image', array(
    	'label'       => __( 'Icon Image', 'digicorpdomain' ),
    	'description' => __( 'Max Height: 40px', 'digicorpdomain' ),
    	'section'     => $this->prefix_section,
    ) ) );

    // Css Class
    $wp_customize->add_setting( $this->prefix_section . '_css_class', array(
      'sanitize_callback' => 'wp_kses_post',
      'default'           => '',
      'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize, $this->prefix_section . '_css_class', array(
      'label'       => __( 'Container CSS Class', 'digicorpdomain' ),
      'type' 				=> 'text',
      'section'     => $this->prefix_section,
    ) ) );

    // Background color
    $wp_customize->add_setting( $this->prefix_section . '_background_color', array(
    	'sanitize_callback' => 'sanitize_hex_color',
    	'default'           => '',
    	'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, $this->prefix_section . '_background_color', array(
    	'label'       => __( 'Backgound Color', 'digicorpdomain' ),
    	'section'     => $this->prefix_section,
    ) ) );

    // Background Image
    $wp_customize->add_setting( $this->prefix_section . '_background_image', array(
    	'sanitize_callback' => 'esc_url',
    	'default'           => '',
    	'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, $this->prefix_section . '_background_image', array(
    	'label'       => __( 'Backgound Image', 'digicorpdomain' ),
    	'description' => __( 'Minimum width: 2kpx', 'digicorpdomain' ),
    	'section'     => $this->prefix_section,
    ) ) );


  }

  function digicorp_add_inline_scripts()
  {
    if( ! is_customize_preview() ) {
      return;
    }
    ob_start();
    ?>

      ( function( $ ) {
          // --- sections - <?php echo $this->prefix_section ?> \n
          $(document).ready( function() {
            wp.customize( '<?php echo $this->prefix_section ?>_enabled', function( value ) {
              value.bind( function( to ) {
                if ( 1 == to ) {
                  $( '<?php echo $this->section_selector ?>' ).removeClass( 'customizer-display-none' );
                } else if ( 0 == to ) {
                  $( '<?php echo $this->section_selector ?>' ).addClass( 'customizer-display-none' );
                }
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_title', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?> .section-title > h3' ).html( to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_subtitle', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?> .section-title > h5' ).html( to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_desctext', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?> p.section-desctext' ).html( to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_css_class', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?>' ).attr( 'class', to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_icon_class', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?> .section-title > i' ).attr( 'class', to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_icon_image', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?> .section-title > img' ).attr( 'src', to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_background_color', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?>' ).css( 'background-color', to );
              } );
            } );

            wp.customize( '<?php echo $this->prefix_section ?>_background_image', function( value ) {
              value.bind( function( to ) {
                $( '<?php echo $this->section_selector ?>' ).css( 'background-image', 'url(' + to + ')' )
                                                            .css( 'background-size', 'cover' )
                                                            .css( 'background-position', 'center' );
              } );
            } );

            console.log('<?php echo $this->prefix_section ?> - Live Preview Created');

          } );
      } )( jQuery );

    <?php

    $data = ob_get_clean();
    wp_add_inline_script( 'digicorp-customizer-preview', $data, 'after');

  }

  function digicorp_add_frontend_styles()
  {
    if ( ! is_front_page() && ! get_theme_mod( $this->prefix_section . '_enabled' ) ) {
      return;
    }
    $section_styles = '';
    if ( get_theme_mod( $this->prefix_section . '_background_image' ) ) {
      $section_styles = sprintf( "background-image: url('%s'); background-size: cover; background-position: center;", get_theme_mod( $this->prefix_section . '_background_image' ) );
    }
    if ( get_theme_mod( $this->prefix_section . '_background_color' ) ) {
      $section_styles .= sprintf( "background-color: %s;", get_theme_mod( $this->prefix_section . '_background_color' ) );
    }
    if ( $section_styles ) {
      printf( '<style type="text/css">%1$s {%2$s}</style>', $this->section_selector, $section_styles );
    }
  }

  function remove_settings()
  {
    foreach( $this->settings as $setting) {
      remove_theme_mod( $this->prefix_section . $setting );
    }
  }

}
