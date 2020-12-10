<?php get_header(); ?>

      <?php
        get_template_part( 'template-parts/sections/frontpage', 'sliderv1' );
        get_template_part( 'template-parts/sections/frontpage', 'notypedslider2' );
      ?>

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

      <?php
      // get_template_part( 'template-parts/sections/frontpage', 'features' ); ?>

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
        get_template_part( 'template-parts/sections/frontpage', 'projects' );
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

      <?php get_template_part( 'template-parts/sections/frontpage', 'custom' ); ?>

      <?php
        if ( is_active_sidebar('frontpage_faq') ) :
          dynamic_sidebar('frontpage_faq');
        endif;
      ?>

<?php get_footer(); ?>
