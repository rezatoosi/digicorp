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
$url_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
$img_markup = '';
if ( ! empty( $url_thumb ) ) {
  $img_markup = sprintf( '<img src="%s" alt="%s" class="img-responsive" />',
                        $url_thumb[0],
                        $post->post_title );
}
$post_home_subtitle = get_post_meta( $post->ID, 'post_home_subtitle', true );
?>

<div class="col-md-4 col-sm-6">
  <div class="item">
    <div class="item-image">
      <a href="<?php echo get_the_permalink( $post->ID ) ?>"><?php echo $img_markup; ?>
      <span class="item-icon">
        <i class="fa fa-link"></i></span></a>
    </div><!-- end item-image -->
    <div class="item-desc text-center">
      <h2 class="item-desc__title h3">
        <a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>">
          <?php echo $post->post_title ?>
        </a>
      </h2>
      <?php if ( $post_home_subtitle != '' ) { ?>
        <h2 class="item-desc__subtitle h4">
          <a href="<?php echo get_the_permalink( $post->ID ) ?>" title="<?php echo $post->post_title ?>">
            <?php echo $post_home_subtitle ?>
          </a>
        </h2>
      <?php } ?>
    </div><!-- end service-desc -->
  </div><!-- end seo-item -->
</div><!-- end col -->
