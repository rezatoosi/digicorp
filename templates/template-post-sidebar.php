<?php
/*
 * Template Name: Default Sidebar for singular posts
 * Template Post Type: post
 */
 ?>

<?php
get_header();

digicorp_page_header_section( array(
  // 'section_class' => 'color9'
));
?>

<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="content col-md-9">
              <?php
                while ( have_posts() ) :

                  the_post();

                  get_template_part( 'template-parts/content/content', 'single' );

                endwhile; // End of the loop.
              ?>
            </div><!-- end content -->

            <div class="sidebar col-md-3">
              <?php get_sidebar(); ?>
            </div><!-- end sidebar -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php digicorp_related_posts(); ?>

<?php digicorp_related_services_in_posts() ?>

<?php get_footer(); ?>
