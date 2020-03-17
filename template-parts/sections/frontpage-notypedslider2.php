
      <?php
      if ( get_theme_mod( 'digicorp_typed_slider_enabled', 1 ) ):
      ?>

      <?php
      $section_bg = get_theme_mod( 'digicorp_typed_slider_background' );
      $section_class = 'visual visual-2';
      $section_class .= ( ! empty( $section_bg ) ? ' bg-highlight bg-highlight-lightblack' : '' );
      $section_bg = ( ! empty( $section_bg ) ? ' data-bg-img="' . esc_url( $section_bg ) . '"' : '' );

      ?>
        <section class="<?php echo $section_class; ?>" id="typed-slider"<?php echo $section_bg; ?>>
            <div class="container">
                <div class="text-block">
                    <div class="heading-holder">
                        <h1><?php echo get_theme_mod( 'digicorp_typed_slider_title' ); ?></h1>
                    </div>
                    <div>
                      <p>
                      <?php echo get_theme_mod( 'digicorp_typed_slider_typed_elements' ) ?>
                      </p>
                    </div>
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
            // if ( ! empty( get_theme_mod( 'digicorp_typed_slider_background' ) ) ) {
            //   printf(
            //     '<img src="%1$s" alt="%2$s" class="bg-stretch" id="typed-slider-bg">',
            //     get_theme_mod( 'digicorp_typed_slider_background' ),
            //     get_theme_mod( 'digicorp_typed_slider_title' )
            //   );
            // }
            // else {
            //   printf(
            //     '<img src="%1$s" alt="%2$s" class="bg-stretch" id="typed-slider-bg">',
            //     get_template_directory_uri() . '/assets/dist/images/slider-bg.jpg',
            //     get_theme_mod( 'digicorp_typed_slider_title' )
            //   );
            // }
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
