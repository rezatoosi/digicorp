<?php
    // including walker classes
    require_once get_template_directory() . '/inc/walker_nav.php';
    require_once get_template_directory() . '/inc/edit-mce.php';
    require_once get_template_directory() . '/inc/ariana-widget-tag-cloud.php';
    require_once get_template_directory() . '/inc/ariana-widget-archive.php';

    if( ! function_exists('aridiag_setup') ):
      function aridiag_setup() {

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
      }
    endif;
    add_action('after_setup_theme','aridiag_Setup');

    if( ! function_exists('ariana_update_image_sizes') ):
      function ariana_update_image_sizes( $sizes ) {
          return array_merge( $sizes, array(
              'small' => __( 'Small', 'digicorpdomain' ),
              'page_header' => __( 'Page Header', 'digicorpdomain' ),
          ) );
      }
    endif;
    add_filter( 'image_size_names_choose', 'ariana_update_image_sizes' );

    if( ! function_exists('ariana_widgets_init') ):
      function ariana_widgets_init(){

        // Footer widgets
        register_sidebar(array(
          'name' => __('Footer Widget 1', 'digicorpdomain'),
          'id' => 'footer-widget-1',
          'description' => __('The 1st widget in the footer', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '<div class="section-title text-left"><h5>',
          'after_title' => '</h5><hr></div>'
        ));
        register_sidebar(array(
          'name' => __('Footer Widget 2', 'digicorpdomain'),
          'id' => 'footer-widget-2',
          'description' => __('The 2nd widget in the footer', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '<div class="section-title text-left"><h5>',
          'after_title' => '</h5><hr></div>'
        ));
        register_sidebar(array(
          'name' => __('Footer Widget 3', 'digicorpdomain'),
          'id' => 'footer-widget-3',
          'description' => __('The 3rd widget in the footer', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '<div class="section-title text-left"><h5>',
          'after_title' => '</h5><hr></div>'
        ));
        register_sidebar(array(
          'name' => __('Footer Widget 4', 'digicorpdomain'),
          'id' => 'footer-widget-4',
          'description' => __('The 4th widget in the footer', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '<div class="section-title text-left"><h5>',
          'after_title' => '</h5><hr></div>'
        ));

        // sidebar
        register_sidebar(array(
          'name' => __('Right Sidebar', 'digicorpdomain'),
          'id' => 'right-sidebar-1',
          'description' => __('Sidebar in the right column of pages', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="widget clearfix">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '<div class="section-title text-left"><h5>',
          'after_title' => '</h5><hr></div>'
        ));
        register_sidebar(array(
          'name' => __('Right Sidebar Bottom', 'digicorpdomain'),
          'id' => 'right-sidebar-bottom',
          'description' => __('To add in the bottom of right column', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="widget clearfix">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '<div class="section-title text-left"><h5>',
          'after_title' => '</h5><hr></div>'
        ));

        //front page widgets
        register_sidebar(array(
          'name' => __('Front Page - Features', 'digicorpdomain'),
          'id' => 'frontpage_features',
          'description' => __('Features section in frontpage', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-6">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '',
          'after_title' => ''
        ));
        register_sidebar(array(
          'name' => __('Front Page - Custom', 'digicorpdomain'),
          'id' => 'frontpage_custom',
          'description' => __('Custom section in frontpage', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '',
          'after_title' => ''
        ));
        register_sidebar(array(
          'name' => __('Footer - Copyright', 'digicorpdomain'),
          'id' => 'footer-copyright',
          'description' => __('Copyright bar in footer', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="footer-copyright %2$s">',
          'after_widget' => '</div><!--end widget-->',
          'before_title' => '',
          'after_title' => ''
        ));

        // About us widgets
        register_sidebar(array(
          'name' => __('About us - Brands', 'digicorpdomain'),
          'id' => 'aboutus_brands',
          'description' => __('Brands section in aboutus or frontpage', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s"><div class="col-md-2 col-sm-4 col-xs-6"><div class="bg-light-gray p-10 mb-10 text-center">',
          'after_widget' => '</div></div></div><!--end widget-->',
          'before_title' => '',
          'after_title' => ''
        ));
        register_sidebar(array(
          'name' => __('About us - Our History', 'digicorpdomain'),
          'id' => 'aboutus_history',
          'description' => __('Our history section in aboutus or frontpage', 'digicorpdomain'),
          'before_widget' => '<div class="col-md-3 col-sm-6"><div id="%1$s" class="%2$s">',
          'after_widget' => '</div></div><!--end widget-->',
          'before_title' => '',
          'after_title' => ''
        ));

        // Service widgets
        register_sidebar(array(
          'name' => __('Services - Main(General) Services', 'digicorpdomain'),
          'id' => 'services_mainservice',
          'description' => __('Main services section in services or frontpage', 'digicorpdomain'),
          'before_widget' => '<div id="%1$s" class="%2$s"><div class="col-sm-6">',
          'after_widget' => '</div></div><!--end widget-->',
          'before_title' => '',
          'after_title' => ''
        ));
      }
    endif;
    add_action('widgets_init','ariana_widgets_init');

    if( ! function_exists('ariana_scripts') ):
      /**
       * Enqueue scripts and styles.
       */
      function ariana_scripts() {
      if ( is_rtl() /* && 'fa_IR' == get_locale() */) {
          wp_enqueue_style( 'digicorp-styles', get_template_directory_uri() . '/assets/dist/css/main-rtl.css' );
        }
        else {
          wp_enqueue_style( 'digicorp-styles', get_template_directory_uri() . '/assets/dist/css/main.css' );
          wp_enqueue_style( 'google-fonts-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
          wp_enqueue_style( 'google-fonts-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,700italic,700,500italic,500,400italic,300italic,300&amp;subset=latin,latin-ext' );
        }
        // wp_enqueue_style( 'ariana-style', get_stylesheet_uri() );



        // wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array( ), '1.11.3', true);
        // wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '1.0', true);
        // wp_enqueue_script( 'ariana-plugins-js', get_template_directory_uri() . '/js/plugins.js', array( 'jquery', 'bootstrap-js' ), '1.0', true);
        wp_enqueue_script( 'digicorp-scripts', get_template_directory_uri() . '/assets/dist/js/bundle.js', array( 'jquery' ), '1.0', true);

      	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      		wp_enqueue_script( 'comment-reply' );
      	}
      }
    endif;
    add_action( 'wp_enqueue_scripts', 'ariana_scripts' );

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
