<?php
/*
 * Template part for displaying recent blog posts
*/
?>

<div class="col-md-3 col-sm-6">
    <div class="boxes blog-item">
        <div class="entry">
          <a href="<?php esc_url(the_permalink()); ?>">
            <?php if (has_post_thumbnail()) { ?>
              <img src="<?php esc_url(the_post_thumbnail_url('small')); ?>" alt="<?php esc_html(the_post_thumbnail_caption()); ?>" class="img-responsive">
            <?php } else { ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/dist/images/post-default.png'); ?>" alt="<?php esc_html(the_title()); ?>" class="img-responsive">
            <?php } ?>
          </a>
        </div><!-- entry -->
        <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo esc_html(get_the_excerpt()); ?></p>
    </div><!-- end box -->
</div><!-- end col -->
