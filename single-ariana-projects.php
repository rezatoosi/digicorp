<?php get_header(); ?>

<?php
digicorp_page_header_section( array(
  'section_class' => 'visual color8'
));
?>

<?php if (have_posts()){ the_post();
  $fields = get_post_custom();
  $client = isset( $fields['project_client'] ) ? esc_html( $fields['project_client'][0] ) : '';
  $url = isset( $fields['project_url'] ) ? esc_attr( $fields['project_url'][0] ) : '';
  $pub_date = ( isset( $fields['project_publish_date'] ) && $fields['project_publish_date'][0] != '' ) ? esc_attr( $fields['project_publish_date'][0] ) : '';
  $pub_date = strtotime( $pub_date );
  if ( $pub_date ) {
    $pub_date = date( 'j M Y', $pub_date );
  }
  else {
    $pub_date = get_the_time( 'j M Y' );
  }
  ?>

  <section class="section">
      <div class="container">
          <div class="row">
              <div class="col-md-5">
                  <div class="entry">
                      <?php if ( has_post_thumbnail() ) { ?>
                        <img src="<?php esc_url( the_post_thumbnail_url('medium') ); ?>" alt="<?php esc_html( the_title() ); ?>" class="img-responsive img-full">
                        <div class="magnifier">
                            <div class="magnibutton"><a href="<?php esc_url(the_post_thumbnail_url('full')); ?>" target="_blank"<?php if ( get_the_post_thumbnail_caption() ) { echo ' title="' . get_the_post_thumbnail_caption() . '"'; } ?>><i class="fa fa-search"></i></a></div>
                        </div>
                      <?php } else { ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/projects-default.png'); ?>" alt="<?php esc_html(get_the_title()); ?>" class="img-responsive">
                      <?php } ?>
                  </div>
              </div><!-- end col -->

              <div class="col-md-7 col-sm-12 mobile30 single-portfolio">
                  <div class="section-title text-left">
                      <h5><?php _e( 'ABOUT THE PROJECT', 'digicorpdomain' ) ?></h5>
                      <h3><?php the_title(); ?></h3>
                      <hr>
                  </div><!-- end title -->

                  <div class="text-widget">
                      <?php the_content(); ?>
                      <ul class="check m20">
                          <li><?php _e( 'Published Date:', 'digicorpdomain' ) ?> <?php echo $pub_date; //21 June 2016 ?></li>
                        <?php
                        if ( has_term( '', 'ariana-type-tags' ) ) { ?>
                          <li><?php _e( 'Project Type:', 'digicorpdomain' ) ?> <?php the_terms( $post->ID, 'ariana-type-tags', '', ', ', '');  //<a href="#">SEO</a>, <a href="#">SEM</a>, <a href="#">Backlink</a> ?></li>
                        <?php }
                        if ( has_term( '', 'ariana-technologies' ) ) { ?>
                          <li><?php _e( 'Technologies:', 'digicorpdomain' ) ?> <?php the_terms( $post->ID, 'ariana-technologies', '', ', ', '');  ?></li>
                        <?php }
                        if ( $client ) { ?>
                          <li><?php _e( 'Client:', 'digicorpdomain' ) ?> <?php echo $client; ?></li>
                        <?php } ?>
                      </ul><!-- end check -->

                      <div class="client-button">
                          <a href="<?php echo $url; ?>" class="btn btn-primary" target="_blank"><?php _e( 'Launch Project', 'digicorpdomain' ); ?></a>
                      </div>

                  </div><!-- end text-widget -->
              </div><!-- end col -->
          </div>

          <?php
          $prev_post = get_previous_post_link( '%link' , __( '<i class="fa fa-angle-left"></i> Previous Project', 'digicorpdomain' ) );
          $next_post = get_next_post_link( '%link', __( 'Next Project <i class="fa fa-angle-right"></i>', 'digicorpdomain' ) );
          if ( $prev_post || $next_post ) {
          ?>
              <div class="row">
                  <div class="col-md-12">
                      <nav class="pager-wrapper">
                          <ul class="pager">
                              <li class="previous"><?php echo $prev_post; ?></li>
                              <li class="next"><?php echo $next_post; ?></li>
                          </ul>
                      </nav>
                  </div><!-- end col -->
              </div><!-- end row -->
          <?php }?>

      </div><!-- end container -->
  </section>

  <?php echo do_shortcode('[ariana_projects_techs section=true]'); ?>

<?php } ?>

<section class="section db casebg">
    <div class="container">
        <div class="section-title text-center">
            <?php //<h5>ALL IN ONE SEARCH ENGINE TOOLS</h5> ?>
            <h3>OTHER PROJECTS</h3>
            <hr>
        </div><!-- end title -->
        <div class="row services-list">
            <?php echo do_shortcode('[ariana_projects]'); ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php get_footer(); ?>
