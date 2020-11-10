<?php
    // including walker classes
    require_once get_template_directory() . '/inc/walker_nav.php';
    require_once get_template_directory() . '/inc/edit-mce.php';
    require_once get_template_directory() . '/inc/ariana-widget-tag-cloud.php';
    require_once get_template_directory() . '/inc/ariana-widget-archive.php';
    require_once get_template_directory() . '/inc/digicorp_mslsOutput.php';

    if( ! function_exists('ariana_theme_setup') ):
      function ariana_theme_setup() {

          load_theme_textdomain( 'digicorpdomain', get_template_directory() . '/languages' );

          // Add default posts and comments RSS feed links to head.
      		add_theme_support( 'automatic-feed-links' );

      		add_theme_support( 'title-tag' );

          add_theme_support( 'post-thumbnails' );
          add_image_size( 'small', 300, 300 , true );
          add_image_size( 'page_header', 9999, 300 , true );

          register_nav_menu(
            'headerMenu',
            __( 'Header Vertical Menu', 'digicorpdomain' )
          );
          register_nav_menu(
            'footerMenu',
            __( 'Footer Vertical Menu', 'digicorpdomain' )
          );

          add_theme_support( 'customize-selective-refresh-widgets' );

          add_theme_support( 'custom-logo' );

          add_theme_support( 'custom-background' );

          add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video', 'audio', 'link', 'status', 'chat' ) );

          // ---------------------------------------- Gutenberg ----------------------------------------

          add_theme_support( 'align-wide' );

          // // -- Disable custom font sizes
          // add_theme_support( 'disable-custom-font-sizes' );
          //
          // // -- Editor Font Sizes
          // add_theme_support( 'editor-font-sizes', array(
          // 	array(
          // 		'name'      => __( 'Small', 'ea_genesis_child' ),
          // 		'shortName' => __( 'S', 'ea_genesis_child' ),
          // 		'size'      => 12,
          // 		'slug'      => 'small'
          // 	),
          // 	array(
          // 		'name'      => __( 'Normal', 'ea_genesis_child' ),
          // 		'shortName' => __( 'M', 'ea_genesis_child' ),
          // 		'size'      => 16,
          // 		'slug'      => 'normal'
          // 	),
          // 	array(
          // 		'name'      => __( 'Large', 'ea_genesis_child' ),
          // 		'shortName' => __( 'L', 'ea_genesis_child' ),
          // 		'size'      => 20,
          // 		'slug'      => 'large'
          // 	),
          // ) );

          // -- Disable Custom Colors
          // add_theme_support( 'disable-custom-colors' );

          // -- Editor Color Palette
          // add_theme_support( 'editor-color-palette', array(
          // 	array(
          // 		'name'  => __( 'Orginal', 'digicorpdomain' ),
          // 		'slug'  => 'orginal',
          // 		'color'	=> '#c10d0d',
          // 	),
          // 	// array(
          // 	// 	'name'  => __( 'Green', 'ea_genesis_child' ),
          // 	// 	'slug'  => 'green',
          // 	// 	'color' => '#58AD69',
          // 	// ),
          // ) );
      }
    endif;
    add_action('after_setup_theme','ariana_theme_setup');

    if( ! function_exists('ariana_update_image_sizes') ):
      function ariana_update_image_sizes( $sizes ) {
          return array_merge( $sizes, array(
              'small' => __( 'Small', 'digicorpdomain' ),
              'page_header' => __( 'Page Header', 'digicorpdomain' ),
          ) );
      }
    endif;
    add_filter( 'image_size_names_choose', 'ariana_update_image_sizes' );

    /**
     * register sidebars
     */
    require_once get_template_directory() . '/inc/register-sidebars.php';

    /**
     * enqueue scripts and styles
     */
    require_once get_template_directory() . '/inc/register-scripts.php';

    /**
     * Custom template tags for this theme.
     */
    require_once get_template_directory() . '/inc/template-tags.php';

    /**
     * Functions which enhance the theme by hooking into WordPress.
     */
    require_once get_template_directory() . '/inc/template-functions.php';

    /**
     * Customizer additions.
     */
    require_once get_template_directory() . '/inc/customizer/customizer.php';

    // Ariana Widgets Plugin Hooks
    add_filter( 'ariana_widget_feature_con_class_default', function() { return 'serviceBox'; } );
    add_filter( 'ariana_widget_feature_icon_con_class_default', function() { return 'service-icon withborder hovicon effect-1 sub-a'; } );
    add_filter( 'ariana_widget_feature_content_con_class_default', function() { return 'service-content'; } );

    // Ariana Widgets Plugin Hooks
    add_filter( 'ariana_widget_box_con_class_default', function() { return 'srv-box-home'; } );
    add_filter( 'ariana_widget_box_icon_con_class_default', function() { return 'box-icon'; } );
    add_filter( 'ariana_widget_box_content_con_class_default', function() { return 'box-content'; } );

?>
