<?php
/**
 * Template part for displaying Contact Us - Map
 * for use in frontpage or contact
 *
 *
 *
 * @package DIGICORP
 */

?>

<?php
if ( get_theme_mod( 'digicorp_sections_contact_social' . '_enabled' ) ):
  $sections_about_brands_css_class = get_theme_mod( 'digicorp_sections_contact_social' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_contact_social' . '_css_class' ) : 'section p-0 bg-light-gray';
?>
<section class="<?php echo $sections_about_brands_css_class; ?>" id="section-contact-social">
    <div class="container-fluid equal-height">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="p-40 pt-70">
                    <div class="row">
                      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_social'. '_title' ) ) ): ?>
                        <div class="section-title text-center">

                          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_social' . '_icon_class' ) ) ): ?>
                            <i class="<?php echo get_theme_mod( 'digicorp_sections_contact_social' . '_icon_class' ); ?>"></i>
                          <?php elseif ( ! empty( get_theme_mod( 'digicorp_sections_contact_social' . '_icon_image' ) ) ): ?>
                            <img src="<?php echo get_theme_mod( 'digicorp_sections_contact_social' . '_icon_image' ); ?>" title="" class="img-responsive">
                          <?php endif; ?>

                          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_social' . '_subtitle' ) ) ): ?>
                            <h5><?php echo get_theme_mod( 'digicorp_sections_contact_social' . '_subtitle' ); ?></h5>
                          <?php endif; ?>
                            <h3><?php echo get_theme_mod( 'digicorp_sections_contact_social' . '_title' ); ?></h3>
                            <!-- <hr> -->

                        </div><!-- end title -->
                      <?php endif;?>

                      <?php if ( ! empty( get_theme_mod( 'digicorp_sections_contact_social' . '_desctext' ) ) ): ?>
                        <div class="row mh-20">
                            <div class="col-md-8 col-md-offset-2">
                                <p class="section-desctext font-header text-center padding-x-md">
                                  <?php echo get_theme_mod( 'digicorp_sections_contact_social' . '_desctext' ); ?>
                                </p>
                            </div>
                        </div>
                      <?php endif; ?>
                    </div>

                    <div class="row">
                      <?php
                        if ( is_active_sidebar('contact_social') ) :
                          dynamic_sidebar('contact_social');
                        endif;
                      ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <?php
                if ( is_active_sidebar('contact_map') ) :
                  dynamic_sidebar('contact_map');
                endif;
              ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
?>
