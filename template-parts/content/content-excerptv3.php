<?php
/**
 * Template part for displaying post excerpt - style 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>

<div class="col-md-4">
  <article class="blog-box">
    <figure>
      <?php digicorp_post_thumbnail( "blog-box__image" ); ?>
    </figure>
    <div class="blog-box__content">
      <h3 class="blog-box__content-title"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h3>
      <?php
        if ( 'post' == get_post_type() ) {
          ?>
            <div class="blog-box__content-meta">
              <?php echo digicorp_get_the_category_link() . ' | ' . digicorp_get_reading_time() ?>
            </div>
          <?php
        }
      ?>
    </div>
  </article>
</div>
