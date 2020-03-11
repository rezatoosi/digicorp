<?php get_header(); ?>

<?php
digicorp_page_header_section();
?>

<section class="section ph-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="section-title text-left pb-30">
                    <h3><?php
                      /* translators: in top of search form in search page */
                      _e( 'Enter search phrase:', 'digicorpdomain' );
                    ?></h3>
              </div>
              <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</section>
<section class="section bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                if ( have_posts() ) {

                  // Load posts loop.
                  while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'excerpt2' );
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
