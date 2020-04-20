<?php
/*
 * Template part for displaying related blog posts
*/
?>

<div class="col-md-3 col-sm-6">
    <div class="boxes blog-item">
        <div class="entry">
          <a href="<?php esc_url(the_permalink()); ?>">
            <?php if (has_post_thumbnail()) { ?>
              <img src="<?php esc_url(the_post_thumbnail_url('small')); ?>" alt="<?php esc_html(the_post_thumbnail_caption()); ?>" class="img-responsive img-full">
            <?php } else { ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/dist/images/post-default.png'); ?>" alt="<?php esc_html(the_title()); ?>" class="img-responsive img-full">
            <?php } ?>
            <p><?php the_title(); ?></p>
          </a>
        </div><!-- entry -->
    </div><!-- end box -->
</div><!-- end col -->
