<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>
<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blog-micro-wrapper">
    <div class="post-micro clearfix text-center">
      <?php digicorp_post_header_image( "post-media clearfix" ); ?>
      <!-- <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h3> -->
    </div><!-- end post-micro -->
    <div class="post-desc clearfix">

        <?php
        the_content();

        digicorp_link_pages();

        digicorp_entry_footer();
        ?>

    </div><!--end post-desc -->
  </div><!-- end wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
