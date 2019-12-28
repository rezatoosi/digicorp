<?php
get_header();

digicorp_page_header_section();
?>

<?php
  get_template_part( 'template-parts/blog/blog', 'sticky' );
?>

<!-- Categories -->
<?php
$categories = get_categories();
if ( $categories ) {
?>
  <section class="section lb pt-60">
      <div class="container">
          <div class="section-title text-left">
              <h3><?php _e('Featured Categories', 'digicorpdomain') ?></h3>
              <hr>
          </div><!-- end title -->
          <div class="row">
              <?php
              foreach($categories as $category) {
                $cat_id = $category->cat_ID;
                $image_id = get_term_meta ( $cat_id, 'category-image-id', true );
                // echo wp_get_attachment_image ( $image_id, 'thumb' );
                $image_src = wp_get_attachment_image_src( $image_id, 'thumb' )[0];
                 ?>
                 <div class="col-md-3">
                     <div class="blog-category-item">
                         <div class="box-1" data-bg-img="<?php echo $image_src; ?>">
                             <img src="<?php echo $image_src; ?>" alt="" scale="0">
                             <a href="<?php echo get_category_link($category->term_id); ?>" title="<?php echo $category->name; ?>">
                                 <span><?php echo $category->name; ?></span>
                             </a>
                         </div><!-- box-1 -->
                     </div><!-- blog-category-item -->
                 </div>
                 <?php
              }
              ?>
          </div>
      </div>
  </section>
<?php } ?>

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
