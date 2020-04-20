<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>
<div class="blog-micro-wrapper">
    <div class="post-micro clearfix text-center">
        <?php digicorp_post_thumbnail(); ?>

        <div class="large-post-meta">
            <?php digicorp_entry_header_meta(); ?>
        </div><!-- end meta -->
        <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h3>
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
    </div><!-- end post-micro -->

    <div class="post-desc clearfix">

        <?php
        the_content();

        digicorp_link_pages();

        digicorp_entry_footer();
        ?>

    </div><!--end post-desc -->
</div><!-- end wrapper -->

<?php //digicorp_prev_next_links() ?>

<?php digicorp_related_posts(); ?>

<div class="blog-micro-wrapper">
    <div class="authorbox">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="post-padding clearfix">
                    <div class="avatar-author">
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr( sprintf( __('Visit archive page of %s'), get_the_author() ) ); ?>">
                          <img alt="<?php esc_attr( the_author() ); ?>" src="<?php echo esc_url( get_avatar_url( get_the_author_meta('user_email') ) ) ?>" class="img-responsive img-circle">
                          <?php
                              // echo get_avatar( get_the_author_meta('user_email'), 80, null, get_the_author(), array('class' => array('img-responsive', 'img-circle') ) );
                          ?>
                        </a>
                    </div>
                    <div class="author-title desc">
                        <h4><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr( sprintf( __('Visit archive page of %s'), get_the_author() ) ); ?>"><?php the_author(); ?></a></h4>
                        <a class="authorlink" href="<?php echo esc_url(get_the_author_meta('user_url')); ?>"><?php echo get_the_author_meta('user_url'); ?></a>
                        <p><?php echo get_the_author_meta('user_description'); ?></p>
                        <?php // TODO: Implement social media links
                        // <ul class="list-inline social-small">
                        //     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        //     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        //     <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        //     <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        // </ul>
                        ?>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end authorbox -->
</div><!-- end post-micro -->
