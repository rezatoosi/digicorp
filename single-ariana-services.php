<?php get_header(); ?>

<section id="page-header" class="visual color13">
    <div class="container">
        <div class="text-block">
            <div class="heading-holder">
                <h1><?php wp_title(''); ?></h1>
            </div>
            <p class="tagline">
              <?php
                $page_desc = get_post_meta(get_queried_object_id(), "post_desc", true);
                echo ($page_desc) ? $page_desc : '';
              ?>
            </p>
        </div>
    </div>
</section>
<?php // TODO: add breadcrumbs ?>

<?php if (have_posts()){ the_post(); ?>
<section class="section">
    <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-12">
              <?php the_content(); ?>
          </div><!-- end col -->

          <div class="col-md-5 col-sm-12 mobile30">
              <?php if (has_post_thumbnail()) { ?>
                <img src="<?php esc_url(the_post_thumbnail_url('medium')); ?>" alt="<?php esc_html(the_post_thumbnail_caption()); ?>" class="img-responsive img-full">
              <?php } else { ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/post-default.png'); ?>" alt="<?php esc_html(the_title()); ?>" class="img-responsive">
              <?php } ?>
          </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php } ?>

<section class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <?php //<h5>ALL IN ONE SEARCH ENGINE TOOLS</h5> ?>
            <h3>OTHER SERVICES</h3>
            <hr>
        </div><!-- end title -->
        <div class="row services-list">
            <?php echo do_shortcode('[ariana_services]'); ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php get_footer(); ?>
