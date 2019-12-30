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
if ( get_theme_mod( 'digicorp_sections_contact_form' . '_enabled' ) ):
  $sections_about_brands_css_class = get_theme_mod( 'digicorp_sections_contact_form' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_contact_form' . '_css_class' ) : 'section';
?>
<section class="<?php echo $sections_about_brands_css_class; ?>" id="section-contact-form">
    <div class="container">
      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_form'. '_title' ) ) ): ?>
        <div class="section-title text-center">

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_form' . '_icon_class' ) ) ): ?>
            <i class="<?php echo get_theme_mod( 'digicorp_sections_contact_form' . '_icon_class' ); ?>"></i>
          <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_contact_form' . '_icon_image' ) ) ): ?>
            <img src="<?php echo get_theme_mod( 'digicorp_sections_contact_form' . '_icon_image' ); ?>" title="" class="img-responsive">
          <?php endif; ?>

          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_form' . '_subtitle' ) ) ): ?>
            <h5><?php echo get_theme_mod( 'digicorp_sections_contact_form' . '_subtitle' ); ?></h5>
          <?php endif; ?>
            <h3><?php echo get_theme_mod( 'digicorp_sections_contact_form' . '_title' ); ?></h3>
            <!-- <hr> -->

        </div><!-- end title -->
      <?php endif;?>

      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_form' . '_desctext' ) ) ): ?>
        <div class="row mh-20">
            <div class="col-md-8 col-md-offset-2">
                <p class="section-desctext font-header text-center padding-x-md">
                  <?php echo get_theme_mod( 'digicorp_sections_contact_form' . '_desctext' ); ?>
                </p>
            </div>
        </div>
      <?php endif; ?>

        <div class="row">
            <div class="col-xs-12 pt-30">
              <?php
                if ( is_active_sidebar('contact_form') ) :
                  dynamic_sidebar('contact_form');
                endif;
              ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
?>
