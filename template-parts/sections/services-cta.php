<?php
/**
 * Template part for displaying services cta
 * for use in services archive
 * and all other service singular
 *
 *
 * @package DIGICORP
 */
$setting_prefix = 'digicorp_section_services_cta_';
$css_classes = array(
  'container'           =>  array('section', 'pt-0'),
  'subtitle_container'  =>  'cta-box-services__title',
  'text_container'      =>  'cta-box-services__text',
  'buttons_container'   =>  'cta-box-services__buttons',
);

$settings = new Digicorp_Customizer_Section_V4_Creator( $setting_prefix, $css_classes );
$out = $settings->get_templates(
  array(
    'subtitle' =>  '<div class="row"><div class="%s"><h2>%s</h2>%s</div></div>',
  )
);

if ( $out !== false ) :
?>
<section id="section-services-cta"<?php echo array_key_exists( 'container_class', $out ) ? $out['container_class'] : ''; ?>>
    <div class="container">
      <div class="cta-box-services">

        <?php echo array_key_exists( 'subtitle', $out ) ? $out['subtitle'] : ''; ?>

        <div class="row">
          <div class="cta-box-services__content">
            <?php

              echo array_key_exists( 'text', $out ) ? $out['text'] : '';
              echo array_key_exists( 'buttons', $out ) ? $out['buttons'] : '';
            ?>
          </div>
          <div class="cta-box-services__form">
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
