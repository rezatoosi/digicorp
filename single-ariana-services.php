<?php get_header(); ?>

<?php
if (have_posts()){ the_post();

// $object_id = get_queried_object_id();
// $object_sec_title = esc_html( get_post_meta( $object_id, "post_sec_title", true) );
// $object_home_subtitle = esc_html( get_post_meta( $object_id, "post_home_subtitle", true) );

digicorp_page_header_section( array(
  'section_class' => 'color13'
));
?>

<section class="section">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">

              <!-- <div class="section-title text-left">
                <h5><?php //echo $object_home_subtitle; ?></h5>
                <h2><?php //echo $object_sec_title; ?></h2>
                <hr>
              </div><!-- end section-title -- -->

              <div class="section-content">
                <?php the_content(); ?>
              </div><!-- end section-content -->
          </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php } ?>



<?php digicorp_sub_services_list(); ?>

<?php digicorp_related_services_list() ?>

<?php digicorp_related_posts_in_services() ?>


<?php //digicorp_all_services_list(); ?>

<?php get_footer(); ?>
