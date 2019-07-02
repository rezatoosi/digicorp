<?php
/*
 * Template part for displaying blog posts in category page
*/
?>

<div class="blog-micro-wrapper">
    <div class="row post-micro clearfix">
        <div class="col-md-4">
            <div class="post-media clearfix">
              <a href="<?php esc_url(the_permalink()); ?>">
                <?php if (has_post_thumbnail()) { ?>
                  <img src="<?php esc_url(the_post_thumbnail_url('small')); ?>" alt="<?php esc_html(the_post_thumbnail_caption()); ?>" class="img-responsive">
                <?php } else { ?>
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/img/post-default.png'); ?>" alt="<?php esc_html(the_title()); ?>" class="img-responsive">
                <?php } ?>
              </a>
            </div><!-- end post-media -->
        </div><!-- end col -->

        <div class="col-md-8">
            <div class="large-post-meta">
                <?php
                // TODO: add user avatar here
                //<span class="avatar">
                //  <a href="author.html"><img src="upload/avatar_01.png" alt="" class="img-circle"> Jenny DOE</a>
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
            <a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>" class="readmore"><?php _e('Read more') ?></a>
        </div><!-- end col -->
    </div><!-- end post-micro -->
</div><!-- end wrapper -->
