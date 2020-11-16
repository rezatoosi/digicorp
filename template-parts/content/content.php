<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>

<div class="blog-micro-wrapper">
    <div class="row post-micro clearfix">
        <div class="col-md-4">
            <?php digicorp_post_header_image( "post-media clearfix" ); ?>
        </div><!-- end col -->

        <div class="col-md-8">
            <div class="large-post-meta">
                <?php digicorp_entry_header_meta(); ?>
            </div><!-- end meta -->
            <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h3>
            <?php
            the_content( sprintf(
        			wp_kses(
        				/* translators: %s: Name of current post. Only visible to screen readers */
        				__( 'Continue reading<span class="screen-reader-text sr-only"> "%s"</span>', 'digicorpdomain' ),
        				array(
        					'span' => array(
        						'class' => array(),
        					),
        				)
        			),
        			get_the_title()
        		) );

            wp_link_pages(
        			array(
        				'before' => '<div class="page-links">' . __( 'Pages:', 'digicorpdomain' ),
        				'after'  => '</div>',
        			)
        		);
            ?>
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
        </div><!-- end col -->
    </div><!-- end post-micro -->
</div><!-- end wrapper -->
