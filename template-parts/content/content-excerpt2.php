<?php
/**
 * Template part for displaying post excerpt - style 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>

<div class="blog-micro-wrapper">
    <div class="row post-micro clearfix">
        <div class="col-md-3">
            <?php digicorp_post_thumbnail( "post-media clearfix" ); ?>
        </div><!-- end col -->

        <div class="col-md-6">
            <?php digicorp_entry_header_meta( true, 'large-post-meta' ); ?>
            <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <?php
            // TODO: Implement post sharing icons
            // <div class="post-sharing clearfix">
            //     <ul class="list-inline social-small">
            //         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            //         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            //         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            //     </ul>
            // </div><!-- end post-sharing -->
            ?>
            <a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>" class="readmore"><?php _e( 'Read more', 'digicorpdomain') ?></a>
        </div><!-- end col -->

        <div class="col-md-3">
            <div class="side-post-meta">
                <ul>
                    <li><?php echo digicorp_get_post_type_link(); ?></li>
                    <li><?php echo digicorp_get_the_category_link(); ?></li>
                    <li><?php echo digicorp_get_reading_time(); ?></li>
                </ul>
            </div>
        </div>
    </div><!-- end post-micro -->
</div><!-- end wrapper -->
