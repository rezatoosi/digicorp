<?php
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
      'name' => __('Front Page - CTA 01', 'digicorpdomain'),
      'id' => 'frontpage_cta_01',
      'description' => __('Call to action section after services section', 'digicorpdomain'),
      // 'before_widget' => '<div id="%1$s">',
      'before_widget' => '',
      // 'after_widget' => '</div><!--end widget-->',
      'after_widget' => '',
      'before_title' => '',
      'after_title' => ''
    ));
    register_sidebar(array(
      'name' => __('Front Page - CTA 02', 'digicorpdomain'),
      'id' => 'frontpage_cta_02',
      'description' => __('Call to action section after brands section', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s">',
      'after_widget' => '</div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));
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
      'name' => __('Front Page - FAQ', 'digicorpdomain'),
      'id' => 'frontpage_faq',
      'description' => __('FAQ section in frontpage', 'digicorpdomain'),
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
    register_sidebar(array(
      'name' => __('Services CTA - Under Main Services', 'digicorpdomain'),
      'id' => 'services_mainservice_cta',
      'description' => __('CTA under main services section in services or frontpage', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s">',
      'after_widget' => '</div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));

    // contactus widgets
    register_sidebar(array(
      'name' => __('Contact - Address', 'digicorpdomain'),
      'id' => 'contact_address',
      'description' => __('Contact Address section in contact or frontpage', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s"><div class="col-sm-6">',
      'after_widget' => '</div></div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));

    register_sidebar(array(
      'name' => __('Contact - Phone', 'digicorpdomain'),
      'id' => 'contact_phone',
      'description' => __('Contact Phone section in contact or frontpage', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s"><div class="col-sm-4 col-xs-12">',
      'after_widget' => '</div></div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));

    register_sidebar(array(
      'name' => __('Contact - Social', 'digicorpdomain'),
      'id' => 'contact_social',
      'description' => __('Contact Social section in contact or frontpage', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s"><div class="col-sm-6 col-xs-12">',
      'after_widget' => '</div></div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));

    register_sidebar(array(
      'name' => __('Contact - Map', 'digicorpdomain'),
      'id' => 'contact_map',
      'description' => __('Contact Map section in contact or frontpage', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s">',
      'after_widget' => '</div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));

    register_sidebar(array(
      'name' => __('Contact - Form', 'digicorpdomain'),
      'id' => 'contact_form',
      'description' => __('Contact Form section in contactus', 'digicorpdomain'),
      'before_widget' => '<div id="%1$s" class="%2$s">',
      'after_widget' => '</div><!--end widget-->',
      'before_title' => '',
      'after_title' => ''
    ));
  }
endif;
add_action('widgets_init','ariana_widgets_init');
