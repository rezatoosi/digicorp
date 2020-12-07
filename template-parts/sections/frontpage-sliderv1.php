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
$out = array();

if ( get_theme_mod( $setting_prefix . 'enabled' ) ) :
  $mod_names = array(
    'enabled',
    'title',
    'subtitle',
    'display_hr',
    'text',
    'image',
    'widget',
    'icon_class',
    'icon_image',
    'container_class',
    'bg_color',
    'bg_img',
    'bg_highlight',
    'bg_pos_x',
    'bg_pos_y',
    'bg_size',
    'bg_repeat',
    'bg_attachment',
    'cta_btn_text',
    'cta_btn_link',
    'cta_btn_page',
    'buttons'
  );

  // read settings from database and input theme into a 2D array
  $mods = array();
  foreach ( $mod_names as $mod_name  ) {
    $mods[ $mod_name ] = get_theme_mod( $setting_prefix . $mod_name );
  }

  // var_dump( $mods );

  /*
  ** generate container_class
  */
  $mods['container_class'] = explode( ' ', $mods['container_class'] );

  // add necessary classes
  if ( ! in_array( 'slider', $mods['container_class'] ) ) {
    array_unshift( $mods['container_class'], 'slider' );
  }

  // check if background highlight is available
  switch ( $mods['bg_highlight'] ) {
    case 'highlight-dark':
      $mods['container_class'][] = 'bg-highlight';
      $mods['container_class'][] = 'bg-highlight-lightblack';
      break;

    case 'highlight-darker':
      $mods['container_class'][] = 'bg-highlight';
      break;

    case 'highlight-light':
      $mods['container_class'][] = 'bg-highlight';
      $mods['container_class'][] = 'bg-highlight-white';
      break;

    case 'highlight-main':
      $mods['container_class'][] = 'bg-highlight';
      $mods['container_class'][] = 'bg-highlight-main';
      break;

    case 'highlight-none':
      // nothing
      break;

    default:
      if ( $mods['bg_img'] ) {
        $mods['container_class'][] = 'bg-highlight';
      }
      break;
  }

  // remove empty elements
  $mods['container_class'] = array_filter( $mods['container_class'] );
  // make string
  $out['container_class'] = implode( ' ', $mods['container_class'] );
  $out['container_class'] = sprintf(
    ' class="%s"',
    $out['container_class']
  );

  /*
  ** generate data attribiutes
  */
  $data_attr_array = array();

  if ( $mods['bg_color'] )  {
    $data_attr_array['data-bg-color'] = $mods['bg_color'];
  }
  if ( $mods['bg_img'] ) {
    $data_attr_array['data-bg-img'] = $mods['bg_img'];
  }
  if ( $mods['bg_pos_x'] ) {
    $data_attr_array['data-bg-pos-x'] = $mods['bg_pos_x'];
  }
  if ( $mods['bg_pos_y'] ) {
    $data_attr_array['data-bg-pos-y'] = $mods['bg_pos_y'];
  }
  if ( $mods['bg_size'] ) {
    $data_attr_array['data-bg-size'] = $mods['bg_size'];
  }
  if ( $mods['bg_repeat'] !== false ) {
    $data_attr_array['data-bg-repeat'] = $mods['bg_repeat'] ? 'repeat' : 'no-repeat';
  }
  if ( $mods['bg_attachment'] !== false ) {
    $data_attr_array['data-bg-attachment'] = $mods['bg_attachment'] ? 'scroll' : 'fixed';
  }

  $out['data-attr'] = '';
  foreach ( $data_attr_array as $key => $value ) {
    $out['data-attr'] .= sprintf( ' %s="%s"', $key, $value );
  }

  /*
  **  Define Elements Markup
  */
  $template = [
    'icon_container'    =>  '<div class="slider__content-icon">%s</div>',
    'icon_font'         =>  '<i class="%s"></i>',
    'icon_image'        =>  '<img src="%s" alt="%s" %s/>',
    'title'             =>  '<div class="slider__content-title"><h1>%s</h1></div>',
    'subtitle'          =>  '<div class="slider__content-subtitle"><span>%s</span>%s</div>',
    'text'              =>  '<div class="slider__content-text"><p>%s</p></div>',
    'image'             =>  '<div class="slider__image"><img src="%s" alt="%s"/></div>',
    'cta-button'        =>  '<a class="btn" href="%s">%s</a>',
    'buttons'           =>  '<div class="slider__content-buttons">%s</div>',
  ];

  /*
  ** icon
  */
  if ( $mods['icon_image'] ) {
    $out['icon'] = sprintf(
      $template['icon_container'],
      sprintf(
        $template['icon_image'],
        $mods['icon_image'],
        $mods['title'] ? $mods['title'] : '',
        $mods['icon_class'] ? 'class="' . $mods['icon_class'] . '"' : ''
        )
    );
  } elseif ( $mods['icon_class'] ) {
    $out['icon'] = sprintf(
      $template['icon_container'],
      sprintf(
        $template['icon_font'],
        $mods['icon_class']
        )
    );
  }

  /*
  ** title
  */
  if ( $mods['title'] ) {
    $out['title'] = sprintf(
      $template['title'],
      $mods['title']
    );
  }

  /*
  ** subtitle
  */
  if ( $mods['subtitle'] ) {
    $out['subtitle'] = sprintf(
      $template['subtitle'],
      $mods['subtitle'],
      $mods['display_hr'] ? '<hr/>' : ''
    );
  }

  /*
  ** text
  */
  if ( $mods['text'] ) {
    $out['text'] = sprintf(
      $template['text'],
      $mods['text']
    );
  }

  /*
  ** image
  */
  if ( $mods['image'] ) {
    $out['image'] = sprintf(
      $template['image'],
      wp_get_attachment_image_src( $mods['image'], 'medium' )[0],
      $mods['title'] ? $mods['title'] : ''
    );
  }

  /*
  ** Generate buttons
  */
  if ( $mods['cta_btn_text'] ) {
    $out['buttons'] = sprintf(
      $template['buttons'],
      sprintf(
        $template['cta-button'],
        ( $mods['cta_btn_link'] ? $mods['cta_btn_link'] : get_page_link( $mods['cta_btn_page'] ) ),
        $mods['cta_btn_text']
        )
    );
  } elseif ( $mods['buttons'] ) {
    $out['buttons'] = sprintf( $template['buttons'], $mods['buttons'] );
  }




  // var_dump($out);
  // die();

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
