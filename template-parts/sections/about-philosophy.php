<?php
/**
 * Template part for displaying about us - philosophy
 * for use in frontpage or aboutus
 *
 *
 *
 * @package DIGICORP
 */

?>

<?php
if ( get_theme_mod( 'digicorp_sections_about_philosophy' . '_enabled' ) ):
  $sections_about_brands_css_class = get_theme_mod( 'digicorp_sections_about_philosophy' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_about_philosophy' . '_css_class' ) : 'section bg-light-gray bg-highlight bg-img bg-fixed bg-img-01';
?>
<section class="<?php echo $sections_about_brands_css_class; ?>" id="section-about-philosophy">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8">
              <div class="p-40 bg-white shadow-dark-2">
                <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_philosophy'. '_title' ) ) ): ?>
                  <div class="section-title text-center">

                    <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_philosophy' . '_icon_class' ) ) ): ?>
                      <i class="<?php echo get_theme_mod( 'digicorp_sections_about_philosophy' . '_icon_class' ); ?>"></i>
                    <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_about_philosophy' . '_icon_image' ) ) ): ?>
                      <img src="<?php echo get_theme_mod( 'digicorp_sections_about_philosophy' . '_icon_image' ); ?>" title="" class="img-responsive">
                    <?php endif; ?>

                    <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_philosophy' . '_subtitle' ) ) ): ?>
                      <h5><?php echo get_theme_mod( 'digicorp_sections_about_philosophy' . '_subtitle' ); ?></h5>
                    <?php endif; ?>
                      <h3><?php echo get_theme_mod( 'digicorp_sections_about_philosophy' . '_title' ); ?></h3>
                      <hr>

                  </div><!-- end title -->
                <?php endif;?>

                <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_philosophy' . '_desctext' ) ) ): ?>
                  <div class="mh-20">
                      <div>
                          <p class="section-desctext font-header text-center padding-x-md">
                            <?php echo get_theme_mod( 'digicorp_sections_about_philosophy' . '_desctext' ); ?>
                          </p>
                      </div>
                  </div>
                <?php endif; ?>

              </div>
            </div>
        </div>
    </div>
</section>
<?php
endif;
?>
