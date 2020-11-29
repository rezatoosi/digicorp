<?php
/*
 * Template Name: Default Sidebar for Pages
 * Template Post Type: page
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
        <div class="content col-md-9 col-sm-12">
          <?php
      		while ( have_posts() ) :
      			the_post();

      			get_template_part( 'template-parts/content/content', 'page' );

      			// If comments are open or we have at least one comment, load up the comment template.
      			if ( comments_open() || get_comments_number() ) :
      				comments_template();
      			endif;

      		endwhile; // End of the loop.
      		?>
        </div><!-- end content -->

        <div class="sidebar col-md-3 col-sm-12">
          <?php get_sidebar(); ?>
        </div><!-- end sidebar -->
      </div><!-- end row -->
    </div><!-- end container -->
  </section>

<?php get_footer(); ?>
