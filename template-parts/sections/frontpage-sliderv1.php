<?php
/**
 * Generate template for display frontpage slider
 *
 * Settings applied in customizer
 * uses Digicorp_Customizer_Section_V4()
 *
 * @package DIGICORP
 */
?>

<?php

$setting_prefix = 'digicorp_section_frontpage_slider_';

$css_classes = array(
  'container'           =>  array('slider'),
  'icon_container'      =>  'slider__content-icon',
  'title_container'     =>  'slider__content-title',
  'subtitle_container'  =>  'slider__content-subtitle',
  'text_container'      =>  'slider__content-text',
  'image_container'     =>  'slider__image',
  'buttons_container'   =>  'slider__content-buttons',
);

$settings = new Digicorp_Customizer_Section_V4_Creator( $setting_prefix, $css_classes );
$out = $settings->get_templates(
  array(
    'title' =>  '<div class="%s"><h1>%s</h1></div>'
  )
);
// var_dump($settings->get_settings());
// var_dump($out);

if ( $out !== false ) :
?>

<section id="slider"<?php echo array_key_exists( 'container_class', $out ) ? $out['container_class'] : ''; ?><?php echo array_key_exists( 'data-attr', $out ) ? $out['data-attr'] : ''; ?>>
  <div class="container">
    <div class="row">
      <div class="slider__content">
        <?php
          echo array_key_exists( 'icon', $out ) ? $out['icon'] : '';
          echo array_key_exists( 'subtitle', $out ) ? $out['subtitle'] : '';
          echo array_key_exists( 'title', $out ) ? $out['title'] : '';
          echo array_key_exists( 'text', $out ) ? $out['text'] : '';
          echo array_key_exists( 'buttons', $out ) ? $out['buttons'] : '';
        ?>
      </div>
      <?php echo array_key_exists( 'image', $out ) ? $out['image'] : ''; ?>
    </div>
  </div>
</section>

<?php
endif;
?>
