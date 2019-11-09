<?php
get_header();

digicorp_page_header_section();
?>

<?php

$sticky = get_option('sticky_posts');

if ($sticky) {

  rsort($sticky);
  $banner_args = array(
    'post__in' => $sticky,
    'posts_per_page' => '4',
    //'post_status' => 'publish',
    'ignore_sticky_posts' => 'true'
  );

  $banner_query = new WP_Query( $banner_args );
  $item_no = 8;

  if( $banner_query->have_posts() ) {
  ?>
  <section class="section ph-60">
      <div class="container">
          <div class="blog-banner blog-banner-1">
              <div class="banner-inner">
                  <div class="row">
                      <div class="col-md-6 col-sm-12 col-xs-12 gutter-left">
                        <article class="card">
                              <div class="owl-carousel blog-banner-carousel-1">
                                  <?php
                                  $count = 0;
                                  while( $banner_query->have_posts() ) {
                                      $banner_query->the_post();
                                      if( $count < $item_no ) {
                                          ?>
                                          <div class="item">
                                              <div class="post_thumb imghover" style="background-image: url(<?php esc_url( the_post_thumbnail_url( 'thumb' ) ); ?>)">
                                                  <div class="post-holder">
                                                      <div class="post_title">
                                                         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                      </div><!-- .post_title -->
                                                  </div><!-- .post-holder -->
                                              </div>
                                              <!-- // post_thumb -->
                                          </div><!-- .item -->
                                          <?php
                                      }
                                      $count++;
                                  }
                                  wp_reset_postdata();
                                  ?>
                              </div><!-- .owl-carousel -->
                          </article><!-- .card -->
                      </div>
                      <div class="col-md-6 col-sm-12 col-xs-12 gutter-right">
                        <div class="right-content-holder">
                              <div class="row custom_row clearfix">
                                  <?php
                                  $count = 0;
                                  while( $banner_query->have_posts() ) {
                                      $banner_query->the_post();
                                      if( $count < $item_no ) {
                                          ?>
                                          <div class="col col-md-6 small_posts">
                                              <article class="card">
                                                  <div class="post_thumb imghover" style="background-image: url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>);">
                                                      <div class="post-holder">
                                                          <div class="post_title">
                                                             <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                          </div><!-- .post_title -->
                                                      </div><!-- .post-holder -->
                                                  </div><!-- .post_thumb -->
                                              </article><!-- .card -->
                                          </div><!-- .col.small_posts -->
                                          <?php
                                      }
                                      $count++;
                                  }
                                  wp_reset_postdata();
                                  ?>
                              </div><!-- .row -->
                          </div><!-- .right-content-holder -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
<?php } } ?>

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
