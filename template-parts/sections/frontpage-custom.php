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
