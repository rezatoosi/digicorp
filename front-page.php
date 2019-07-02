<?php get_header(); ?>

      <?php
      if ( get_theme_mod( 'digicorp_typed_slider_enabled', 1 ) ):
      ?>
        <section class="visual" id="typed-slider">
            <div class="container">
                <div class="text-block">
                    <div class="heading-holder">
                        <h1><?php echo get_theme_mod( 'digicorp_typed_slider_title' ); ?></h1>
                    </div>
                    <div id="typed-slider-typed-strings" hidden>
                      <?php
                        $typed_elements = explode( "\n", get_theme_mod( 'digicorp_typed_slider_typed_elements' ) );
                        foreach ( $typed_elements as $typed_element ) {
                          echo "<p>$typed_element</p>\n";
                        }
                      ?>
                    </div>
                    <div class="tagline">&nbsp; <p id="typed-slider-typed-element"></p> &nbsp;</div>
                    <div class="infos">
                      <?php
                        $info_tags = explode( "\n", get_theme_mod( 'digicorp_typed_slider_info_tags' ) );
                        foreach ( $info_tags as $info_tag ) {
                          echo "<span class=\"info\"><i class=\"fa fa-star\"></i> $info_tag</span>\n";
                        }
                      ?>
                    </div>
                </div>
            </div>
            <?php
            if ( ! empty( get_theme_mod( 'digicorp_typed_slider_background' ) ) ) {
              printf(
                '<img src="%1$s" alt="%2$s" class="bg-stretch" id="typed-slider-bg">',
                get_theme_mod( 'digicorp_typed_slider_background' ),
                get_theme_mod( 'digicorp_typed_slider_title' )
              );
            } else {
              printf(
                '<img src="%1$s" alt="%2$s" class="bg-stretch" id="typed-slider-bg">',
                get_template_directory_uri() . '/images/slider-bg.jpg',
                get_theme_mod( 'digicorp_typed_slider_title' )
              );
            }
            ?>
        </section>

        <!-- call to action -->
        <?php if ( ! empty( get_theme_mod( 'digicorp_typed_slider_cta_text' ) ) ): ?>
        <section class="section nopad cta" id="slider-cta">
            <div class="container nopad">
                <div id="cta">
                    <a href="<?php echo esc_url( get_page_link( get_theme_mod( 'digicorp_typed_slider_cta_link' ) ) ); ?>" class="btn btn-primary rounded"><?php echo get_theme_mod( 'digicorp_typed_slider_cta_text' ); ?></a>
                </div>
            </div>
        </section>
        <?php endif; ?>

      <?php
      endif;
      ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_features_enabled' ) ):
      ?>
        <section class="section" id="section-features">
            <div class="container">
              <?php if ( ! empty( get_theme_mod( 'digicorp_sections_features_title' ) ) ): ?>
                <div class="section-title text-center">
                    <h5><?php echo get_theme_mod( 'digicorp_sections_features_subtitle' ); ?></h5>
                    <h3><?php echo get_theme_mod( 'digicorp_sections_features_title' ); ?></h3>
                    <hr>
                </div><!-- end title -->
              <?php endif;?>

                <div class="row-fluid service-list">
                  <?php
                    if ( is_active_sidebar('frontpage_features') ) :
                      dynamic_sidebar('frontpage_features');
                    endif;
                  ?>
                </div>
            </div>
        </section>
      <?php
      endif;
      ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_services_enabled' ) ):
      ?>
        <section class="section lb" id="section-services">
            <div class="container">
              <?php if ( ! empty( get_theme_mod( 'digicorp_sections_services_title' ) ) ): ?>
                <div class="section-title text-center">
                    <h5><?php echo get_theme_mod( 'digicorp_sections_services_subtitle' ); ?></h5>
                    <h3><?php echo get_theme_mod( 'digicorp_sections_services_title' ); ?></h3>
                    <hr>
                </div><!-- end title -->
              <?php endif;?>

              <div class="seo-carousel owl-carousel owl-theme text-center">
                  <?php echo do_shortcode('[ariana_services mode=carousel]'); ?>
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
      endif;
      ?>

      <?php
      if ( get_theme_mod( 'digicorp_sections_blog_enabled' ) ):
      ?>
        <?php
          $query = new WP_Query(array(
            'posts_per_page' => '4',
            'ignore_sticky_posts' => 'true'
          ));
          if ($query->have_posts())
          {
        ?>
          <section class="section" id="section-blog">
              <div class="container">
                <?php if ( ! empty( get_theme_mod( 'digicorp_sections_blog_title' ) ) ): ?>
                  <div class="section-title text-center">
                      <h5><?php echo get_theme_mod( 'digicorp_sections_blog_subtitle' ); ?></h5>
                      <h3><?php echo get_theme_mod( 'digicorp_sections_blog_title' ); ?></h3>
                      <hr>
                  </div><!-- end title -->
                <?php endif;?>

                  <div class="row services-wrapper blog-wrapper text-center">
                    <?php
                      while ( $query->have_posts() ) {
                        $query->the_post();
                        get_template_part('template-parts/post/blog','recent');
                      }
                      wp_reset_postdata();
                    ?>
                  </div>
              </div><!-- end container -->
          </section>
        <?php } ?>
      <?php
      endif;
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
