<?php
if ( empty( get_search_query() ) ) {
  wp_safe_redirect( home_url( '/' ), $status = 302 );
}
?>
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
          <?php
            if ( have_posts() ) {

              // Load posts loop.
              while ( have_posts() ) {
                the_post();
                echo '<div class="col-md-4 col-sm-6">';
                get_template_part( 'template-parts/content/content', 'excerptv3' );
                echo '</div>';
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
</section>

<?php get_footer(); ?>
