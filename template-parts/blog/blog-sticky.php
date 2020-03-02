<?php
$sticky = get_option('sticky_posts');
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
                                  if ($sticky) {

                                    rsort($sticky);
                                    $banner_args = array(
                                      'post__in' => $sticky,
                                      'posts_per_page' => '4',
                                      'post_status' => 'publish',
                                      'ignore_sticky_posts' => 'true'
                                    );

                                    $banner_query = new WP_Query( $banner_args );

                                    if( $banner_query->have_posts() ) {
                                      while( $banner_query->have_posts() ) {
                                          $banner_query->the_post();
                                          // if( $count < 4 && $count < $item_no ) {
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
                                          // }
                                      }
                                      wp_reset_postdata();
                                    }
                                  }
                                  ?>
                              </div><!-- .owl-carousel -->
                          </article><!-- .card -->
                      </div>
                      <div class="col-md-6 col-sm-12 col-xs-12 gutter-right">
                        <div class="right-content-holder">
                              <div class="row custom_row clearfix">
                                  <?php
                                  $banner_args = array(
                                    'post__not_in' => $sticky,
                                    'posts_per_page' => '4',
                                    'post_status' => 'publish',
                                    'ignore_sticky_posts' => 'true'
                                  );
                                  $count = 0;
                                  $banner_query = new WP_Query( $banner_args );

                                  if ( $banner_query->have_posts() ) {
                                    while( $banner_query->have_posts() ) {
                                      $banner_query->the_post();
                                      if( $count < 4 ) {
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
