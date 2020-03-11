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

<?php if ( 'post' === get_post_type() ) : ?>
<div class="blog-micro-wrapper">
    <div class="postpager">
        <ul class="pager row">
          <li class="previous col-md-6 col-sm-12 text-right">
            <?php
            $prev_post = get_previous_post(true);
            if (!empty($prev_post)) {
              $prev_thumb_url = get_the_post_thumbnail_url($prev_post,'thumbnail');
              if ( empty($prev_thumb_url) ) { $prev_thumb_url = get_template_directory_uri() . '/assets/dist/images/post-default.png'; }
              ?>
                <div class="post">
                    <div class="mini-widget-thumb">
                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                            <img alt="<?php echo esc_attr($prev_post->post_title) ?>" src="<?php echo esc_url($prev_thumb_url) ?>" class="img-responsive alignright img-circle">
                        </a>
                    </div>
                    <div class="mini-widget-title">
                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo esc_attr($prev_post->post_title) ?><br/>
                        <small><?php _e('<  Previous Post', 'digicorpdomain' ); ?></small></a>
                    </div>
                </div>
            <?php } ?>
          </li>
          <li class="next col-md-6 col-sm-12 text-left">
            <?php
            $next_post = get_next_post(true);
            if (!empty($next_post)) {
              $next_thumb_url = get_the_post_thumbnail_url($next_post,'thumbnail');
              if ( empty($next_thumb_url) ) { $next_thumb_url = get_template_directory_uri() . '/assets/dist/images/post-default.png'; }
              ?>
                <div class="post">
                    <div class="mini-widget-thumb">
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                            <img alt="<?php echo esc_attr($next_post->post_title) ?>" src="<?php echo esc_url($next_thumb_url) ?>" class="img-responsive alignleft img-circle">
                        </a>
                    </div>
                    <div class="mini-widget-title">
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo esc_attr($next_post->post_title) ?><br/>
                        <small><?php _e('Next Post  >', 'digicorpdomain' ); ?></small></a>
                    </div>
                </div>
            <?php } ?>
          </li>
        </ul>
    </div><!-- end postpager -->
</div><!-- end post-micro -->
<?php endif; ?>

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
