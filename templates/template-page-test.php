<?php
/*
 * Template Name: Pages - Test
 * Template Post Type: page
 */
 ?>

<?php
get_header();
?>
  <section class="section">
    <div class="container-fluid">
      <?php
        //echo do_shortcode('[smartslider3 slider=2]');
        echo do_shortcode('[metaslider id="580"]');
      ?>
    </div>
  </section>


  <section class="section lb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
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
      </div><!-- end row -->
    </div><!-- end container -->
  </section>

<?php get_footer(); ?>
