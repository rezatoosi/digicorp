<?php
/*
 * Template Name: Sidebar - 1
 */
 ?>

<?php
get_header();

digicorp_page_header_section();
?>

<?php
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$query = new WP_Query(array(
  'ignore_sticky_posts' => 'true',
  'paged' => $paged
));
if ( $query->have_posts() ) {
?>
<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="content col-md-9 col-sm-12">
              <?php
                while ( $query->have_posts() ) {
                  $query->the_post();
                  get_template_part('template-parts/content/content','excerpt');
                }

                digicorp_the_posts_navigation();

                wp_reset_postdata();
              ?>
            </div><!-- end content -->

            <div class="sidebar col-md-3 col-sm-12">
              <?php get_sidebar(); ?>
            </div><!-- end sidebar -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php } ?>

<?php get_footer(); ?>
