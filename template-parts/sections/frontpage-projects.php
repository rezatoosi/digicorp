<?php
if ( get_theme_mod( 'digicorp_sections_projects_enabled' ) ):

  $args = array(
		"post_type" => "ariana-projects",
		"order" => "ASC",
		"orderby" => "menu_order",
		"posts_per_page" => 12
	);
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ) :
    ?>
      <section class="section bg-light-gray" id="section-projects">
          <div class="container-fluid">
            <?php if ( ! empty( get_theme_mod( 'digicorp_sections_projects_title' ) ) ) { ?>
              <div class="section-title text-center">
                  <h5><?php echo get_theme_mod( 'digicorp_sections_projects_subtitle' ); ?></h5>
                  <h2><?php echo get_theme_mod( 'digicorp_sections_projects_title' ); ?></h2>
                  <hr>
              </div><!-- end title -->
            <?php } ?>

              <div class="owl-carousel owl-theme owl-projects">
                <?php
                while ( $the_query->have_posts() ) :
                  $the_query->the_post();
                  get_template_part('template-parts/projects/projects', 'excerpt');
                endwhile;
                ?>
              </div>
          </div>
      </section>
    <?php
  endif;
  wp_reset_postdata();
endif;
?>
