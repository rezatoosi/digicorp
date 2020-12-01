<?php get_header(); ?>

<?php
digicorp_page_header_section( array(
  // 'page_title'      =>  post_type_archive_title( '', false ),
  // 'page_title'      =>  __( 'OUR SERVICES', 'digicorpdomain' ),
  'section_class'   =>  'color13',
  'alt_slug'        => 'services'
));
if ( have_posts() ) {
?>
<section class="section services-list">
    <div class="container">
        <div class="row">
            <?php
              while( have_posts() ) {
                the_post();
                get_template_part('template-parts/services/services','excerpt');
              }
            ?>
        </div><!-- end row -->
    </div>
</section>
<?php } ?>

<?php get_template_part( 'template-parts/sections/services', 'cta' ); ?>

<?php get_footer(); ?>
