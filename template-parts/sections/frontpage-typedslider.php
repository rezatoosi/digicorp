
      <?php
      if ( get_theme_mod( 'digicorp_typed_slider_enabled', 1 ) ):
      ?>
        <section class="visual visual-2" id="typed-slider">
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
            }
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
