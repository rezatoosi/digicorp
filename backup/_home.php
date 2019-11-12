<?php get_header(); ?>

<?php
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
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                while ( $query->have_posts() ) {
                  $query->the_post();
                  get_template_part('template-parts/content/content','excerpt');
                }

                digicorp_the_posts_navigation();

                wp_reset_postdata();
              ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php
  $sticky = get_option('sticky_posts');
  if ($sticky) {
    rsort($sticky);

    $query = new WP_Query(array(
      'post__in' => $sticky,
      'posts_per_page' => '4',
      //'post_status' => 'publish',
      'ignore_sticky_posts' => 'true'
    ));
    if ( $query->have_posts() ) {
?>
<section class="section lb">
    <div class="container">
        <div class="section-title text-left">
            <h5><?php _e('Latest', 'digicorpdomain') ?></h5>
            <h3><?php _e('Suggested Articles', 'digicorpdomain') ?></h3>
            <hr>
        </div><!-- end title -->

        <div class="row services-wrapper blog-wrapper text-left">

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
<?php } } ?>


<?php
$cat = get_category_by_slug('digital-marketing');
$query = new WP_Query(array(
  'category_name' => 'digital-marketing',
  'posts_per_page' => '4',
  'post_status' => 'publish'
));
if ( $query->have_posts() ) {
?>
<section class="section">
    <div class="container">
        <div class="section-title text-left">
            <h5><?php _e('Latest in', 'digicorpdomain') ?></h5>
            <h3><?php echo $cat->name ?></h3>
            <hr>
        </div><!-- end title -->

        <div class="row services-wrapper blog-wrapper text-left">

          <?php
            while ( $query->have_posts() ) {
              $query->the_post();
              get_template_part('template-parts/post/blog','recent');
            }
            wp_reset_postdata();
          ?>

        </div>

        <div class="row margin-top-xl">
          <div class="col-md-12">
            <a href="<?php echo esc_attr(get_category_link($cat->cat_ID)); ?>" title="<?php echo esc_attr($cat->name); ?>"><?php _e('More articles in this category', 'digicorpdomain') ?></a>
          </div>
        </div>
    </div><!-- end container -->
</section>
<?php } ?>

<?php get_footer(); ?>
