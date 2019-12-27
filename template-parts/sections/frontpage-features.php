<?php
/**
 * Template part for displaying features
 * for use in frontpage or aboutus
 *
 *
 *
 * @package DIGICORP
 */

?>

<?php
if ( get_theme_mod( 'digicorp_sections_features' . '_enabled' ) ):
  $sections_about_brands_css_class = get_theme_mod( 'digicorp_sections_features' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_features' . '_css_class' ) : 'section bg-light-gray';
?>
<section class="<?php echo $sections_about_brands_css_class; ?>" id="section-features">
    <div class="container">
      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_features'. '_title' ) ) ): ?>
        <div class="section-title text-center">

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_features' . '_icon_class' ) ) ): ?>
            <i class="<?php echo get_theme_mod( 'digicorp_sections_features' . '_icon_class' ); ?>"></i>
          <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_features' . '_icon_image' ) ) ): ?>
            <img src="<?php echo get_theme_mod( 'digicorp_sections_features' . '_icon_image' ); ?>" title="" class="img-responsive">
          <?php endif; ?>

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_features' . '_subtitle' ) ) ): ?>
            <h5><?php echo get_theme_mod( 'digicorp_sections_features' . '_subtitle' ); ?></h5>
          <?php endif; ?>
            <h3><?php echo get_theme_mod( 'digicorp_sections_features' . '_title' ); ?></h3>
            <!-- <hr> -->

        </div><!-- end title -->
      <?php endif;?>

      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_features' . '_desctext' ) ) ): ?>
        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="section-desctext font-header text-center padding-x-md">
                  <?php echo get_theme_mod( 'digicorp_sections_features' . '_desctext' ); ?>
                </p>
            </div>
        </div>
      <?php endif; ?>

        <div class="row service-list service-list-center noborder">
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
