<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DIGICORP
 */

get_header();
digicorp_page_header_section();
?>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/content/content', 'page' );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() /*|| get_comments_number() */) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>
      </div><!-- end content -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>

<?php
get_footer();
