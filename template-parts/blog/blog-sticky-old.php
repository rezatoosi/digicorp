<?php
  // this is old blog section in frontpage
?>

<?php
if ( get_theme_mod( 'digicorp_sections_blog_enabled' ) ):
?>
  <?php
    $query = new WP_Query(array(
      'posts_per_page' => '4',
      'ignore_sticky_posts' => 'true'
    ));
    if ($query->have_posts())
    {
  ?>
    <section class="section" id="section-blog">
        <div class="container">
          <?php if ( ! empty( get_theme_mod( 'digicorp_sections_blog_title' ) ) ): ?>
            <div class="section-title text-center">
                <h5><?php echo get_theme_mod( 'digicorp_sections_blog_subtitle' ); ?></h5>
                <h3><?php echo get_theme_mod( 'digicorp_sections_blog_title' ); ?></h3>
                <hr>
            </div><!-- end title -->
          <?php endif;?>

            <div class="row services-wrapper blog-wrapper text-center">
              <?php
                while ( $query->have_posts() ) {
                  $query->the_post();
                  get_template_part('template-parts/post/blog','recent');
                }
                wp_reset_postdata();
              ?>
            </div>
        </div><!-- end container -->
    </section>
  <?php } ?>
<?php
endif;
?>
