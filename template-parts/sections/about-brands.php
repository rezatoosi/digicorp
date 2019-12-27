<?php
/**
 * Template part for displaying about us brands
 * for use in frontpage or aboutus
 *
 *
 *
 * @package DIGICORP
 */

?>

<?php
if ( get_theme_mod( 'digicorp_sections_about_brands' . '_enabled' ) ):
  $sections_about_brands_css_class = get_theme_mod( 'digicorp_sections_about_brands' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_about_brands' . '_css_class' ) : 'section pt-90';
?>
<section class="<?php echo $sections_about_brands_css_class; ?>" id="section-about-brands">
    <div class="container">
      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_brands'. '_title' ) ) ): ?>
        <div class="section-title text-center">

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_brands' . '_icon_class' ) ) ): ?>
            <i class="<?php echo get_theme_mod( 'digicorp_sections_about_brands' . '_icon_class' ); ?>"></i>
          <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_about_brands' . '_icon_image' ) ) ): ?>
            <img src="<?php echo get_theme_mod( 'digicorp_sections_about_brands' . '_icon_image' ); ?>" title="" class="img-responsive">
          <?php endif; ?>

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_brands' . '_subtitle' ) ) ): ?>
            <h5><?php echo get_theme_mod( 'digicorp_sections_about_brands' . '_subtitle' ); ?></h5>
          <?php endif; ?>
            <h3><?php echo get_theme_mod( 'digicorp_sections_about_brands' . '_title' ); ?></h3>
            <!-- <hr> -->

        </div><!-- end title -->
      <?php endif;?>

      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_about_brands' . '_desctext' ) ) ): ?>
        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="section-desctext font-header text-center padding-x-md">
                  <?php echo get_theme_mod( 'digicorp_sections_about_brands' . '_desctext' ); ?>
                </p>
            </div>
        </div>
      <?php endif; ?>

        <div class="row gutter-10">
          <?php
            if ( is_active_sidebar('aboutus_brands') ) :
              dynamic_sidebar('aboutus_brands');
            endif;
          ?>
        </div>
    </div>
</section>
<?php
endif;
?>
