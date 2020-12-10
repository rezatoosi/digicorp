<?php get_header(); ?>

<?php
digicorp_page_header_section( array(
  'section_class' => 'color7'
));
?>

<section class="section">
    <div class="container">
        <div class="row">
          <?php
            if ( have_posts() ) {

              // Load posts loop.
              while ( have_posts() ) {
                the_post();
                echo '<div class="col-lg-3 col-md-4 col-sm-6">';
                get_template_part('template-parts/projects/projects', 'excerpt');
                echo '</div>';
              }

              // Previous/next page navigation.
              digicorp_the_posts_navigation();

            }
          ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
