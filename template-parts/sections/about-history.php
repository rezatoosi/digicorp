<?php
/**
 * Template part for displaying about us - history
 * for use in frontpage or aboutus
 *
 *
 *
 * @package DIGICORP
 */

?>

<?php
if ( get_theme_mod( 'digicorp_sections_about_history' . '_enabled' ) ):
  $sections_about_history_css_class = get_theme_mod( 'digicorp_sections_about_history' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_about_history' . '_css_class' ) : 'section-twice';
?>
  <section class="<?php echo $sections_about_history_css_class; ?>" id="section-about-history">
      <div class="section-head bg-light-gray">
          <div class="container">
            <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_history'. '_title' ) ) ): ?>
              <div class="section-title text-center">

                <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_history' . '_icon_class' ) ) ): ?>
                  <i class="<?php echo get_theme_mod( 'digicorp_sections_about_history' . '_icon_class' ); ?>"></i>
                <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_about_history' . '_icon_image' ) ) ): ?>
                  <img src="<?php echo get_theme_mod( 'digicorp_sections_about_history' . '_icon_image' ); ?>" title="" class="img-responsive">
                <?php endif; ?>

                <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_history' . '_subtitle' ) ) ): ?>
                  <h5><?php echo get_theme_mod( 'digicorp_sections_about_history' . '_subtitle' ); ?></h5>
                <?php endif; ?>
                  <h3><?php echo get_theme_mod( 'digicorp_sections_about_history' . '_title' ); ?></h3>
                  <!-- <hr> -->

              </div><!-- end title -->
            <?php endif;?>

            <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_history' . '_desctext' ) ) ): ?>
              <div class="row mh-20">
                  <div class="col-md-8 col-md-offset-2">
                      <p class="section-desctext font-header text-center padding-x-md">
                        <?php echo get_theme_mod( 'digicorp_sections_about_history' . '_desctext' ); ?>
                      </p>
                  </div>
              </div>
            <?php endif; ?>
          </div>
      </div>
      <div class="section-body">
          <div class="container">
              <div class="row service-list service-list-center noborder">
                <?php
                  if ( is_active_sidebar('aboutus_history') ) :
                    dynamic_sidebar('aboutus_history');
                  endif;
                ?>
              </div>
          </div>
      </div>
  </section>
<?php
endif;
?>
