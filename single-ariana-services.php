<?php get_header(); ?>

<?php
if (have_posts()){ the_post();

$object_id = get_queried_object_id();
$object_header_image_src = esc_html( get_post_meta( $object_id, "post_header_image", true) );
$object_sec_title = esc_html( get_post_meta( $object_id, "post_sec_title", true) );
$object_home_subtitle = esc_html( get_post_meta( $object_id, "post_home_subtitle", true) );

digicorp_page_header_section( array(
  'section_class' => 'visual color13',
  'page_header_image_src' => $object_header_image_src
));
?>

<section class="section">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">

              <div class="section-title text-left">
                <h5><?php echo $object_home_subtitle; ?></h5>
                <h2><?php echo $object_sec_title; ?></h2>
                <hr>
              </div><!-- end section-title -->

              <div class="section-content">
                <?php the_content(); ?>
              </div><!-- end section-content -->
          </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php } ?>

<section class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <?php //<h5>ALL IN ONE SEARCH ENGINE TOOLS</h5> ?>
            <h3>
              <?php
                /* translators: title of other services section in single page of services */
                _e( 'OTHER SERVICES', 'digicorpdomain' ); ?></h3>
            <hr>
        </div><!-- end title -->
        <div class="row services-list">
            <?php echo do_shortcode('[ariana_services]'); ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php get_footer(); ?>
