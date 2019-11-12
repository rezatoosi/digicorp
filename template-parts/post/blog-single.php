<div class="blog-micro-wrapper">
    <div class="post-micro clearfix text-center">
        <?php // TODO: add breadcrumbs ?>
        <div class="post-media clearfix">

            <?php if (has_post_thumbnail()) { ?>
              <a href="<?php esc_url(the_post_thumbnail_url('full')); ?>">
                <img src="<?php esc_url(the_post_thumbnail_url('page_header')); ?>" alt="<?php esc_html(the_post_thumbnail_caption()); ?>" class="img-responsive">
              </a>
            <?php } else { ?>
              <a href="<?php esc_url(the_permalink()); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/dist/images/post-default.png'); ?>" alt="<?php esc_html(the_title()); ?>" class="img-responsive">
              </a>
            <?php } ?>

        </div><!-- end post-media -->

        <div class="large-post-meta">
            <?php
            // TODO: add user avatar here
            //<span class="avatar">
            //  <a href="author.html"><img src="assets/dist/images/avatar_01.png" alt="" class="img-circle"> Jenny DOE</a>
            //</span>
            ?>
            <span class="avatar">
             <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>
            </span>
            <small>&#124;</small>
            <span><a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ) ?>" title="_e('Click for all articles sent this day')"><i class="fa fa-clock-o"></i> <?php echo the_time('j M Y'); ?></a></span>
            <?php if( comments_open() ) { ?>
              <small class="hidden-xs">&#124;</small>
              <span class="hidden-xs"><?php comments_popup_link('<i class="fa fa-comments-o"></i> 0',
                                          '<i class="fa fa-comments-o"></i> 1',
                                          '<i class="fa fa-comments-o"></i> %'); ?></span>
            <?php } ?>

            <?php
              // TODO: implement the visit count
              // <small class="hidden-xs">&#124;</small>
              // <span class="hidden-xs"><a href="single.html"><i class="fa fa-eye"></i> 444</a></span>
            ?>
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

        <?php the_content(); ?>

        <div class="tags clearfix">
            <?php the_tags(__('Tags: '), ' ', ''); ?>
        </div><!-- end tags -->
    </div><!--end post-desc -->
</div><!-- end wrapper -->

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
                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo esc_attr($prev_post->post_title) ?></a>
                        <small><?php _e('<  Previous Post') ?></small>
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
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo esc_attr($next_post->post_title) ?></a>
                        <small><?php _e('Next Post  >') ?></small>
                    </div>
                </div>
            <?php } ?>
          </li>
        </ul>
    </div><!-- end postpager -->
</div><!-- end post-micro -->

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

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
  comments_template();
endif;
?>
