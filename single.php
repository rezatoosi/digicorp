<?php
get_header();
//

digicorp_page_header_section( array(
  // 'section_class' => 'color9'
));
?>
<section class="section">
    <div class="container">
        <?php
          while ( have_posts() ) :

            the_post();

            get_template_part( 'template-parts/content/content', 'single' );

          endwhile; // End of the loop.
        ?>
    </div>
</section>

<?php digicorp_related_posts(); ?>

<?php digicorp_related_services_in_posts() ?>

<?php get_footer(); ?>
