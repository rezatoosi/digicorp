<?php
get_header();
//

digicorp_page_header_section( array(
  // 'section_class' => 'color9'
));
?>
<section class="section section-single-post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <?php
                while ( have_posts() ) :

                  the_post();

                  get_template_part( 'template-parts/content/content', 'single' );

                endwhile; // End of the loop.
              ?>
            </div>
        </div>
    </div>
</section>

<?php digicorp_related_posts(); ?>

<?php digicorp_related_services_in_posts() ?>

<?php get_footer(); ?>
