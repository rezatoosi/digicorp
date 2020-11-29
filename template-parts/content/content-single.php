<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

?>

<?php
  $col_class = 'col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1';
  $template = get_page_template();
  if ( strpos( $template, 'sidebar' ) !== false ) {
    $col_class = 'col-md-12';
  }
?>

<div class="blog-micro-wrapper">
    <?php
    // <div class="row">
        // <div class="col-md-12">
            // <div class="post-micro clearfix text-center">
                // <?php digicorp_post_header_image( "post-media clearfix" ); ? >

                // <div class="large-post-meta">
                    // <?php digicorp_entry_header_meta(); ? >
                // </div><!-- end meta -->
                // <h2 class="entry-title h3"><a href="<?php esc_url(the_permalink()); ? >" title="<?php esc_attr(the_title()); ? >"><?php the_title(); ? ></a></h2>
                // <?php
                // TODO: Implement post sharing icons
                // <div class="post-sharing clearfix">
                //     <ul class="list-inline social-small">
                //         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                //         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                //         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                //     </ul>
                // </div><!-- end post-sharing -->
                // ? >
            // </div><!-- end post-micro -->
        // </div>
    // </div>
    ?>
    <div class="row">
        <div class="<?php echo $col_class; ?>">
            <div class="post-desc clearfix">

                <?php
                the_content();

                digicorp_link_pages();

                digicorp_entry_footer();

                digicorp_footer_share_buttons();

                //digicorp_prev_next_links()

                ?>
            </div><!--end post-desc -->
        </div>
    </div>
</div><!-- end wrapper -->
<div class="row">
    <div class="<?php echo $col_class; ?>">
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
        </div>
    </div>
</div>
<div class="row">
    <div class="<?php echo $col_class; ?>">
        <?php
        // If comments are open or we have at least one comment, load up the comment template.
  			if ( comments_open() || get_comments_number() ) :
  				comments_template();
  			endif;
        ?>
    </div>
</div>
