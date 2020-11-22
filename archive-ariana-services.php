<?php get_header(); ?>

<?php
digicorp_page_header_section( array(
  // 'page_title'      =>  post_type_archive_title( '', false ),
  'page_title'      =>  __( 'OUR SERVICES', 'digicorpdomain' ),
  'section_class'   =>  'visual color13'
));
if ( have_posts() ) {
?>
<section class="section">
    <div class="container">
        <div class="row services-list">
            <?php
              while( have_posts() ) {
                the_post();
                get_template_part('template-parts/services/services','excerpt');

                // echo '<div class="col-md-4 col-sm-6">';
                // get_template_part('template-parts/content/content','excerptv3');
                // echo '</div>';
              }
            ?>
        </div><!-- end row -->
    </div>
</section>
<?php } ?>
<?php get_footer(); ?>
