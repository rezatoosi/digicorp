<?php
/**
 * Template part for displaying Contact Us - Phone
 * for use in frontpage or contact
 *
 *
 *
 * @package DIGICORP
 */

?>


<?php
if ( get_theme_mod( 'digicorp_sections_contact_phone' . '_enabled' ) ):
  $sections_about_brands_css_class = get_theme_mod( 'digicorp_sections_contact_phone' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_contact_phone' . '_css_class' ) : 'section lb';
?>
<section class="<?php echo $sections_about_brands_css_class; ?>" id="section-contact-phone">
    <div class="container">
      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_phone'. '_title' ) ) ): ?>
        <div class="section-title text-center">

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_phone' . '_icon_class' ) ) ): ?>
            <i class="<?php echo get_theme_mod( 'digicorp_sections_contact_phone' . '_icon_class' ); ?>"></i>
          <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_contact_phone' . '_icon_image' ) ) ): ?>
            <img src="<?php echo get_theme_mod( 'digicorp_sections_contact_phone' . '_icon_image' ); ?>" title="" class="img-responsive">
          <?php endif; ?>

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_phone' . '_subtitle' ) ) ): ?>
            <h5><?php echo get_theme_mod( 'digicorp_sections_contact_phone' . '_subtitle' ); ?></h5>
          <?php endif; ?>
            <h3><?php echo get_theme_mod( 'digicorp_sections_contact_phone' . '_title' ); ?></h3>
            <!-- <hr> -->

        </div><!-- end title -->
      <?php endif;?>

      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_phone' . '_desctext' ) ) ): ?>
        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="section-desctext font-header text-center padding-x-md">
                  <?php echo get_theme_mod( 'digicorp_sections_contact_phone' . '_desctext' ); ?>
                </p>
            </div>
        </div>
      <?php endif; ?>

        <div class="row">
          <?php
            if ( is_active_sidebar('contact_phone') ) :
              dynamic_sidebar('contact_phone');
            endif;
          ?>
        </div>
    </div>
</section>
<?php
endif;
?>
