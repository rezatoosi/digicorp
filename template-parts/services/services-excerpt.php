<?php
/**
 * Template part for displaying services excerpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */
?>

<?php
if ( has_post_thumbnail() ) {
    $url_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' )[0];
} else {
  $url_thumb = digicorp_get_service_default_image_uri();
}

$img_markup = sprintf( '<img src="%s" alt="%s" class="img-responsive" />',
                      $url_thumb,
                      $post->post_title );
$post_home_subtitle = get_post_meta( $post->ID, 'post_home_subtitle', true );
?>

<article class="service-box">
  <div class="service-box__wrapper" data-mh="service-box">
    <figure class="service-box__image">
      <a href="<?php echo get_the_permalink( $post->ID ) ?>">
        <?php echo $img_markup; ?>
        <span class="service-box__icon"><i class="fa fa-link"></i></span>
      </a>
    </figure>
    <div class="service-box__content">
      <a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>">
        <h2 class="service-box__title"><?php echo $post->post_title ?></h2>
        <h2 class="service-box__subtitle"><?php echo $post_home_subtitle ?></h2>
      </a>
    </div>
  </div>
</article>
