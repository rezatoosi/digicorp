<?php get_header(); ?>

      <?php get_template_part( 'template-parts/sections/frontpage', 'notypedslider2' ); ?>

      <?php get_template_part( 'template-parts/sections/about', 'brands' ); ?>

      <?php
        if ( is_active_sidebar('frontpage_cta_02') ) :
          dynamic_sidebar('frontpage_cta_02');
        endif;
      ?>

      <?php get_template_part( 'template-parts/sections/services', 'mainservices' ); ?>

      <?php
        if ( is_active_sidebar('frontpage_cta_01') ) :
          dynamic_sidebar('frontpage_cta_01');
        endif;
      ?>

      <?php get_template_part( 'template-parts/sections/frontpage', 'features' ); ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_services_enabled' ) ):
      ?>
        <section class="section" id="section-services">
            <div class="container">
              <?php if ( ! empty( get_theme_mod( 'digicorp_sections_services_title' ) ) ): ?>
                <div class="section-title text-center">
                    <h5><?php echo get_theme_mod( 'digicorp_sections_services_subtitle' ); ?></h5>
                    <h3><?php echo get_theme_mod( 'digicorp_sections_services_title' ); ?></h3>
                    <hr>
                </div><!-- end title -->
              <?php endif;?>

              <div class="text-center">
                  <?php echo do_shortcode('[ariana_services mode=homebox]'); ?>
              </div>
            </div>
        </section>
      <?php
      endif;
      ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_projects_enabled' ) ):
      ?>
        <section class="section db casebg" id="section-projects">
            <div class="container-fluid">
              <?php if ( ! empty( get_theme_mod( 'digicorp_sections_projects_title' ) ) ): ?>
                <div class="section-title text-center">
                    <h5><?php echo get_theme_mod( 'digicorp_sections_projects_subtitle' ); ?></h5>
                    <h3><?php echo get_theme_mod( 'digicorp_sections_projects_title' ); ?></h3>
                    <hr>
                </div><!-- end title -->
              <?php endif;?>

                <div class="seo-studio owl-carousel owl-theme text-center">
                    <?php echo do_shortcode('[ariana_projects mode=carousel]'); ?>
                </div>
            </div>
        </section>
        <?php
        add_action( "wp_footer", function() {
          $locale = get_locale();
        ?>
        <script type="text/javascript">
          jQuery(document).ready(function(){
            var $ = jQuery.noConflict();
            $('.seo-studio').owlCarousel({
                loop:true,
                margin:10,
                dots:false,
                rtl: <?php echo ('fa_IR' == $locale ? 'true' : 'false'); ?>,
                responsiveClass:true,
                navText: [
                   "<i class='fa fa-angle-<?php echo ('fa_IR' == $locale ? 'right' : 'left'); ?>'></i>",
                   "<i class='fa fa-angle-<?php echo ('fa_IR' == $locale ? 'left' : 'right'); ?>'></i>"
                ],
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:6,
                        nav:true,
                        loop:false
                    }
                }
            });
          });
        </script>
      <?php
      });
      endif;
      ?>


      <?php
        get_template_part( 'template-parts/blog/blog', 'sticky' );
      ?>

      <?php
        // get_template_part( 'template-parts/blog/blog', 'sticky-old' );
      ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_testimonials_enabled' ) ):
      ?>
        <section class="section db testibg" id="section-testimonials">
            <div class="container">
              <?php if ( ! empty( get_theme_mod( 'digicorp_sections_testimonials_title' ) ) ): ?>
                <div class="section-title text-center">
                    <h5><?php echo get_theme_mod( 'digicorp_sections_testimonials_subtitle' ); ?></h5>
                    <h3><?php echo get_theme_mod( 'digicorp_sections_testimonials_title' ); ?></h3>
                    <hr>
                </div><!-- end title -->
              <?php endif;?>

                <div class="row">
                  <?php echo do_shortcode('[testimonials rand=0 max=3]'); ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
      <?php
      endif;
      ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_custom_enabled' ) ):
        $custom_section_css_class = get_theme_mod( 'digicorp_sections_custom_css_class' ) ? get_theme_mod( 'digicorp_sections_custom_css_class' ) : 'section';
      ?>
        <section class="<?php echo $custom_section_css_class; ?>" id="section-custom">
            <div class="container">
              <?php if ( ! empty( get_theme_mod( 'digicorp_sections_custom_title' ) ) ): ?>
                <div class="section-title text-center">
                    <h5><?php echo get_theme_mod( 'digicorp_sections_custom_subtitle' ); ?></h5>
                    <h3><?php echo get_theme_mod( 'digicorp_sections_custom_title' ); ?></h3>
                    <hr>
                </div><!-- end title -->
              <?php endif;?>

                <div class="row">
                  <?php
                    if ( is_active_sidebar('frontpage_custom') ) :
                      dynamic_sidebar('frontpage_custom');
                    endif;
                  ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
      <?php
      endif;
      ?>

<?php get_footer(); ?>
