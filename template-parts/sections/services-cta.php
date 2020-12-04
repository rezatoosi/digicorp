<?php
/**
 * Template part for displaying services cta
 * for use in services archive
 * and all other service singular
 *
 *
 * @package DIGICORP
 */

?>

<?php
if ( get_theme_mod( 'digicorp_sections_services_cta' . '_enabled' ) ):
  $services_cta_section_css_class = get_theme_mod( 'digicorp_sections_services_cta' . '_css_class' ) ? get_theme_mod( 'digicorp_sections_services_cta' . '_css_class' ) : '';
  $services_cta_section_css_class = substr_replace( $services_cta_section_css_class, 'section pt-0', 0, 0 );

  $services_cta_section_text = get_theme_mod( 'digicorp_sections_services_cta' . '_desctext' );
?>
<section class="<?php echo $services_cta_section_css_class; ?>" id="section-services-cta">
    <div class="container">
      <div class="cta-box__services">
        <div class="row">
          <div class="cta-box__services-content">
            <p class="section-desctext">
              <?php
                echo $services_cta_section_text;
              ?>
            </p>
          </div>
          <div class="cta-box__services-form">
            <?php
              if ( is_active_sidebar('services_cta') ) :
                dynamic_sidebar('services_cta');
              endif;
            ?>
          </div>
        </div>
      </div>
    </div>
</section>
<?php
endif;
?>
