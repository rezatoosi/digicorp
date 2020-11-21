<?php
/**
 * Template part for displaying post excerpt - style 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>
<article class="blog-box">
  <figure>
    <?php digicorp_post_thumbnail( "blog-box__image" ); ?>
  </figure>
  <div class="blog-box__content">
    <h3 class="blog-box__content-title"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h3>
    <div class="blog-box__content-meta">
      <?php digicorp_get_post_excerpt_meta(); ?>
    </div>
  </div>
</article>