<?php get_header(); ?>

<?php
get_template_part('template-parts/header/header');
?>

<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                if ( have_posts() ) {

                  // Load posts loop.
                  while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content' );
                  }

                  // Previous/next page navigation.
                  digicorp_the_posts_navigation();

                } else {

                  // If no content, include the "No posts found" template.
                  get_template_part( 'template-parts/content/content', 'none' );

                }
              ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
